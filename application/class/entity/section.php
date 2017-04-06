<?php

/**
 * Created by Nathan Healea.
 * Project: GOLDaMatchingPortal
 * File: course.php
 * Date: 12/13/16
 * Time: 1:08 PM
 */
class Section extends Entity
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
        /*$sql = 'SELECT sec.id, c.acronym, cl.name, sec.crn, sec.term_code, sec.alt_term_code, sec.code FROM section as sec INNER JOIN classroom as cl ON sec.classroom_id = cl.id
        INNER JOIN course as c ON sec.course_id = c.id';*/
        $sql = 'SELECT
        sec.id,
        c.acronym,
        cl.name,
        sec.crn,
        sec.term_code,
        sec.alt_term_code,
        sec.code,
        (
        SELECT count(pl.id)
        FROM participant_list pl
        INNER JOIN session ses ON pl.session_id = ses.id
        WHERE pl.classlist_id = (SELECT id
        FROM classlist cl
        WHERE cl.first_name = "Darth" AND cl.last_name = "Vader" AND cl.section_id = sec.id)
        AND
        ses.section_id = sec.id
        ) AS "unmatched",
        (
        SELECT count(pl.id)
        FROM participant_list pl
        INNER JOIN session ses ON pl.session_id = ses.id
        WHERE pl.classlist_id <> (SELECT id
        FROM classlist cl
        WHERE cl.first_name = "Darth" AND cl.last_name = "Vader" AND cl.section_id = sec.id)
        AND
        ses.section_id = sec.id
        )
        AS "matched",
        (
        SELECT count(pl.id)
        FROM participant_list pl
        INNER JOIN session ses ON pl.session_id = ses.id
        WHERE ses.section_id = sec.id
        ) AS "total"
        FROM section AS sec
        INNER JOIN classroom AS cl ON sec.classroom_id = cl.id
        INNER JOIN course AS c ON sec.course_id = c.id';

        
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

    public function getSectionByCourseId($id){
        $sql = 'SELECT * FROM section WHERE course_id = :id';
        $query = $this->db->prepare($sql);
        $parameters = array(':id'=> $id);
        $query->execute($parameters);
        return $query->fetchAll(PDO::FETCH_OBJ);
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

        first_name as 'first',  
        last_name as 'last',
        email,
        student_id as 'sid'     
        FROM classlist 
        WHERE section_id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }


}
