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
namespace App\Resource;

use Hyperf\Resource\Json\JsonResource;

class UserResource extends JsonResource
{
    public $wrap = 'result';

    /**
     * Transform the resource into an array.
     */
    public function toArray(): array
    {
        return parent::toArray();
    }
}
