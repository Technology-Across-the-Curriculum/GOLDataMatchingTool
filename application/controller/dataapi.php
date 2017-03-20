<?php

/**
 * Created by Nathan Healea.
 * Project: WordSalad
 * File: dashboard.php
 * Date: 2/4/16
 * Time: 2:31 PM
 */
class Dataapi extends Controller
{


    public function getPaticipants($id)
    {
        require APP . 'class/entity/participant.php';
        $participant = new Participant();
        $list = $participant->getMatchByStudentId($id);
        echo json_encode($list);
    }


}