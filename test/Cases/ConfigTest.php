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
class ConfigTest extends HttpTestCase
{
    public function testConfigValue()
    {
        $res = $this->get('/config/config');
        $this->assertSame(0, $res['code']);
        $this->assertNotEmpty($res['data']);
    }
}
