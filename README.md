# smvc_php
Um framework MVC (Modelo Visão e Controle) simples. Sem dependências externas.

# Como funciona?
Este framework utiliza dois princípios básicos: páginas e componentes. Você pode separar os componentes nas em pastas e criar páginas utilizando-os.

# Requerimentos
[x] PHP 7.2+
[x] Composer
[x] Servidor Web

# Primeiros passos
## 1. Definir as constantes
Vá para Pages.php e Components.php e altere as constantes. Elas especificarão onde serão encontradas as pastas com compoenentes e páginas.

## 2. Definir os endpoits no Router
Dentro de index.php, basta especificar as páginas que ficarão disponíveis
```
use Source\Controller\Router;

require_once __DIR__ . "/vendor/autoload.php";

$router = new Router();

$router->createRoute('/about', 'about', 'Sobre'); // Rota, caminho da página e Título
$router->createRoute('/home', 'home', "Página Inicial");

$router->run(); // Ativa o router

```

## 3. Criar seus próprios componentes e páginas
### Exemplo de página

```
<?php $this->component('header', array('title' => $this->title)); // Carrega o componente 'header' e especifica o título da página
                                                                  // Essa informação ficará disponível dentro do array $component_data
?>

<h1>Página Inicial</h1>

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis assumenda velit officiis sint laudantium! Natus consequuntur odio inventore ea expedita.</p>

<?php $this->component('footer'); // Carrega o componente 'footer'?>
```

# Disclaimer
Este é um projeto que fiz para fins de estudo. Caso tenha algum feedback, sugestão ou contribuição, sinta-se à vontade. :)
