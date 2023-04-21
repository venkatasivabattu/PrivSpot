<?php
function handleError($errno, $errstr, $errfile, $errline) {
                        
    header('Location: ../error.html');
    exit;
}
set_error_handler('handleError');
?>