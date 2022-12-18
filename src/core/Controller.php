<?php

class Controller
{
    protected $actionName;
    protected $request;
    protected $databaseManager;

    public function __construct($application)
    {
        $this->request = $application->getRequest();
        $this->databaseManager = $application->getDatabaseManager();
    }

    public function run($action)
    {
        $this->actionName = $action;

        if (!method_exists($this, $action)) {
            throw new HttpNotFoundException();
        }
        $content = $this->$action();
        return $content;
    }

    protected function render($variables = [], $template = null, $layout = 'layout')
    {
        $view = new View(__DIR__ . '/../views');

        if (is_null($template)) {
            $template = $this->actionName;
        }
        // $controllerNameにshuffleやemployeeという文字列が入るようにしている
        $controllerName = strtolower(substr(get_class($this), 0, -10));
        // $pathにはshuffle/indexのようなイメージ
        $path = $controllerName . '/' . $template;

        return $view->render($path, $variables, $layout);
    }
}
