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

use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\View\RenderInterface;

/**
 * @AutoController(prefix="view")
 */
class ViewController extends Controller
{
    /**
     * @Inject
     * @var RenderInterface
     */
    protected $render;

    public function index()
    {
        $template = 'index';
        return $this->render->render($template, [
            'name' => $this->request->input('name', 'Hyperf'),
        ]);
    }
}
