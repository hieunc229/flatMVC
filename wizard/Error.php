<?php
namespace Wizard;
use Exception;
//4B=AoRm5[+0
class Error extends Exception {

    public function __construct($message, $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
       return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
   }
}

/* Error list
 404 URL Not Found
*/
?>
