import { getContext, getElement, store } from "@wordpress/interactivity";
import Pickr from '@simonwep/pickr'
import copy from 'copy-to-clipboard';

interface EachItem {
  item: Item
}

interface Item {
  id: number
  data: Shadow
  show: boolean
}

interface Shadow {
  inset: boolean
  horizontalOffset: number
  verticalOffset: number
  blur: number
  spread: number
  color: string
}

interface Context {
  shadows: Item[]
  canvasProperties: CanvasProperties
  boxProperties: BoxProperties
}

interface CanvasProperties {
  backgroundColor: string
}

interface BoxProperties {
  backgroundColor: string
  roundness: number
  height: number
  width: number
}


const colorPicker = (el: string | HTMLElement, color: string) => {
  return Pickr.create({
    el: el,
    theme: 'nano',
    default: color,
    components: {
      preview: true,
      opacity: true,
      hue: true,
      interaction: {
        input: true,
        save: true
      }
    }
  });
}


const { state, actions } = store('boxShadowGenerator', {
  state: {
    get buildBoxShadow() {
      const context = getContext<Context>();

      return context.shadows
        .map(shadow => {
          const { inset, horizontalOffset, verticalOffset, blur, spread, color } = shadow.data
          const insetKeyword = inset ? 'inset ' : '';
          return `${insetKeyword}${horizontalOffset}px ${verticalOffset}px ${blur}px ${spread}px ${color}`
        })
        .join(', ');
    },
    get boxShadowCSS() {
      const { state } = store('boxShadowGenerator')
      // @ts-expect-error
      return `box-shadow: ${state.buildBoxShadow};`
    },
    copied: false,
    get copyButtonText() {
      const { state } = store('boxShadowGenerator')
      //@ts-ignore
      return state.copied ? 'Copied!' : 'Copy'
    },
    get boxBorderRadius() {
      const context = getContext<Context>()
      return `${context.boxProperties.roundness}px`
    },
    get boxWidth() {
      const context = getContext<Context>()
      return `${context.boxProperties.width}px`
    },
    get boxHeight() {
      const context = getContext<Context>()
      return `${context.boxProperties.height}px`
    }
  },
  actions: {
    validateRange() {
      const { ref } = getElement()
      if (!ref || !(ref instanceof HTMLInputElement)) {
        return
      }
      actions.updateInputValue(ref, parseInt(ref.value))
    },
    updateInputValue(ref: HTMLElement, newValue: string | number) {
      const contextAttr = ref.getAttribute('data-wp-bind--value')
      if (contextAttr) {
        const path = contextAttr.replace(/^context\./, '')
        const properties = path.split('.')
        const context = getContext()
        let target = context
        for (let i = 0; i < properties.length - 1; i++) {
          // @ts-ignore
          target = target[properties[i]];
        }
        const finalKey = properties[properties.length - 1];
        // @ts-ignore
        target[finalKey] = newValue
      }
    },
    validateNumberInput() {
      const { ref } = getElement()
      if (!ref || !(ref instanceof HTMLInputElement)) {
        return
      }

      let newValue = parseInt(ref.value, 10)
      if (isNaN(newValue)) {
        newValue = 0
      }
      const max = parseInt(ref.max)
      const min = parseInt(ref.min)

      newValue = Math.max(min, Math.min(max, newValue));

      ref.value = newValue.toString()
      actions.updateInputValue(ref, newValue)
    },

    copyToClipboard() {
      const { ref } = getElement()
      if (ref) {
        const input = ref.previousElementSibling
        if (input && input instanceof HTMLInputElement) {
          copy(input.value)
          state.copied = true
          input.select()
          setTimeout(() => {
            state.copied = false
            input.blur()
          }, 2000)
        }
      }
    },
    toggleShadowContent() {
      const context = getContext<EachItem>()
      context.item.show = !context.item.show
    },
    addNewShadowData() {
      const { shadows } = getContext<Context>()
      const newShadow: Item = {
        id: shadows.length + 1,
        show: false,
        data: {
          inset: false,
          horizontalOffset: 0,
          verticalOffset: 0,
          blur: 10,
          spread: 0,
          color: '#ddd'
        }
      }
      shadows.push(newShadow)
    },
    toggleInsetShadow() {
      const context = getContext<EachItem>()
      context.item.data.inset = !context.item.data.inset
    },
    toggleSwitch() {
      const { ref } = getElement()
      if (!ref || !(ref instanceof HTMLDivElement)) {
        return
      }
      const contextAttr = ref.getAttribute('data-wp-class--inset-enabled')
      if (contextAttr) {
        const path = contextAttr.replace(/^context\./, '')
        const properties = path.split('.')
        const context = getContext()
        let target = context
        for (let i = 0; i < properties.length - 1; i++) {
          // @ts-ignore
          target = target[properties[i]];
        }
        const finalKey = properties[properties.length - 1];
        // @ts-ignore
        target[finalKey] = !target[finalKey]
      }
    },
    deleteItem() {
      const { ref } = getElement()
      if (ref) {
        const { itemId } = ref.dataset
        if (itemId) {
          const context = getContext<Context>()
          context.shadows = context.shadows.filter(shadow => shadow.id !== parseInt(itemId))
        }
      }
    }
  },
  callbacks: {
    colorPickerItem() {
      const { ref } = getElement()

      const context = getContext<EachItem>()
      if (ref) {
        const boxShadowEl = ref.querySelector<HTMLDivElement>('.box-shadow-color-picker')
        if (boxShadowEl) {
          const pickr = colorPicker(boxShadowEl, context.item.data.color)
          pickr.on('change', (HSVaColorObject: any, eventSource: any, PickrInstance: any) => {
            const save = PickrInstance._root.app.querySelector('.pcr-save')
            if (save) {
              save.click()
              context.item.data.color = HSVaColorObject.toHEXA().toString()
            }
          })
        }
      }
    },
    colorPicker() {
      const { ref } = getElement()
      if (ref) {
        const { key, type } = ref.dataset
        if (key && type) {
          const context = getContext<Context>()
          //@ts-ignore
          const pickr = colorPicker(ref, context[key][type])
          pickr.on('change', (HSVaColorObject: any, eventSource: any, PickrInstance: any) => {
            const save = PickrInstance._root.app.querySelector('.pcr-save')
            if (save) {
              save.click()
              //@ts-ignore
              context[key][type] = HSVaColorObject.toHEXA().toString()
            }
          })
        }
      }
    },
  }
})