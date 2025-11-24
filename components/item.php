<div>
  <div class="flex justify-between items-center px-4 py-2 cursor-pointer"
       data-wp-on--click="actions.toggleShadowContent">
    <div class="font-semibold text-zinc-800 text-base">
      <span>Shadow </span><span data-wp-text="context.item.id"></span>
    </div>
    <div class="cursor-pointer show-icon">
      <svg xmlns="http://www.w3.org/2000/svg"
           width="16"
           height="16"
           fill="currentColor"
           class="bi bi-chevron-down"
           viewBox="0 0 16 16">
        <path fill-rule="evenodd"
              d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
      </svg>
    </div>
  </div>
  <div class="box-shadow-content mt-4 px-4 pb-2">
    <!-- Inset -->
    <div class="flex justify-between mb-4">
      <div class="flex items-center gap-2 mb-2 w-max cursor-pointer"
           data-wp-class--inset-enabled="context.item.data.inset"
           data-wp-on--click="actions.toggleInsetShadow">
        <div class="relative items-center grid bg-zinc-200 rounded-full w-8 h-4 transition-all switch"></div>
        <div class="text-zinc-600 text-base">Inset</div>
      </div>
      <div>
        <button type="button"
                class="font-bold text-red-500 text-xs uppercase tracking-wider"
                data-wp-on--click="actions.deleteItem"
                data-wp-bind--data-item-id="context.item.id">Delete</button>
      </div>
    </div>
    <?php
    boxShadowGeneratorComponent( 'range', [
      'label' => 'Horizontal Offset',
      'min'   => -100,
      'max'   => 100,
      'value' => 'context.item.data.horizontalOffset',
    ] );
    boxShadowGeneratorComponent( 'range', [
      'label' => 'Vertical Offset',
      'min'   => -100,
      'max'   => 100,
      'value' => 'context.item.data.verticalOffset',
    ] );
    boxShadowGeneratorComponent( 'range', [
      'label' => 'Blur',
      'min'   => -100,
      'max'   => 100,
      'value' => 'context.item.data.blur',
    ] );
    boxShadowGeneratorComponent( 'range', [
      'label' => 'Spread',
      'min'   => -100,
      'max'   => 100,
      'value' => 'context.item.data.spread',
    ] );
    ?>
    <!-- Color picker -->
    <div data-wp-init="callbacks.colorPickerItem">
      <div class="box-shadow-color-picker"></div>
    </div>
  </div>
</div>