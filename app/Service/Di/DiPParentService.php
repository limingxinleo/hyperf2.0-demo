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

use App\Service\Dao\UserDao;
use App\Service\IdService;
use Hyperf\Di\Annotation\Inject;

class DiPParentService
{
    /**
     * @Inject
     * @var IdService
     */
    public $parent;

    /**
     * @Inject
     * @var UserDao
     */
    public $pp;
}
