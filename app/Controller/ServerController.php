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

use App\Rpc\JsonRpc\IdGenerateInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * @AutoController
 */
class ServerController extends Controller
{
    /**
     * @Inject
     * @var IdGenerateInterface
     */
    protected $idGenerator;

    public function response()
    {
        return $this->response->success();
    }

    public function rpc()
    {
        $result = $this->idGenerator->id('sss');

        return $this->response->success($result);
    }
}
