<div class="flex items-center gap-2 w-max cursor-pointer"
     data-wp-class--inset-enabled="<?php echo esc_attr( $data['value'] ) ?>"
     data-wp-on--click="actions.toggleSwitch">
  <div class="relative items-center grid bg-zinc-200 rounded-full w-8 h-4 transition-all switch"></div>
  <div class="text-zinc-600 text-base"><?php echo esc_html( $data['label'] ) ?></div>
</div>