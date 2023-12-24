<?php
function mytempletes($reference, $value) {
	extract($value); 
        ob_start(); 
        require $reference;
        $clean = ob_get_clean(); 
        return $clean;       
}
?>