<?php 

function removeSpaceToHypen($string){
    return preg_replace('/\s+/', '-', $string);
}

function removeHypenToSpace($string){
    return preg_replace('/\-+/', ' ', $string);
}

function debug($p){
    echo "<pre>";
    print_r($p);exit;
}