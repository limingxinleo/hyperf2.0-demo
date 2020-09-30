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

/**
 * @property int $id
 * @property string $name
 * @property int $gender
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \App\Model\Book[]|\Hyperf\Database\Model\Collection $books
 * @property \App\Model\UserExt $ext
 * @property string $user_name
 * @property \App\Model\Image $image
 */
class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'gender', 'created_at', 'updated_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'gender' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function books()
    {
        return $this->hasMany(Book::class, 'user_id', 'id');
    }

    public function ext()
    {
        return $this->hasOne(UserExt::class, 'id', 'id');
    }

    public function setUserNameAttribute(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function getUserNameAttribute(): string
    {
        return $this->name;
    }
}
