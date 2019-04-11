Order details
<?php var_dump($order->title); ?>
Customer details
<?php var_dump($order->customer->name); ?>
Status details
<?php var_dump($order->status->title); ?>
Shipment details
<?php var_dump($order->shipment->container_number); ?>
Transshipment details
<?php foreach( $transshipments as $transshipment){
    var_dump($transshipment->origin->title);
} ?>
