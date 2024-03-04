<?php

namespace Joaocoura\AlgAnalyser\Experiments;

use Exception;
use ReflectionObject;

class ExperimentsRunner {
    private array $experiments;

    public function __construct() {
    }

    public function register(string $name, Experiment $experiment, int $rounds) {
        $reflection = new ReflectionObject($experiment);
        $prop = $reflection->getProperty("inputs");
        $value = $prop->getValue($experiment);

        if ($rounds < count($value)) throw new Exception();

        $this->experiments[$name] = ["rounds" => $rounds, "experiment" => $experiment, "exec_time" => 0];
    }

    public function run(string $name) {
        if (!isset($this->experiments[$name])) throw new Exception("No such experiment.");

        $this->experiments[$name]->execute();
    }

    public function runAll() {
        $avgPerExperiment = [];

        foreach ($this->experiments as $experiment) {
            $experiment->execute();
        }
    }
}