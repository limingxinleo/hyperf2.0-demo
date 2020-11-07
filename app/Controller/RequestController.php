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

use App\Request\MobileRequest;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * @AutoController(prefix="/request")
 */
class RequestController extends Controller
{
    public function mobile(MobileRequest $request)
    {
        return $this->response->success(
            $request->input('mobile')
        );
    }

    public function mobile2()
    {
    }
}
