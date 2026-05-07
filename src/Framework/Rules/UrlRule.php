<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;
use Override;

class UrlRule implements RuleInterface
{
  #[Override]
  public function validate(array $data, string $field, array $params): bool
  {
    return (bool) filter_var($data[$field], FILTER_VALIDATE_URL);
  }

  #[Override]
  public function getMessage(array $data, string $field, array $params): string
  {
    return "Invalid URL";
  }
}
