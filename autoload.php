<?php

spl_autoload_register(function($class_name) {
    $file = __DIR__ . "/" . str_replace("\\", "/", str_replace("Joaocoura\\AlgAnalyser", "src", $class_name)) . ".php";

    if (file_exists($file)) require $file;
});