<?php
$config = [
  'shadows'          => [
    [
      'id'   => 1,
      'data' => [
        'inset'            => false,
        'horizontalOffset' => 0,
        'verticalOffset'   => 0,
        'blur'             => 10,
        'spread'           => 0,
        'color'            => '#d4d4d8',
      ],
      'show' => true,
    ],
  ],
  'canvasProperties' => [
    'backgroundColor' => '#fff',
  ],
  'boxProperties'    => [
    'backgroundColor' => '#fff',
    'borderColor'     => '#E0E0E0',
    'roundness'       => 10,
    'width'           => 130,
    'height'          => 130,
  ],
];
?>
<main class="mt-8"
      data-wp-interactive="boxShadowGenerator"
      <?php echo wp_interactivity_data_wp_context( $config ) ?>
      data-wp-watch="callbacks.watchContextChanges">
  <div class="relative flex mx-auto container">
    <aside class="left-0 relative bg-white shadow-lg shadow-zinc-200 p-4 rounded-md w-[450px]">
      <button type="button"
              class="bg-blue-500 shadow px-6 py-2.5 border-0 rounded-lg font-bold text-white text-xs uppercase tracking-wider"
              data-wp-on--click="actions.addNewShadowData">
        Add New Shadow
      </button>
      <div class="mt-4">
        <ul class="border rounded-md divide-y">
          <template data-wp-each="context.shadows"
                    data-wp-key="context.item.id">
            <li class="hover:bg-zinc-50 px-4 py-2"
                data-wp-class--hide-content-shadow="!context.item.show">
              <?php boxShadowGeneratorComponent( 'item' ); ?>
            </li>
          </template>
        </ul>
      </div>
    </aside>
    <div class="w-full">
      <div class="flex bg-white shadow-lg shadow-zinc-200 ml-6 rounded-md overflow-hidden">
        <div class="place-items-center grid w-full"
             data-wp-style--background-color="context.canvasProperties.backgroundColor">
          <!-- Box Example -->
          <div class="size-28 box-result"
               data-wp-style--background-color="context.boxProperties.backgroundColor"
               data-wp-style--box-shadow="state.buildBoxShadow"
               data-wp-style--border-color="context.boxProperties.borderColor"
               data-wp-style--border-radius="state.boxBorderRadius"
               data-wp-style--width="state.boxWidth"
               data-wp-style--height="state.boxHeight"></div>
        </div>
        <div class="border-zinc-200 border-l w-96">
          <div class="p-2">
            <h1 class="font-semibold text-zinc-800 text-lg">Canvas Properties</h1>
            <?php boxShadowGeneratorComponent( 'canvas-properties' ) ?>
          </div>
          <div class="p-2 border-t">
            <h1 class="font-semibold text-zinc-800 text-lg">Box Properties</h1>
            <?php boxShadowGeneratorComponent( 'box-properties' ) ?>
          </div>
        </div>
      </div>
      <!-- Box Shadow CSS Code -->
      <div class="bg-white shadow-lg shadow-zinc-200 mt-6 ml-6 p-4 rounded-md">
        <div class="flex gap-2">
          <input type="text"
                 data-wp-bind--value="state.boxShadowCSS"
                 class="pl-4 border rounded-md w-full h-10 text-zinc-600 text-sm italic" />
          <button type="button"
                  class="bg-blue-600 disabled:opacity-50 px-6 py-1.5 rounded-md text-white text-sm disabled:cursor-not-allowed"
                  data-wp-on--click="actions.copyToClipboard"
                  data-wp-text="state.copyButtonText"
                  data-wp-bind--disabled="state.copied">Copy</button>
        </div>
        <div class="mt-4 text-zinc-400 text-sm">Developed by: Reagan Mahinay</div>
      </div>
    </div>
  </div>
</main>