<?php
/* framework router class
 * @author Vahid Aghazade <v.opsource@gmail.com>
 * @package app\core
 */

namespace app\core\base;

use app\core\base\Request;
use app\core\base\Response;

class Router
{
    protected array $routes = [];
    public Request $request;
    public Response $response;
    public $instance;

    /**
     * Router constructor.
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }


    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView('404');
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback))
            $callback[0] = new $callback[0];

        return call_user_func($callback, $this->request);
    }

    public function renderView($view, $params = [])
    {
        $layoutContent = $this->renderContentView();
        $viewContent = $this->renderEmptyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    private function renderContent($content)
    {
        $layoutContent = $this->renderContentView();
        return str_replace('{{content}}', $content, $layoutContent);
    }

    protected function renderContentView($pathView = null)
    {
        ob_start();
        if (!is_null($pathView)) {
            include_once App::$CURRENT_PATH . "/core/Views/$pathView.php";
        } else {
            include_once App::$CURRENT_PATH . "/core/Views/layouts/layout.php";
        }
        return ob_get_clean();
    }

    protected function renderEmptyView($view, $params)
    {
        if (!is_null($params))
        foreach ($params as $key => $value){
            $$key = $value;
        }

        ob_start();
        include_once App::$CURRENT_PATH . "/core/Views/$view.php";
        return ob_get_clean();
    }


}