<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Middleware\{AuthRequiredMiddleware, CsrfGuardMiddleware, CsrfTokenMiddleware, FlashMiddleware, GuestOnlyMiddleware, TemplateDataMiddleware, ValidationExceptionMiddleware, SessionMiddleware};

function registerMiddleware(App $app)
{
  $app->addMiddleware(CsrfGuardMiddleware::class);
  $app->addMiddleware(CsrfTokenMiddleware::class);
  $app->addMiddleware(TemplateDataMiddleware::class);
  $app->addMiddleware(ValidationExceptionMiddleware::class);
  $app->addMiddleware(FlashMiddleware::class); // flash session
  $app->addMiddleware(SessionMiddleware::class); // enable session
}
