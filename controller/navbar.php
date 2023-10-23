<?php

require_once '../model/pdo-users.php';
require_once '../controller/session.php';

    $userId = getSessionUserId();
    
    $anonUser = $userId == 0;
    $admin = true; //s'hauria de criadar a la funcio admin pero no va 
    if (!$anonUser) {        
        $nickname = getUserNicknameById($userId);
    } else $changePasswordVisibility = '';
    
    $file = pathinfo($_SERVER['PHP_SELF'])['filename'];
    
    $homeActive = $file == "index" ? "active" : "";
    $loginActive = $file== "login" ? "active" : "";
    $signupActive = $file == "sign-up" ? "active" : "";
    $createActive = $file == "edit" ? "active" : "";
    $passwordActive = $file == "change-password" ? "active" : "";    
//Ex1
//require_once '../view/navbar.view.php';
//En ningun moment esta tocant la base de dades, es pot cridar amb include que es mes rapid
include_once '../view/navbar.view.php';