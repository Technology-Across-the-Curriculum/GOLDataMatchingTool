<?php

/**
 * Created by PhpStorm.
 * User: nathanhealea
 * Date: 3/20/17
 * Time: 11:37 AM
 */
class Participant extends Entity
{
    public function getNonMatch($section_id)
    {
        $sql = 'SELECT
  pl.id,
  pl.first_name AS "First",
  pl.last_name  AS "Last",
  pl.lmsid,
  pl.email
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

    public function match($student_id, $participant_id){
        $sql = 'UPDATE participant_list set classlist_id = :sid WHERE id = :pid';
        $query = $this->db->prepare($sql);
        $parameters = array(':sid' => $student_id, ':pid'=> $participant_id);
        $query->execute($parameters);

        if($query->rowCount() < 0){
            return false;
        }
        return true;

    }

    public function unmatch($participant_id, $session_id){
        return true;
    }

    public function delete($participant_id){
        $sql = 'DELETE FROM participant_list WHERE id = :pid';
        $query = $this->db->prepare($sql);
        $parameters = array(':pid'=> $participant_id);
        $query->execute($parameters);

        if($query->rowCount() < 0){
            return false;
        }
        return true;

    }
}