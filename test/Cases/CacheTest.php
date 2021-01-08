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

use App\Service\CacheService;
use HyperfTest\HttpTestCase;

/**
 * @internal
 * @coversNothing
 */
class CacheTest extends HttpTestCase
{
    public function testCacheable()
    {
        $res = $this->get('/cache/index');
        $this->assertSame(0, $res['code']);
        $this->assertSame($res['data']['uuid'], di()->get(CacheService::class)->uuid(1));
    }
}
