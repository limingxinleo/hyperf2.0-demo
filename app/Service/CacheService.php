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
namespace App\Service;

use Hyperf\Cache\Annotation\Cacheable;

class CacheService
{
    /**
     * @Cacheable(prefix="cache")
     */
    public function uuid(int $id): string
    {
        return uniqid();
    }
}
