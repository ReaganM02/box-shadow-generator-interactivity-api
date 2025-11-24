<?php
$config = [
  'fruits' => [
    [
      'id'   => 0,
      'data' => [
        'apple'  => 1,
        'orange' => 10,
      ],
    ],
  ],
];
?>
<div data-wp-interactive="MyCounter"
     <?php echo wp_interactivity_data_wp_context( $config ) ?>
     data-wp-watch="callbacks.update">
  <ul>
    <button data-wp-on--click="actions.newSetOfFruits">Add New Fruits</button>
    <template data-wp-each="context.fruits"
              data-wp-key="context.item.id">
      <li>
        <div>
          <span>ID: </span>
          <span data-wp-text="context.item.id"></span>
        </div>
        <div>
          <span>Orange:</span>
          <span data-wp-text="context.item.data.orange"></span>
        </div>
        <button data-wp-on--click="actions.addOrange">Add Orange</button>
      </li>
    </template>
  </ul>
</div>