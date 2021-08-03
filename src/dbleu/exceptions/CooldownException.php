<?php
namespace dbleu\exceptions;

class CooldownException extends \Exception {
  public function errorMessage() {
    $errorMsg = "You are Rate-Limited.";
    return $errorMsg;
  }
}
