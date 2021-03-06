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
class RequestTest extends HttpTestCase
{
    public function testRequestMobile()
    {
        $res = $this->get('/request/mobile', [
            'mobile' => 'abc',
        ]);

        $this->assertSame(500, $res['code']);
        $this->assertSame('手机号格式错误', $res['message']);

        $res = $this->get('/request/mobile', [
            'mobile' => '18678010000',
        ]);

        $this->assertSame(0, $res['code']);

        $res = $this->get('/request/mobile2', [
            'mobile' => 'abc',
        ]);

        $this->assertSame(500, $res['code']);
        $this->assertSame('手机号格式错误', $res['message']);

        $res = $this->get('/request/mobile2', [
            'mobile' => '18678010000',
        ]);

        $this->assertSame(0, $res['code']);
    }

    public function testMiddlewareAddedToParsedData()
    {
        $res = $this->get('/request/all', ['id' => 1]);
        $this->assertSame(0, $res['code']);
        $this->assertSame(['name' => 'Hyperf', 'id' => '1'], $res['data']);
    }
}
