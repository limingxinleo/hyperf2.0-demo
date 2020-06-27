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
namespace App\Service\Di;

use App\Service\Dao\UserDao;
use Hyperf\Di\Annotation\Inject;

class DiParentService extends DiPParentService
{
    public $service;

    /**
     * @Inject
     * @var UserDao
     */
    public $dao;

    public function __construct()
    {
    }

    public function xxx(): string
    {
        return uniqid();
    }
}
