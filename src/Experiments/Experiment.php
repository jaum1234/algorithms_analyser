<?php

namespace Joaocoura\AlgAnalyser\Experiments;

use Joaocoura\AlgAnalyser\Algorithms\Algorithm;

class Experiment {
    private float $execTime;
    private array $inputs;

    public function __construct(
        private Algorithm $algorithm, 
    ) {
        $this->execTime = 0;
        $this->inputs = [];
    }

    public function execute() {
        
        $ini = time();
        $this->algorithm->call($this->inputs);
        $this->execTime = time() - $ini;    

        return $this->execTime;
    }

    public function addInput(mixed $input) {
        $this->inputs[] = $input;

        return $this;
    }

    public function clearInputs() {
        $this->inputs = [];
    }

  
}