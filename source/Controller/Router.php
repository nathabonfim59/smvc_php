<?php

namespace Source\Controller;

class Router {

    /**
     * Requesição ao servidor
     * 
     * @var string $request
     */
    private $request;

    /**
     * Lista de rotas permitidas
     * 
     * @var array $available_routes
     */
    private $available_routes;

    public function __construct() {
        $this->request = $_SERVER['REQUEST_URI'];
    }

    public function getResquest() {
        return $this->request;
    }

    public function createRoute(string $route, $page) {
        array_push($this->available_routes, array($route => $page));
    }
}