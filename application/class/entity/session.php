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

    public function getSessionInfo($id)
    {
        $sql = 'SELECT
                  s.id,
                  c.acronym,
                  sec.crn,
                  s.source_id,
                  s.date_created
                FROM session as s
                  INNER JOIN section as sec ON s.section_id = sec.id
                  INNER JOIN course as c On sec.course_id = c.id
                Where s.id = :id';
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getSessionNoID()
    {
        $sql = 'SELECT
                  s.id,
                  c.acronym,
                  sec.crn,
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
