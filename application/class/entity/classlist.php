<?php

/**
 * Created by Nathan Healea.
 * Project: GOLDaMatchingPortal
 * File: classroom.php
 * Date: 12/13/16
 * Time: 1:08 PM
 */
class Classlist extends Entity
{
    public function getClasslist()
    {
        $sql = 'SELECT * FROM classlist';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }


    public function getClastlistByID($id)
    {
        $sql = 'SELECT * FROM classlist WHERE id = :id';
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
        return $query->fetch(PDO::FETCH_OBJ);
    }

}
