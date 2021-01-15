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
namespace App\Kernel\Http;

use Hyperf\Utils\Context;
use Swoole\Http\Request as SwooleRequest;
use Swoole\Http\Response as SwooleResponse;

class Server extends \Hyperf\HttpServer\Server
{
    protected function initRequestAndResponse($request, $response): array
    {
        Context::set(SwooleRequest::class, $request);
        Context::set(SwooleResponse::class, $response);
        return parent::initRequestAndResponse($request, $response);
    }
}
