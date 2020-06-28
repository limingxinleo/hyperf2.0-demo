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

use App\Service\Aop\AopService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * Class AopController.
 * @AutoController(prefix="aop")
 */
class AopController extends Controller
{
    /**
     * @Inject
     * @var AopService
     */
    protected $aop;

    public function index()
    {
        $result = [];
        $result[] = $this->aop->getAopString();
        $result[] = $this->aop->getParentString();
        return $this->response->success($result);
    }
}
