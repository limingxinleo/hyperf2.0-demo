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
class SnowflakeTest extends HttpTestCase
{
    public function testSnowflake()
    {
        $res = $this->get('/snowflake/index');
        $this->assertSame(0, $res['code']);
        $this->assertIsInt($res['data']);
    }
}
