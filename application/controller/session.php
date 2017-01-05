<?php

/**
 * Created by Nathan Healea.
 * Project: WordSalad
 * File: dashboard.php
 * Date: 2/4/16
 * Time: 2:31 PM
 */
class Session extends Controller
{
    /**
     * View that list all courses in the study.
     */
    public function index()
    {
        require APP . 'class/entity/session.php';
        $sessionEntity = new SessionEntity();
        $sessionList = $sessionEntity->getSessionNoID();

        $keys = $this->_getObjectKeys($sessionList[0]);

        require APP . 'view/dashboard/session/index.php';
    }



}