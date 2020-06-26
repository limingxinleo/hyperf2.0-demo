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
        return $this->response->success([
            $this->di->service->id(),
            $this->di->dao->id(),
        ]);
    }
}
