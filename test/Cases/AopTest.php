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
        $res = $this->get('/aop/index');

        $this->assertSame(0, $res['code']);
        $this->assertSame('aop_aspect', $res['data'][0]);
        $this->assertSame('parent_aspect', $res['data'][1]);
        $this->assertSame('trait_aspect', $res['data'][2]);
    }
}
