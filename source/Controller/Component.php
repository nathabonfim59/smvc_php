<?php

namespace Source\Controller;

class Component 
{
    const PATH = "/mnt/d/Projetos/Cursos/PHP/1_php_mysql_casadocodigo/1_Calendario/source/View/Components/";

    private $data;
    /**
     * Renderiza um componente disponível com os dados especificados
     *
     * @param string $name Nome do componente (mesmo nome do arquivo)
     * @param array $data Array associativo com os dados do componente
     * @return string
     */
    public static function render(string $name, array $data = array()): string
    {
        $component_path = Component::PATH . $name . ".php";
        if (!Component::isValidComponent($component_path)) {
            return "";
        }

        $render_output = "";
        $render_output .= include_once($component_path);

        return $render_output;
    }

    protected static function isValidComponent(string $name): bool
    {
        $valid_component = file_exists($name);

        return $valid_component;
    }
}