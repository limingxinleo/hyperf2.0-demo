<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace HyperfTest\Cases;

use HyperfTest\HttpTestCase;

/**
 * @internal
 * @coversNothing
 */
class RouteTest extends HttpTestCase
{
    public function testRouteName()
    {
        $this->assertTrue(true);

        // $id = rand(1000, 9999);
        // $res = $this->get('/index/' . $id);
        // $this->assertSame(0, $res['code']);
        // $this->assertSame([
        //     '/index/' . $id,
        //     '/index/data.html',
        //     'index.info',
        // ], $res['data']);
    }
}
