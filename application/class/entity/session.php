<?php

/**
 * Created by Nathan Healea.
 * Project: GOLDaMatchingPortal
 * File: classroom.php
 * Date: 12/13/16
 * Time: 1:08 PM
 */
class SessionEntity extends Entity
{
    public function getSession()
    {
        $sql = 'SELECT * FROM session';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSessionNoID()
    {
        $sql = 'SELECT
                  s.id,
                  c.acronym,
                  sec.crn,
                  sec.code,
                  s.guid,
                  s.source_id,
                  s.date_created
                FROM session as s
                  INNER JOIN section as sec ON s.section_id = sec.id
                  INNER JOIN course as c On sec.course_id = c.id';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSessionByID($id)
    {
        $sql = 'SELECT * FROM session WHERE id = :id';
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getParticipantNoMatch($section_id, $session_id)
    {
        $sql = 'SELECT
  pl.first_name AS "First",
  pl.last_name  AS "Last",
  pl.lmsid,
  pl.email
FROM participant_list pl
where pl.classlist_id = (
  SELECT cl.id from classlist cl
  WHERE cl.first_name = "Darth" and cl.last_name = "Vader" and cl.section_id = :section_id
)
and session_id = :session_id';
        $query = $this->db->prepare($sql);
        $parameters = array(':section_id' => $section_id, ':session_id'=> $session_id);
        $query->execute($parameters);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

}

// Insert WordSalad score into *wordsalad_score table for the current database
//$sql = 'insert into w365prod_wordsalad_score (nid, is_wordsalad, percent, score) values(:nid, :is_wordsalad, :percent, :score)';
//$query = $this->db->prepare($sql);
//$parameters = array(':nid' => $nodeData->node_id, ':is_wordsalad' => $nodeData->is_wordsalad, ':percent' => $nodeData->percent, ':score' => $nodeData->score);
//$query->execute($parameters);