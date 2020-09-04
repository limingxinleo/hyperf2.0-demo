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

use Hyperf\HttpServer\Annotation\Controller as AController;
use Hyperf\HttpServer\Annotation\GetMapping;

/**
 * Class CamelTestController.
 * @AController(prefix="camel-test")
 */
class CamelTestController extends Controller
{
    /**
     * @GetMapping(path="index")
     */
    public function index()
    {
        return $this->response->success();
    }
}
