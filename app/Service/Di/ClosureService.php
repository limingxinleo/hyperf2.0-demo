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

use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\Di\Annotation\Inject;

class ClosureService
{
    /**
     * @Inject
     * @var StdoutLoggerInterface
     */
    protected $logger;

    public function getClass()
    {
        return new class() extends DiService {
        };
    }
}
