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
namespace App\Controller;

use App\Service\CacheService;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * @AutoController(prefix="cache")
 */
class CacheController extends Controller
{
    public function index()
    {
        return $this->response->success(
            di()->get(CacheService::class)->uuid(1)
        );
    }
}
