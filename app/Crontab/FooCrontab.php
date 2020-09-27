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
namespace App\Crontab;

use Carbon\Carbon;
use Hyperf\Crontab\Annotation\Crontab;

/**
 * @Crontab(name="Foo", rule="* * * * * *", callback="execute")
 */
class FooCrontab
{
    public function execute()
    {
        $time = Carbon::now();
        var_dump($time->toDateTimeString());
    }
}
