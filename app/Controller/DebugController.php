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

/**
 * @AutoController(prefix="debug")
 */
class DebugController extends Controller
{
    public function dump()
    {
        dump($this->request->all());
        dump(true, 123);
        return $this->response->success();
    }

    public function dd()
    {
        dd($this->request->all());
        dump(true, 123);
        return $this->response->success();
    }
}
