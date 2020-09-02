<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
require 'vendor/autoload.php';

run(function () {
    $con = new \Hyperf\Utils\Coroutine\Concurrent(10);
    $pool = new \Hyperf\Pool\Channel(100);
    for ($i = 0; $i < 100; ++$i) {
        $pool->push($i);
        $con->create(function () use ($pool) {
            sleep(1);
            var_dump($pool->pop(1));
        });
    }

    var_dump('end');
});
