<?php

namespace App;

class Router {

    private string $viewPath;
    private \AltoRouter $router;

    public function __construct(string $viewPath)
    {
        $this->viewPath = $viewPath;
        $this->router = new \AltoRouter();
        echo ("Dans le router");
    }

    public function get(string $url, string $view, ?string $name = null): self
    {
        echo("Nom de la route $name");
        $this->router->map('GET', $url, $view, $name);
        return $this;
    }

    public function run()
    {
        $match = $this->router->match();

        echo('<pre>');
        print_r($this->router);
        echo('</pre>');

        echo ( $this->viewPath . DIRECTORY_SEPARATOR);

        echo ("Dans RUN");
        echo('<pre>');
        echo('coucou');
        print_r($match);
        echo('</pre>');

        $view = $match['target'];

        require $this->viewPath . DIRECTORY_SEPARATOR . "machines" . '.php';

        return $this;
    }
}