<?php

/**
 * Created by Nathan Healea.
 * Project: WordSalad
 * File: dashboard.php
 * Date: 2/4/16
 * Time: 2:31 PM
 */
class Dataapi extends Controller
{


    public function getPaticipants($id){
        require APP . 'class/entity/student.php';
//        $course = new Course();
//        $sections = $course->getCourseSection($id);'
         $student = new Student();
        $list = $student->getMatchParticipant($id);
        echo json_encode($list);
    }



}