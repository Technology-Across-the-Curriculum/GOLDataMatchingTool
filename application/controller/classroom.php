<?php

/**
 * Created by Nathan Healea.
 * Project: WordSalad
 * File: dashboard.php
 * Date: 2/4/16
 * Time: 2:31 PM
 */
class Classroom extends Controller
{
    /**
     * View that list all courses in the study.
     */
    public function index()
    {
        require APP . 'class/entity/classroom.php';
        $classroomEntity = new ClassroomEntity();
        $classroomList = $classroomEntity->getClassroom();

        $keys = $this->_getObjectKeys($classroomList[0]);

        require APP . 'view/dashboard/classroom/index.php';
    }

}