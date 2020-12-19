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
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\Validation\Contract\ValidatorFactoryInterface;
use Hyperf\Validation\ValidationException;

/**
 * @AutoController(prefix="/request")
 */
class RequestController extends Controller
{
    /**
     * @Inject
     * @var ValidatorFactoryInterface
     */
    protected $validationFactory;

    public function mobile(MobileRequest $request)
    {
        return $this->response->success(
            $request->input('mobile')
        );
    }

    public function mobile2()
    {
        $validator = $this->validationFactory->make(
            $this->request->all(),
            [
                'mobile' => 'required|mobile',
            ],
            [
                'mobile.mobile' => '手机号格式错误',
            ]
        );

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $this->response->success();
    }

    public function all()
    {
        // 如何在中间件中，修改 Request 的入参
        return $this->response->success(
            $this->request->all()
        );
    }
}
