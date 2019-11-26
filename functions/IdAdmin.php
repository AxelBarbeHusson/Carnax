<?php


function idAdmin() {
    if(ifLogged()) {
        if (!empty($_SESSION['role']== 'admin')){
            return true;
        }
    }
    return false;
}