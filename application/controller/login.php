<?php

/**
 * Created by Nathan Healea.
 * Project: WordSalad
 * File: dashboard.php
 * Date: 2/4/16
 * Time: 2:31 PM
 */
class Login extends Controller
{

    /* - - - - Views - - - - - */
    public function index($error = false){

        // load view
        require APP . 'view/login/index.php';

    }

    public function validate(){
        $message = "Fail";
        $userValidate = false;
        $passwordValidate = false;
        $user = $_POST['user'];
        $password = $_POST['pass'];

        if(md5($user) == md5(USER)){
            $userValidate = true;
        }

        if (md5($password) == md5(PASSWORD)){
            $passwordValidate = true;

        }

        if($userValidate && $passwordValidate){
            $message = "Success";
            $this->start_session();
            header('location:' . URL. 'dashboard/index/');
        }
        else{
            echo $message;
        }





    }

    private function start_session(){
        session_start();
        session_id(md5(SESSION_KEY));
        $_SESSION['access-time'] = time();
    }




}