<?php

/**
 * Created by Nathan Healea.
 * Project: GOLDaMatchingPortal
 * File: course.php
 * Date: 12/13/16
 * Time: 1:08 PM
 */
class Course extends Entity
{
    public function getCourse(){
        $sql = 'SELECT * FROM course';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCourseByID($id){
        $sql = 'SELECT * FROM course WHERE id = :id';
        $query = $this->db->prepare($sql);
        $parameters = array(':id'=> $id);
        $query->execute($parameters);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    

}