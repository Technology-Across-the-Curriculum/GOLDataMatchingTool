<?php

/**
 * Created by Nathan Healea.
 * Project: GOLDaMatchingPortal
 * File: course.php
 * Date: 12/13/16
 * Time: 1:08 PM
 */
class CourseEntity extends Entity
{
    public function getCourse(){
        $sql = 'SELECT * FROM course';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCourseByID($course_id){
        $sql = 'SELECT * FROM course WHERE id = :id';
        $query = $this->db->prepare($sql);
        $parameters = array(':id'=> $course_id);
        $query->execute($parameters);
        return $query->fetch(PDO::FETCH_OBJ);
    }

}

// Insert WordSalad score into *wordsalad_score table for the current database
//$sql = 'insert into w365prod_wordsalad_score (nid, is_wordsalad, percent, score) values(:nid, :is_wordsalad, :percent, :score)';
//$query = $this->db->prepare($sql);
//$parameters = array(':nid' => $nodeData->node_id, ':is_wordsalad' => $nodeData->is_wordsalad, ':percent' => $nodeData->percent, ':score' => $nodeData->score);
//$query->execute($parameters);