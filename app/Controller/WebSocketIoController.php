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

use Hyperf\Redis\Redis;
use Hyperf\SocketIOServer\Annotation\Event;
use Hyperf\SocketIOServer\Annotation\SocketIONamespace;
use Hyperf\SocketIOServer\BaseNamespace;
use Hyperf\SocketIOServer\Socket;
use Hyperf\Utils\ApplicationContext;
use Hyperf\Utils\Codec\Json;

/**
 * @SocketIONamespace("/")
 */
class WebSocketIoController extends BaseNamespace
{
    /**
     * @Event("mappingUser")
     * @param string $data
     */
    public function onMappingUser(Socket $socket, $data)
    {
        $container = ApplicationContext::getContainer();
        $redis = $container->get(Redis::class);
        $redis->set('ws:user' . $data, $socket->getSid(), 3600);
    }

    /**
     * @Event("msg")
     * @param string $data
     */
    public function onMsg(Socket $socket, $data)
    {
        var_dump($data);
        $container = ApplicationContext::getContainer();
        $redis = $container->get(Redis::class);
        $data = Json::decode($data);
        $to = $redis->get('ws:user' . $data['to']);
        if ($to) {
            $socket->to($to)->emit('event', $data['message']);
            $socket->local->emit('event', $data['message']);
        }
    }

    /**
     * @Event("event")
     * @param string $data
     */
    public function onEvent(Socket $socket, $data)
    {
        var_dump($data);
        return $data;
    }

    /**
     * @Event("join-room")
     * @param string $data
     */
    public function onJoinRoom(Socket $socket, $data)
    {
        var_dump($data);
        $data = Json::decode($data);
        // 将当前用户加入房间
        $socket->join((string) $data['group']);
        if ($data['first']) {
            $socket->in((string) $data['group'])->emit('event', "{$data['inviter']} 邀请 {$data['join']} 加入了群聊");
        }

        // 向房间内其他用户推送（不含当前用户）
        //$socket->to($data)->emit('event', $socket->getSid() . "has joined {$data}");
        // 向房间内所有人广播（含当前用户）
        //$socket->emit('event', 'There are ' . count($socket->getAdapter()->clients($data)) . " players in {$data}");
    }

    /**
     * @Event("group-msg")
     * @param string $data
     */
    public function onGroupMsg(Socket $socket, $data)
    {
        var_dump($data);
        $data = Json::decode($data);
        $socket->in((string) $data['group'])->emit('event', $data['message']);
        $socket->local->emit('event', $data['message']);
    }
}
