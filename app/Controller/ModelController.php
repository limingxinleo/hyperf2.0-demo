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
namespace App\Controller;

use App\Model\Image;
use App\Service\Dao\BookDao;
use App\Service\Dao\UserDao;
use Hyperf\HttpServer\Annotation\AutoController;

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

        return $this->response->success([
            'user' => $user->toArray(),
            'books' => $user->books->toArray(),
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
}
