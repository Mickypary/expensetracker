<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;
use Override;

class InRule implements RuleInterface
{
  #[Override]
  public function validate(array $data, string $field, array $params): bool
  {
    return in_array($data[$field], $params);
  }
  #[Override]
  public function getMessage(array $data, string $field, array $params): string
  {
    return "Invalid selection";
  }
}
