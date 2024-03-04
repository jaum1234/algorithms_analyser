<?php

namespace Joaocoura\AlgAnalyser\Algorithms;

class ArrayFlip extends Algorithm {
    protected function instructions(...$inputs) {
        array_flip($inputs[0]);
    }

    protected function validateInputs(array $inputs): bool {
        return $this->validator->validate($inputs, "is_array");
    }
}