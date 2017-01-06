<?php

/**
 * Created by Nathan Healea.
 * Project: GOLDaMatchingPortal
 * File: course.php
 * Date: 12/13/16
 * Time: 1:08 PM
 */
class SectionEntity extends Entity
{
    public function getSections()
    {
        $sql = 'SELECT * FROM section';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSectionDetail()
    {
        $sql = 'SELECT sec.id, c.acronym, cl.name, sec.crn, sec.term_code, sec.alt_term_code, sec.code FROM section as sec INNER JOIN classroom as cl ON sec.classroom_id = cl.id
INNER JOIN course as c ON sec.course_id = c.id';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSectionDetailByID($id)
    {
        $sql = 'SELECT sec.id, c.acronym, cl.name, sec.crn, sec.term_code, sec.alt_term_code, sec.code FROM section as sec INNER JOIN classroom as cl ON sec.classroom_id = cl.id
INNER JOIN course as c ON sec.course_id = c.id WHERE sec.id = :id';
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getSectionSession($id)
    {
        $sql = 'SELECT * FROM session WHERE section_id = :id';
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSectionClasslist($id){
        $sql = 'SELECT * FROM classlist WHERE section_id = :id';
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCensoredClassList($id)
    {
        $sql = "SELECT 
                  id, 
                  student_id as 'SID',
                  first_name as 'Frist',  
                  last_name as 'Last',
                  email                  
                FROM classlist 
                WHERE section_id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }


}

// Insert WordSalad score into *wordsalad_score table for the current database
//$sql = 'insert into w365prod_wordsalad_score (nid, is_wordsalad, percent, score) values(:nid, :is_wordsalad, :percent, :score)';
//$query = $this->db->prepare($sql);
//$parameters = array(':nid' => $nodeData->node_id, ':is_wordsalad' => $nodeData->is_wordsalad, ':percent' => $nodeData->percent, ':score' => $nodeData->score);
//$query->execute($parameters);