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
namespace App\Process;

use Hyperf\Contract\ConfigInterface;
use Hyperf\Process\AbstractProcess;
use Hyperf\Process\Annotation\Process;

/**
 * @Process(name="DebugProcess")
 */
class DebugProcess extends AbstractProcess
{
    public function handle(): void
    {
        while (true) {
            sleep(5);
            var_dump(di()->get(ConfigInterface::class)->get('test'));
        }
    }
}
