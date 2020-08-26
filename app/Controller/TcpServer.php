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

use Hyperf\Contract\OnReceiveInterface;
use Swoole\Server;

class TcpServer implements OnReceiveInterface
{
    public function onReceive($server, int $fd, int $fromId, string $data): void
    {
        if($server instanceof Server){
            $server->send($fd, 'recv:' . $data);
        }else{
            $server->send('recv:' . $data);
        }
    }
}
