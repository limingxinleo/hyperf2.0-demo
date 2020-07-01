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
class ModelTest extends HttpTestCase
{
    public function testModelBelongTo()
    {
        $res = $this->get('/model/belong');
        $this->assertSame(0, $res['code']);
        $this->assertSame(1, $res['data']['user']['id']);
        $this->assertSame(1, $res['data']['book']['id']);
    }

    public function testModelHasMany()
    {
        $res = $this->get('/model/many');
        $this->assertSame(0, $res['code']);
        $this->assertSame(1, $res['data']['user']['id']);
        $this->assertIsArray($res['data']['books']);
    }

    public function testModelMorphOne()
    {
        $res = $this->get('/model/morphOne');
        $this->assertSame(0, $res['code']);
        $this->assertSame(1, $res['data']['user']['id']);
        $this->assertSame(1, $res['data']['image']['id']);
    }
}
