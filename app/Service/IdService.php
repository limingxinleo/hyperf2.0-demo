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
namespace App\Service;

use Hyperf\Config\Annotation\Value;

class IdService
{
    /**
     * @Value(key="demo.id")
     * @var string
     */
    protected $id;

    public function id()
    {
        return uniqid();
    }

    public function idFromConfig()
    {
        return $this->id;
    }
}
