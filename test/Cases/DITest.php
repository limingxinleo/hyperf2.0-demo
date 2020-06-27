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
class DITest extends HttpTestCase
{
    public function testDiParentInject()
    {
        $res = $this->get('/di/parentValue');
        $this->assertSame(0, $res['code']);
        $this->assertSame(4, count($res['data']));
    }
}
