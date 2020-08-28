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
class ValidationTest extends HttpTestCase
{
    public function testValidator()
    {
        $res = $this->get('/validation/index');

        $this->assertSame(500, $res['code']);
        $this->assertSame('username 字段是必须的', $res['message']);
    }
}
