<?php

/**
 * Created by PhpStorm.
 * User: nathanhealea
 * Date: 3/7/17
 * Time: 2:24 PM
 */
class Student extends Entity
{

    public function getMatchParticipant($id)
    {
        $sql = 'SELECT id as "DT_RowId", id, first_name as "first", last_name as "last", lmsid, email
                  FROM participant_list pl
                  where classlist_id = :classlist_id';
        $query = $this->db->prepare($sql);
        $parameters = array(':classlist_id' => $id);
        $query->execute($parameters);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}