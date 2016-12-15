<?php

/**
 * Created by Nathan Healea.
 * Project: WordSalad
 * File: dashboard.php
 * Date: 2/4/16
 * Time: 2:31 PM
 */
class Course extends Controller
{
    /**
     * View that list all courses in the study.
     */
    public function index()
    {
        require APP . 'class/entity/course.php';
        $courseEntity = new CourseEntity();
        $courselist = $courseEntity->getCourse();

        $keys = $this->_getObjectKeys($courselist[0]);

        require APP . 'view/dashboard/course/index.php';
    }

    /**
     * @param $course_id
     * view for showing a course details
     */
    public function detail($course_id){

        # Linking required entitys
        require APP . 'class/entity/course.php';

        # Creating course entity object
        $courseEntity = new CourseEntity();

        # Getting current course information
        $courseInfo = $courseEntity->getCourseByID($course_id);
        $sectionList = $courseEntity->getCourseSection($course_id);

        $keys = $this->_getObjectKeys($sectionList[0]);

        require APP . 'view/dashboard/course/details.php';

    }

    /**
     * @param $course_id
     * view for editing a course
     */
    public function edit($course_id){

    }

    /**
     * @param $course_id
     * view for deleteing a course
     */
    public function delete($course_id){

    }




}