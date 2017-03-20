<?php

/**
 * Created by Nathan Healea.
 * Project: GOLDaMatchingPortal
 * File: classroom.php
 * Date: 12/13/16
 * Time: 1:08 PM
 */
class Session extends Entity
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
}

// Insert WordSalad score into *wordsalad_score table for the current database
//$sql = 'insert into w365prod_wordsalad_score (nid, is_wordsalad, percent, score) values(:nid, :is_wordsalad, :percent, :score)';
//$query = $this->db->prepare($sql);
//$parameters = array(':nid' => $nodeData->node_id, ':is_wordsalad' => $nodeData->is_wordsalad, ':percent' => $nodeData->percent, ':score' => $nodeData->score);
//$query->execute($parameters);