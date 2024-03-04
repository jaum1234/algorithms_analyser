<?php

namespace Joaocoura\AlgAnalyser\Validator;

use Exception;

class InputsValidator {

    public function validate(array $inputs, string $rules) {
        $rules = explode("|", $rules);

        foreach ($inputs as $input) {
            if (!$this->verifyRules($rules, $input)) return false;
        }

        return true;
    }

    private function verifyRules($rules, $input) {
        foreach ($rules as $rule) {
            if (!$this->apply($rule, $input)) return false;
        }

        return true;
    }

    private function apply($rule, $input) {
        $rule = $this->convertRuleToProperMethod($rule);
      
        return $this->$rule($input);
    }

    private function convertRuleToProperMethod($rule) {
        for ($i = 0; $i < strlen($rule); $i++) {
            if (isset($rule[$i - 1]) && $rule[$i - 1] == "_") $rule[$i] = strtoupper($rule[$i]);
        }

        $rule = str_replace("_", "", $rule);

        return $rule;
    }
    
    private function isArray($input) {
        return is_array($input);
    }


    public function __call($name, $arguments) {
        throw new Exception("Invalid rule: {$name}.");
    }
}