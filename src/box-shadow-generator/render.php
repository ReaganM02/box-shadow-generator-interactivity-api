<?php
/**
 * PHP file to use when rendering the block type on the server to show on the front end.
 *
 * The following variables are exposed to the file:
 *     $attributes (array): The block attributes.
 *     $content (string): The block default content.
 *     $block (WP_Block): The block instance.
 *
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
$config = [
  'shadows' => [
    [
      'id'   => time() * 1000,
      'data' => [
        'horizontalOffset' => 10,
        'verticalOffset'   => 10,
        'blur'             => 10,
        'spread'           => 10,
      ],
    ],
  ],
]
  ?>
<main data-wp-interactive="boxShadowGenerator"
      <?php echo wp_interactivity_data_wp_context( $config ) ?>
      class="bg-white m-auto mt-4 border rounded container">
  <div class="p-4">
    <h1 class="font-bold text-zinc-800 text-2xl text-center"><?php echo esc_html( bloginfo( 'name' ) ) ?></h1>
    <div class="text-zinc-600 text-center"><?php echo esc_html( bloginfo( 'description' ) ) ?></div>
  </div>
  <div class="grid grid-cols-2 p-4">
    <div class="m-4">
      <div class="mb-4">
        <button class="bg-blue-500 shadow-md shadow-zinc-300 px-4 py-2 border border-blue-600 rounded-md text-white"
                data-wp-on--click="actions.newShadow">New
          Shadow</button>
      </div>
      <ul class="gap-2 grid">
        <template data-wp-each="context.shadows">
          <li data-wp-key="context.item.id"
              class="shadow-md p-2 border rounded-md">
            <span>Hello</span>
            <button data-wp-on--click="actions.toggleVisibility">Hide</button>
          </li>
        </template>
      </ul>
    </div>
    <div>Hello</div>
  </div>
</main>