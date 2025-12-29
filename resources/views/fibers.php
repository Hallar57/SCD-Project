<?php
$fiber = new Fiber(function () {
    echo "Fiber is working \n";

    Fiber::suspend("fiber is paused \n");

    echo "Fiber resumed \n";
});

$value = $fiber->start();
echo "$value";
$fiber->resume();
