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
namespace App\Rpc\JsonRpc;

use Hyperf\RpcServer\Annotation\RpcService;

/**
 * @RpcService(name="IdGenerateService", protocol="jsonrpc-tcp-length-check", server="jsonrpc")
 */
class IdGenerateService implements IdGenerateInterface
{
    public function id(string $id): string
    {
        return (string) $id . uniqid();
    }
}
