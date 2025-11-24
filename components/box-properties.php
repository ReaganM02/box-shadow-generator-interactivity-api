<div>
  <div>
    <div class="text-zinc-600 text-sm">Background color</div>
    <div data-wp-init="callbacks.colorPicker"
         data-key="boxProperties"
         data-type="backgroundColor"></div>
  </div>
  <div class="mt-4">
    <div class="text-zinc-600 text-sm">Border color</div>
    <div data-wp-init="callbacks.colorPicker"
         data-key="boxProperties"
         data-type="borderColor"></div>
  </div>
  <!-- Roundness -->
  <div class="mt-4">
    <?php boxShadowGeneratorComponent( 'range', [
      'max'   => 100,
      'min'   => 0,
      'label' => 'Roundness',
      'value' => 'context.boxProperties.roundness',
    ] ) ?>
  </div>
  <!-- Width -->
  <div class="mt-4">
    <?php boxShadowGeneratorComponent( 'range', [
      'max'   => 200,
      'min'   => 50,
      'label' => 'Width',
      'value' => 'context.boxProperties.width',
    ] ) ?>
  </div>
  <!-- Height -->
  <div class="mt-4">
    <?php boxShadowGeneratorComponent( 'range', [
      'max'   => 200,
      'min'   => 50,
      'label' => 'Height',
      'value' => 'context.boxProperties.height',
    ] ) ?>
  </div>
</div>