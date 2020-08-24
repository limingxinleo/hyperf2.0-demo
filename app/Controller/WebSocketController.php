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

use Hyperf\Contract\OnCloseInterface;
use Hyperf\Contract\OnMessageInterface;
use Hyperf\Contract\OnOpenInterface;
use Hyperf\Utils\Codec\Json;
use Swoole\Http\Request;
use Swoole\Http\Response;
use Swoole\WebSocket\Frame;
use Swoole\WebSocket\Server;

class WebSocketController implements OnMessageInterface, OnOpenInterface, OnCloseInterface
{
    public function onClose($server, int $fd, int $reactorId): void
    {
        var_dump('close');
    }

    /**
     * @param Response|Server $server
     */
    public function onMessage($server, Frame $frame): void
    {
        if ($server instanceof Server) {
            $server->push($frame->fd, Json::encode([
                'fd' => $frame->fd,
                'data' => $frame->data,
            ]));
        } else {
            $server->push(Json::encode([
                'fd' => $server->fd,
                'data' => $frame->data,
            ]));
        }
    }

    public function onOpen($server, Request $request): void
    {
        var_dump('open');
    }
}
