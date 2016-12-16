<?php

/**
 * Created by Nathan Healea.
 * Project: WordSalad
 * File: dashboard.php
 * Date: 2/4/16
 * Time: 2:31 PM
 */
class Section extends Controller
{
    /**
     * View that list all courses in the study.
     */
    public function index()
    {
        require APP . 'class/entity/section.php';
        $sectionEntity = new SectionEntity();
        $sectionList = $sectionEntity->getSectionDetail();

        $keys = $this->_getObjectKeys($sectionList[0]);

        require APP . 'view/dashboard/section/index.php';
    }

    public function select($id){

        # Linking required entitys
        require APP . 'class/entity/section.php';

        # Creating course entity object
        $sectionEntity = new SectionEntity();

        # Getting current course information
        $sectionInfo = $sectionEntity->getSectionDetailByID($id);
        $sessionList = $sectionEntity->getSectionSession($id);

        $keys = $this->_getObjectKeys($sessionList[0]);

        require APP . 'view/dashboard/section/details.php';

    }

}