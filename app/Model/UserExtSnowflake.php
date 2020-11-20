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
namespace App\Model;

use Hyperf\Snowflake\Concern\Snowflake;
use Hyperf\Utils\Codec\Json;

class UserExtSnowflake extends UserExt
{
    use Snowflake {
        creating as create;
    }

    public function creating()
    {
        $this->create();
        $this->json = Json::encode((object) []);
    }
}
