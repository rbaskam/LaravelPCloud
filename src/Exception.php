<?php

namespace Rbaskam\LaravelPCloud;

class Exception extends \Exception {

    function __construct($message, $cause = null) {
        parent::__construct($message, 5000, $cause);
    }
}
