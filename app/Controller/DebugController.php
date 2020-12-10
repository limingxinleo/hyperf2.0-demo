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

use Hyperf\HttpServer\Annotation\AutoController;
use Symfony\Component\VarDumper\VarDumper;

/**
 * @AutoController(prefix="debug")
 */
class DebugController extends Controller
{
    public function dump()
    {
        dump($this->request->all());
        // VarDumper::dump($this->request->all(), true);
        return $this->response->success();
    }

    public function dd()
    {
        dd($this->request->all());
        return $this->response->success();
    }
}
