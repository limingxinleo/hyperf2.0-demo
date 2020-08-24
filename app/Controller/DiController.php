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

use App\Rpc\JsonRpc\TestService;
use App\Service\DemoService;
use App\Service\Di\DiService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * @AutoController(prefix="/di")
 */
class DiController extends Controller
{
    /**
     * @Inject
     * @var DiService
     */
    protected $di;

    public function parentValue()
    {
        $result = [];
        $result[] = $this->di->service->id();
        $result[] = $this->di->dao->id();
        $result[] = $this->di->parent->id();
        $result[] = $this->di->xxx();
        $result[] = $this->di->pp->id();
        return $this->response->success($result);
    }

    public function traitValue()
    {
        $result = [];
        $result[] = di()->get(DemoService::class)->idService->id();
        return $this->response->success($result);
    }

    public function methods()
    {
        return $this->response->success(
            di()->get(TestService::class)->methods()
        );
    }
}
