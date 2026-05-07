<?php

declare(strict_types=1);

use Framework\TemplateEngine;
use App\Config\Paths;
use App\Services\ValidatorService;
use Framework\Database;

return [
  TemplateEngine::class => fn() => new TemplateEngine(Paths::VIEW),
  ValidatorService::class => fn() => new ValidatorService(),
  Database::class => fn() => new Database($_ENV['DB_DRIVER'], ['host' => $_ENV['DB_HOST'], 'dbname' => $_ENV['DB_NAME'], 'port' => $_ENV['DB_PORT']], $_ENV['DB_USER'], $_ENV['DB_PASS']),
];
