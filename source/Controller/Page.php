<?php

namespace Source\Controller;


class Page 
{
    const PAGES_PATH = "/mnt/d/Projetos/Cursos/PHP/1_php_mysql_casadocodigo/1_Calendario/source/View/Pages/";

    private $realpath;
    private $title;

    /**
     * Define o título e a localização da página.
     *
     * @param string $title Título da página
     * @param string $path Localização da página
     */
    public function __construct(string $title = '', string $path = '')
    {
        $this->setTitle($title);
        $this->setPath($path);
    }

    /**
     * Define o título da página
     *
     * @param string $title Título da página
     * @return void
     */
    public function setTitle(string $title): void 
    {
        $this->title = $title;
    }

    /**
     * Define o caminho da página
     *
     * @param string $path Caminho do arquivo-fonte da página
     * @return boolean
     */
    public function setPath(string $path): bool 
    {
        $realpath = Page::PAGES_PATH . $path . ".php";
        
        $valid_file = file_exists($realpath);

        if ($valid_file) {
            $this->realpath = $realpath;
        }

        return $valid_file;
    }


    /**
     * Carrega a página especificada no método setPath()
     *
     * @return boolean
     */
    public function render(): bool 
    {
        $valid_page = file_exists($this->realpath);

        if ($valid_page) {
            include_once($this->realpath);
        }

        return $valid_page;
    }

    /**
     *  Carrega um componente para a página
     *
     * @param string $name Nome do componente (arquivo)
     * @param array $data Array associativo com os dados do componente
     * @return string
     */
    public function component(string $name, array $data = array()): string 
    {
        return Component::render($name, $data);
    }

}