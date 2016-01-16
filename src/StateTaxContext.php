<?php

include_once('ITaxContext.php');

class StateTaxContext implements  ITaxContext {
    protected $stateAbbrev;

    public function __construct($stateAbbrev) {
        $this->stateAbbrev = $this->validateState($stateAbbrev);

    }

    public function validateState($stateAbbrev) {
        if ($stateAbbrev == 'MN') {
            return $stateAbbrev;
        } else {
            throw new RuntimeException(' Invalid State - TaxContext');
        }

    }


    public function getTax($amount) {
        return 0.07 * $amount;
    }
}