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
namespace App\Rpc\JsonRpc;

use App\Constants\ErrorCode;
use App\Exception\BusinessException;
use App\Service\Dao\UserDao;
use Hyperf\RpcServer\Annotation\RpcService;
use Hyperf\Utils\Context;
use Psr\Http\Message\ResponseInterface;

/**
 * @RpcService(name="IdGenerateService", protocol="jsonrpc-tcp-length-check", server="jsonrpc")
 */
class IdGenerateService implements IdGenerateInterface
{
    public function id(string $id): string
    {
        $response = Context::get(ResponseInterface::class);
        $server = $response->getAttribute('server');
        var_dump(get_class($server));

        $user = di()->get(UserDao::class)->first(1);
        return (string) $id . $user->name . uniqid();
    }

    public function exception()
    {
        throw new BusinessException(ErrorCode::SERVER_ERROR, 'Inner Server Error');
    }
}
