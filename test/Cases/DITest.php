<?php


namespace HyperfTest\Cases;


use HyperfTest\HttpTestCase;

class DITest extends HttpTestCase
{
    public function testDiParentInject()
    {
        $res = $this->get('/di/parentValue');
        $this->assertSame(0, $res['code']);
        $this->assertSame(2, count($res['data']));
    }
}
