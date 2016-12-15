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

        $keys = [];
        foreach($courselist[0] as $key => $value){
            array_push($keys, $key);
        }

        require APP . 'view/dashboard/course/index.php';
    }

    /**
     * @param $course_id
     * view for showing a course details
     */
    public function detail($course_id){
        require APP . 'class/entity/course.php';
        require APP . 'class/entity/section.php';

        $courseEntity = new CourseEntity();
        $sectionEntity = new SectionEntity();

        $courseInfo = $courseEntity->getCourseByID($course_id);
        $sectionList = $sectionEntity->getCourseSection($course_id);

        $keys = [];
        foreach($sectionList[0] as $key => $value){
            array_push($keys, $key);
        }

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