Order details
<?php var_dump($order->title); ?>
Customer details
<?php var_dump($order->customer->name); ?>

Order status
<?php foreach ($order->statuses as $status){
    var_dump($status->title);
} ?>

<?php var_dump($order->shipment->cutoff); ?>

<?php foreach ($transshipments as $transshipment){
    var_dump($transshipment->origin->title);
} ?>
