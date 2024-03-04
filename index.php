<?php

require_once __DIR__ . "/autoload.php";

use Joaocoura\AlgAnalyser\Algorithms\ArrayFlip;
use Joaocoura\AlgAnalyser\Experiments\Experiment;
use Joaocoura\AlgAnalyser\Experiments\ExperimentsRunner;
use Joaocoura\AlgAnalyser\Validator\InputsValidator;

$validator = new InputsValidator();
$algorithm = new ArrayFlip($validator);

$experiment = new Experiment($algorithm);

$experiment->addInput(array_fill(0, 1000000000, 10));

$runner = new ExperimentsRunner();
