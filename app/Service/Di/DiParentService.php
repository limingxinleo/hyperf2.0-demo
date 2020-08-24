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
namespace App\Service\Di;

use App\Service\CacheService;
use App\Service\Dao\UserDao;
use App\Service\IdService;
use Hyperf\Di\Annotation\Inject;

class DiParentService extends DiPParentService
{
    /**
     * @Inject
     * @var CacheService
     */
    public $service;

    /**
     * @Inject
     * @var UserDao
     */
    public $dao;

    /**
     * @Inject
     * @var IdService
     */
    public $pp;

    public function __construct()
    {
    }

    public function xxx(): string
    {
        return uniqid();
    }
}
