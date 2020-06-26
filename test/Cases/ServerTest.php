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
class ServerTest extends HttpTestCase
{
    public function testServerResponse()
    {
        $res = $this->get('/server/response', [
            'Content-Type' => 'application/json',
        ]);

        $this->assertSame(0, $res['code']);
    }
}
