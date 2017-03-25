<?php

/**
 * Created by PhpStorm.
 * User: nathanhealea
 * Date: 3/20/17
 * Time: 11:37 AM
 */
class Participant extends Entity
{
    public function getUnmatchBySessionId($section_id)
    {
        $sql = 'SELECT
  pl.id,
  pl.first_name AS "first",
  pl.last_name  AS "last",
  pl.email,
  pl.lmsid
FROM participant_list pl
where pl.classlist_id = (
  SELECT cl.id from classlist cl
  WHERE cl.first_name = "Darth" and cl.last_name = "Vader" and cl.section_id = :section_id
)';
        $query = $this->db->prepare($sql);
        $parameters = array(':section_id' => $section_id);
        $query->execute($parameters);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getMatchByStudentId($student_id)
    {
        $sql = 'SELECT id as "DT_RowId", id, first_name as "first", last_name as "last", lmsid, email
                  FROM participant_list pl
                  where classlist_id = :classlist_id';
        $query = $this->db->prepare($sql);
        $parameters = array(':classlist_id' => $student_id);
        $query->execute($parameters);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getDarthVarderBySessionId($section_id)
    {
        $sql = 'SELECT id
                  FROM classlist cl
                  WHERE cl.first_name = "Darth" AND cl.last_name = "Vader" AND cl.section_id = :section_id';
        $query = $this->db->prepare($sql);
        $parameters = array(':section_id' => $section_id);
        $query->execute($parameters);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function match($student_id, $participant_id)
    {
        $sql = 'UPDATE participant_list set classlist_id = :sid WHERE id = :pid';
        $query = $this->db->prepare($sql);
        $parameters = array(':sid' => $student_id, ':pid' => $participant_id);
        $query->execute($parameters);

        if ($query->rowCount() < 0) {
            return false;
        }
        return true;

    }

    public function unmatch($participant_id, $darthVarder_id)
    {
        $sql = 'UPDATE participant_list p SET p.classlist_id = :darthvarder_id where p.id = :participant_id';
        $query = $this->db->prepare($sql);
        $parameters = array(':darthvarder_id' => $darthVarder_id,
                            ':participant_id' => $participant_id);
        return $query->execute($parameters);

    }

    public function delete($participant_id)
    {
        $sql = 'DELETE FROM participant_list WHERE id = :pid';
        $query = $this->db->prepare($sql);
        $parameters = array(':pid' => $participant_id);
        $query->execute($parameters);

        if ($query->rowCount() < 0) {
            return false;
        }
        return true;

    }

}