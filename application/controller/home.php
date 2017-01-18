<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    function __construct(){
        /** This is an example for loading models and entities for the controller to use.
          * The name in the array should be the same as the file name.
        **/

        // Model
        // $models = array('modelexample');
        // $this->_loadModel($models);

        // Entity
        // $entities = array('entityexample');
        // $this->_loadEntity($entities);
    }


    /* - - - - Views - - - - */

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        // load view
        require APP . 'view/home/index.php';

    }

    public function login(){
        // load view
        require APP . 'view/home/login.php';
    }

    public function logout(){
        session_destroy();
        session_start();
        $_SESSION['authenticated'] = false;
        header('location: ' . URL . 'home/index');
    }

    /* - - - Ajax - - - - */
    public function checklogin(){
        $result['error'] = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Creates User Entity
            $session = new Session();
            $data = $_POST;
            $isValidate = $session->validate($data['username'], $data['password']);
            if ($isValidate) {
                $session->authenticate();
                $result['error'] = false;
            }
            else{
                $result['error'] = true;
            }
        }
        echo json_encode($result);
    }

}
