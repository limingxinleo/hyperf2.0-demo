<?php


namespace App\Service\Aop;


class Aop2Service extends ParentService
{
    use AopTrait;

    public function getAopString()
    {
        return 'aop';
    }
}
