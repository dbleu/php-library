<?php
namespace dbleu\exceptions;

class InvalidTokenException extends Exception {
  public function errorMessage() {
    $errorMsg = "Please provide a valid token.";
    return $errorMsg;
  }
}