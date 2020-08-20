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

use App\Service\Aop\Aop2Service;
use App\Service\Aop\AopService;
use App\Service\Circle\CircleA;
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
        $result[] = $this->aop->getAopString('');
        $result[] = $this->aop->getParentString('');
        $result[] = $this->aop->getTraitString('');
        return $this->response->success($result);
    }

    public function aop()
    {
        $aop = di()->get(Aop2Service::class);
        $result = [];
        $result[] = $aop->getAopString('1');
        $result[] = $aop->getParentString('1');
        $result[] = $aop->getTraitString('1');
        return $this->response->success($result);
    }

    public function circle()
    {
        try {
            di()->get(CircleA::class);
        } catch (\Throwable $exception) {
            var_dump($exception->getMessage());

        }
        return $this->response->success();
    }
}
