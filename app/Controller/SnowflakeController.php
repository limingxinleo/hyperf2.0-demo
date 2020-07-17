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

use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\Snowflake\IdGeneratorInterface;

/**
 * @AutoController(prefix="snowflake")
 */
class SnowflakeController extends Controller
{
    /**
     * @Inject
     * @var IdGeneratorInterface
     */
    protected $idGenerator;

    public function index()
    {
        return $this->response->success(
            $this->idGenerator->generate()
        );
    }
}
