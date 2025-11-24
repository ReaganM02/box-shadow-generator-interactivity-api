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
?>
<header class="bg-white shadow-lg shadow-zinc-200 px-6 py-4">
	<div class="flex justify-between items-center mx-auto container">
		<div>
			<a href="<?php echo esc_url( home_url() ) ?>"
				 class="font-bold text-2xl">
				Box Shadow Generator
			</a>
		</div>
		<div>
			Get Code
		</div>
	</div>
</header>