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

use App\Service\Di\DiService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * @AutoController
 */
class ConfigController extends Controller
{
    /**
     * @Inject
     * @var DiService
     */
    protected $di;

    public function config()
    {
        return $this->response->success(
            $this->di->service->idFromConfig()
        );
    }
}
