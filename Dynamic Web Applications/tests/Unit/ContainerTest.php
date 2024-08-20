<?php

use Core\Container;

test('it can resolve something out of the container', function () {
    $container = new Container();

    $container->bind('test', fn() => 'function');

    $result = $container->resolve('test');

    expect($result)->toEqual('function');
});