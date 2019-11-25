<?php
function ifLogged(){
    if(!empty($_SESSION['login']['id'])){
        if (!empty($_SESSION['login']['email'])){
            if (!empty($_SESSION['login']['role'])){
                if (!empty($_SESSION['login']['ip']) == $_SERVER['REMOTE_ADDR']) {
                    return true;
                }
            }
        }
    }
    return false;
}