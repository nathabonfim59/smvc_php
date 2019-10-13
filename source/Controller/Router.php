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
    private $available_routes = array();

    public function __construct() {
        $this->request = $_SERVER['REQUEST_URI'];
    }

    /**
     * Recupera a URL sendo requisistada
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->request;
    }

    /**
     * Cria uma nova rota
     *
     * @param string $endpoint URL que a rota será servida
     * @param string $page_path Localização da a página
     * @param string $page_title Título da página
     * @return void
     */
    public function createRoute(string $endpoint, string $page_path, string $page_title = 'Untitled Page'): void
    {
        $this->available_routes[$endpoint] = array(
            'path'  => $page_path,
            'title' => $page_title
        );
    }

    public function run() {
        $page = new Page();
        
        $valid_route = array_key_exists($this->getEndpoint(), $this->available_routes);

        if (!$valid_route) {
            $page->setTitle('Página não encontrada');
            $page->setPath('errors/404');
            $page->setData(array("message" => "A página '{$this->getEndpoint()}' foi não encontrada."));
        } else {
            $endpoint_data = ($this->available_routes[$this->getEndpoint()]);
            
            $page->setTitle($endpoint_data['title']);
            $page->setPath($endpoint_data['path']);
            
            $page->setData(array(
                "endpoint" => $this->getEndpoint()
            ));
        }

        $page->render();
    }
}