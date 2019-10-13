<?php

use Source\Controller\Page;

require_once __DIR__ . "/vendor/autoload.php";

$page = new Page("About", "about");

$page->render();