<?php 
namespace Orm;

use Exception;

trait isNumericChecker {
    public function isNumeric($toCheck) {
        if(is_numeric($toCheck)) {
            return true;
        } else {
            throw new Exception("Value wasn't numeric!");
        }
    }
}

?>