<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\Paths;

class HomeController
{
  // private TemplateEngine $view;
  public function __construct(private TemplateEngine $view)
  {
    // $this->view = new TemplateEngine(Paths::VIEW);
    // var_dump($this->view);
  }
  public function home()
  {
    return $this->view->render('index.php');
  }
}
