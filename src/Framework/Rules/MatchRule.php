<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;
use Override;

class MatchRule implements RuleInterface
{
  #[Override]
  public function validate(array $data, string $field, array $params): bool
  {
    $fieldOne = $data[$field];
    $fieldTwo = $data[$params[0]];

    return $fieldOne === $fieldTwo;
  }

  #[Override]
  public function getMessage(array $data, string $field, array $params): string
  {
    return "Does not match {$params[0]} field";
  }
}
