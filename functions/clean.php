<?php
function clean($var){
    $var = trim(strip_tags($var));
    return $var;

}