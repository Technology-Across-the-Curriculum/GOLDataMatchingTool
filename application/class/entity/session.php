<?php

/**
 * Created by Nathan Healea.
 * Project: GOLDaMatchingPortal
 * File: classroom.php
 * Date: 12/13/16
 * Time: 1:08 PM
 */
class SessionValidater extends Entity
{
    private $guest = 'Guest';

    /**
     * start a php session
     */
    public function startSession()
    {
        session_start();
    }

    /**
     * Check if the a session is authenticated
     * @return bool|null
     */
    public function checksession()
    {
        $result = null;
        if (array_key_exists('authenticated', $_SESSION)) {
            if ($_SESSION['authenticated']) {
                $result = true;
            } else {
                $result = false;
            }
        } else {
            $result = false;
        }
        return $result;
    }

    /**
     * Starts a guess session
     */
    public function setGuest()
    {
        $_SESSION['authenticated'] = false;
    }

    /**
     * returns the the authentication status of the session.
     * @return mixed
     */
    public function authenticationStatus()
    {
        return $_SESSION['authenticated'];
}

}

// Insert WordSalad score into *wordsalad_score table for the current database
//$sql = 'insert into w365prod_wordsalad_score (nid, is_wordsalad, percent, score) values(:nid, :is_wordsalad, :percent, :score)';
//$query = $this->db->prepare($sql);
//$parameters = array(':nid' => $nodeData->node_id, ':is_wordsalad' => $nodeData->is_wordsalad, ':percent' => $nodeData->percent, ':score' => $nodeData->score);
//$query->execute($parameters);