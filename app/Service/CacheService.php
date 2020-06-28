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
namespace App\Service;

use Hyperf\Cache\Annotation\Cacheable;

class CacheService extends IdService
{
    /**
     * @Cacheable(prefix="cache")
     */
    public function uuid(int $id): string
    {
        return uniqid();
    }
}
