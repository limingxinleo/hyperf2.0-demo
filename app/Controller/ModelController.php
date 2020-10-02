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
namespace App\Controller;

use App\Model\Image;
use App\Model\User;
use App\Model\UserRolePivot;
use App\Model\UserSearchable;
use App\Service\Dao\BookDao;
use App\Service\Dao\UserDao;
use Carbon\Carbon;
use Hyperf\DbConnection\Db;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\Paginator\LengthAwarePaginator;

/**
 * @AutoController(prefix="model")
 */
class ModelController extends Controller
{
    public function belong()
    {
        $book = di()->get(BookDao::class)->first(1);

        return $this->response->success([
            'book' => $book->toArray(),
            'user' => $book->user->toArray(),
        ]);
    }

    public function many()
    {
        $user = di()->get(UserDao::class)->first(1);
        var_dump($user->user_name);

        return $this->response->success([
            'user' => $user->toArray(),
            'books' => $user->books->toArray(),
            'ext' => $user->ext->toArray(),
        ]);
    }

    public function morphOne()
    {
        $user = di()->get(UserDao::class)->first(1);

        return $this->response->success([
            'user' => $user->toArray(),
            'image' => $user->image->toArray(),
        ]);
    }

    public function morphTo()
    {
        $image = Image::query()->find(1);

        return $this->response->success([
            'imageable' => $image->imageable->toArray(),
            'image' => $image->toArray(),
        ]);
    }

    public function object()
    {
        $res = Db::selectOne('SELECT * FROM `user` WHERE `id` = 1;');
        var_dump($res);
        return $this->response->success($res);
    }

    public function resource()
    {
        return User::query()->find(1);
    }

    public function pagination()
    {
        $items = [
            ['id' => 1, 'name' => 'Hyperf'],
            ['id' => 2, 'name' => 'Swoole'],
        ];
        $page = new LengthAwarePaginator($items, 10, 2);
        return $this->response->success($page->toArray());
    }

    public function insertGetId()
    {
        $res = Db::connection()->table('images')->insertGetId([
            'url' => 'https://avatars2.githubusercontent.com/u/44228082?s=200&v=4',
            'imageable_id' => 0,
            'imageable_type' => '',
        ]);

        return $this->response->success($res);
    }

    public function datetime()
    {
        $res = Db::select('SELECT NOW();');

        return $this->response->success($res);
    }

    public function cache()
    {
        return $this->response->success(
            User::findFromCache(1)->toArray()
        );
    }

    public function pivot()
    {
        $model = UserRolePivot::query()->find(1);
        $model->created_at = Carbon::now();
        return $this->response->success(
            $model->save()
        );
    }

    public function searchable()
    {
        $models = UserSearchable::search('Hyperf')->get();
        return $this->response->success($models->toArray());
    }
}
