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
use function Hyperf\ViewEngine\view;

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
        $name = $this->request->input('name', 'Hyperf');
        // return (string)view($template, ['name' => $name]);
        return $this->render->render($template, ['name' => $name,]);
    }

    public function child()
    {
        return (string)view('child');
    }
}
