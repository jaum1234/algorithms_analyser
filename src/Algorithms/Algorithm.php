<?php

namespace Joaocoura\AlgAnalyser\Algorithms;

use Exception;
use Joaocoura\AlgAnalyser\Validator\InputsValidator;

abstract class Algorithm {
    public function __construct(
        protected InputsValidator $validator
    ) {}

    public function call($inputs) {
        if (!$this->validateInputs($inputs)) throw new Exception("Invalid input.");

        $this->instructions(...$inputs);
    }

    protected abstract function instructions(...$inputs);
    protected abstract function validateInputs(array $inputs);
}