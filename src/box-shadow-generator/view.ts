import { store, getContext } from '@wordpress/interactivity';


interface ShadowData {
	horizontalOffset: number
	verticalOffset: number
	blur: number
	spread: number
}

interface Shadow {
	id: number
	data: ShadowData
}
interface Context {
	shadows: Shadow[]
}

const { state } = store('boxShadowGenerator', {
	state: {
		message: 'My State'
	},
	actions: {
		newShadow() {
			const context = getContext<Context>()
			const shadows = context.shadows

			const newData: Shadow = {
				id: new Date().getTime(),
				data: {
					verticalOffset: 1,
					horizontalOffset: 2,
					blur: 1,
					spread: 1
				}
			}
			shadows.push(newData)
		},
		toggleVisibility(e: Event) {
			const target = e.target
			if (target instanceof HTMLButtonElement) {
				const parent = target.parentElement
				if (parent) {
					parent.classList.toggle('hide-shadow')
				}
			}
		}
	}
})