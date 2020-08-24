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
namespace HyperfTest\Cases;

use HyperfTest\HttpTestCase;

/**
 * @internal
 * @coversNothing
 */
class DITest extends HttpTestCase
{
    public function testDiParentInject()
    {
        $res = $this->get('/di/parentValue');
        $this->assertSame(0, $res['code']);
        $this->assertSame(5, count($res['data']));
    }

    public function testMagicMethods()
    {
        $res = $this->get('/di/methods');
        $this->assertSame(0, $res['code']);
        $this->assertSame(['App\\Rpc\\JsonRpc\\TestService::methods', 'methods'], $res['data']);
    }
}
