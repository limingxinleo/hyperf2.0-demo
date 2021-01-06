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
namespace App\Service;

use Carbon\Carbon;
use Hyperf\AsyncQueue\Annotation\AsyncQueueMessage;

class QueueService
{
    /**
     * @AsyncQueueMessage
     */
    public function sleep(int $time)
    {
        sleep($time);
        var_dump('asdf' . $time);
    }

    /**
     * @AsyncQueueMessage
     */
    public function first()
    {
        dump('first-begin: ' . Carbon::now()->toDateTimeString());
        $this->second();
        dump('first-end: ' . Carbon::now()->toDateTimeString());
    }

    /**
     * @AsyncQueueMessage
     */
    public function second()
    {
        dump('second-begin: ' . Carbon::now()->toDateTimeString());
        sleep(2);
        dump('second-end: ' . Carbon::now()->toDateTimeString());
    }

    /**
     * @AsyncQueueMessage
     * @param mixed $user
     */
    public function model($user)
    {
        dump($user);
    }
}
