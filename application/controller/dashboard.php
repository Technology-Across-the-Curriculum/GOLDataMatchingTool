<?php

/**
 * Created by Nathan Healea.
 * Project: WordSalad
 * File: dashboard.php
 * Date: 2/4/16
 * Time: 2:31 PM
 */
class Dashboard extends Controller
{
    public function index()
    {
        require APP . 'view/dashboard/index.php';
    }


    /* - - - - - - Course  - - - - - - */

    /*
     * Index page for Course
     */
    public function course(){
        require APP . 'class/entity/course.php';
        $courseEntity = new Course();
        $courselist = $courseEntity->getCourse();

        $keys = $this->_getObjectKeys($courselist[0]);

        require APP . 'view/dashboard/course/index.php';

    }
    /*
     * Index page for Course details
     */
    public function courseDetail($course_id){

        # Linking required entitys
        require APP . 'class/entity/course.php';

        # Creating course entity object
        $courseEntity = new Course();

        # Getting current course information
        $courseInfo = $courseEntity->getCourseByID($course_id);
        $sectionList = $courseEntity->getCourseSection($course_id);

        $keys = $this->_getObjectKeys($sectionList[0]);

        require APP . 'view/dashboard/course/details.php';

    }

    /* - - - - - - Classroom  - - - - - - */

    /**
     * Index view for Classroom.
     */
    public function classroom()
    {
        require APP . 'class/entity/classroom.php';
        $classroomEntity = new Classroom();
        $classroomList = $classroomEntity->getClassroom();

        $keys = $this->_getObjectKeys($classroomList[0]);

        require APP . 'view/dashboard/classroom/index.php';
    }

    /* - - - - - - Section  - - - - - - */

    /**
     * Index page for Section
     */
    public function section()
    {
        require APP . 'class/entity/section.php';
        $sectionEntity = new Section();
        $sectionList = $sectionEntity->getSectionDetail();

        $keys = $this->_getObjectKeys($sectionList[0]);

        require APP . 'view/dashboard/section/index.php';
    }

    /*
     * Index page for session details
     */
    public function sectionDetail($id){

        # Linking required entitys
        require APP . 'class/entity/section.php';

        # Creating course entity object
        $section = new Section();

        # Getting current course information
        $sectionID = $id;
        $sectionInfo = $section->getSectionDetailByID($id);
        $sessionList = $section->getSectionSession($id);
        $sessionKeys = $this->_getObjectKeys($sessionList[0]);

        $studentList = $section->getSectionClasslist($id);
        $studentKeys = $this->_getObjectKeys($studentList[0]);

        require APP . 'view/dashboard/section/details.php';

    }

    /* - - - - - - Session  - - - - - - */

    /**
     * Index page for session
     */
    public function session()
    {
        require APP . 'class/entity/session.php';
        $session = new Session();
        $sessionList = $session->getSessionNoID();

        $keys = $this->_getObjectKeys($sessionList[0]);

        require APP . 'view/dashboard/session/index.php';
    }





}