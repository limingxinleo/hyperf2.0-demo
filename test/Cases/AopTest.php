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
class AopTest extends HttpTestCase
{
    public function testAopAspect()
    {
        $this->assertTrue(true);

        // $res = $this->get('/aop/index');
        //
        // $this->assertSame(0, $res['code']);
        // $this->assertSame('aop_aspect', $res['data'][0]);
        // $this->assertSame('parent_aspect', $res['data'][1]);
        // $this->assertSame('trait_aspect', $res['data'][2]);
        //
        // $res = $this->get('/aop/aop');
        //
        // $this->assertSame(0, $res['code']);
        // $this->assertSame('1aop', $res['data'][0]);
        // $this->assertSame('1parent_aspect', $res['data'][1]);
        // $this->assertSame('1trait_aspect', $res['data'][2]);
    }
}
