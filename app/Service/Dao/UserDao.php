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
namespace App\Service\Dao;

use App\Model\User;
use App\Service\Service;

class UserDao extends Service
{
    public function first(int $id)
    {
        return User::query()->find($id);
    }

    public function id()
    {
        return uniqid();
    }
}
