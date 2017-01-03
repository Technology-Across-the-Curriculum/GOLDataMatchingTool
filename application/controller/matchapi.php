<?php

/**
 * Created by Nathan Healea.
 * Project: WordSalad
 * File: dashboard.php
 * Date: 2/4/16
 * Time: 2:31 PM
 */
class Matchapi extends Controller
{
    public function getCourse(){
        require APP . 'class/entity/course.php';
        $courseEntity = new CourseEntity();
        $courses = $courseEntity->getCourse();
        echo json_encode($courses);
    }

    public function getSection($id){
        require APP . 'class/entity/course.php';
        $courseEntity = new CourseEntity();
        $sections = $courseEntity->getCourseSection($id);
        echo json_encode($sections);
    }
    public function getClasslist($id){
        require APP . 'class/entity/section.php';
        $sectionEntity = new SectionEntity();
        $studentList = $sectionEntity->getCensoredClassList($id);
        $studentKeys = $this->_getObjectKeys($studentList[0]);
        $data = array('keys' =>$studentKeys, 'list' => $studentList);

        echo json_encode($data);
    }


}