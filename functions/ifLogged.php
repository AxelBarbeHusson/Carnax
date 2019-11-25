<?php
function ifLogged(){
    if(!empty($_SESSION['id_Users'])){
        if (!empty($_SESSION['USEMAIL'])){
            if (!empty($_SESSION['role'])){
                if (!empty($_SESSION['ip']) == $_SERVER['REMOTE_ADDR']) {
                    return true;
                }
            }
        }
    }
    return false;
}