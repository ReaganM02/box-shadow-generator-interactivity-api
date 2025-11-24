<div>
  <div class="text-zinc-600 text-sm"><?php echo esc_html( $data['label'] ) ?></div>
  <div class="flex items-center gap-2 w-full">
    <input type="range"
           step="<?php echo $data['step'] ?? 1 ?>"
           min="<?php echo $data['min'] ?? 0 ?>"
           max="<?php echo $data['max'] ?? 0 ?>"
           data-wp-bind--value="<?php echo esc_attr( $data['value'] ) ?>"
           data-wp-on--input="actions.validateRange"
           data-wp-on--change="actions.validateRange"
           class="w-full" />
    <input type="number"
           data-wp-bind--value="<?php echo esc_attr( $data['value'] ) ?>"
           min="<?php echo $data['min'] ?? 0 ?>"
           max="<?php echo $data['max'] ?? 0 ?>"
           class="border rounded w-14 h-8 text-zinc-600 text-sm text-center"
           data-wp-on--input="actions.validateNumberInput" />
  </div>
</div>