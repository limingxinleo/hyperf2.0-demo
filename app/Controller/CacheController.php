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
namespace App\Controller;

use App\Service\CacheService;
use Hyperf\Cache\Annotation\Cacheable;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * @AutoController(prefix="cache")
 */
class CacheController extends Controller
{
    public function index()
    {
        var_dump(memory_get_usage());
        return $this->response->success(
            di()->get(CacheService::class)->uuid(1)
        );
    }

    /**
     * @Cacheable(prefix="cache:controller")
     */
    public function cache()
    {
        return $this->response->success(uniqid());
    }
}
