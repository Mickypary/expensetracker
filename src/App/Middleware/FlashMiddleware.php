<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;
use Framework\TemplateEngine;
use Override;

class FlashMiddleware implements MiddlewareInterface
{
  public function __construct(private TemplateEngine $view) {}
  #[Override]
  public function process(callable $next)
  {
    $this->view->addGlobal('errors', $_SESSION['errors'] ?? []);
    $this->view->addGlobal('old', $_SESSION['old'] ?? []);

    $next();

    unset($_SESSION['errors']);
    unset($_SESSION['old']);
  }
}
