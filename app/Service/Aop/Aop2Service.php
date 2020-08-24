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
namespace App\Service\Aop;

class Aop2Service extends ParentService
{
    use AopTrait;

    public function getAopString(string $prefix)
    {
        return $prefix . 'aop';
    }
}
