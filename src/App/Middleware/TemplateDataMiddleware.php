<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;
use Framework\TemplateEngine;
use Override;

class TemplateDataMiddleware implements MiddlewareInterface
{
  public function __construct(private TemplateEngine $view) {}
  #[Override]
  public function process(callable $next)
  {
    $this->view->addGlobal('title', 'Expense Tracking App');
    $next();
  }
}
