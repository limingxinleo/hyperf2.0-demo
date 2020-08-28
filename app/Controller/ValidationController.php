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

use App\Request\UserNameRequest;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * Class ValidationController.
 * @AutoController(prefix="validation")
 */
class ValidationController extends Controller
{
    public function index(UserNameRequest $request)
    {
        return $this->response->success(
            $request->all()
        );
    }
}
