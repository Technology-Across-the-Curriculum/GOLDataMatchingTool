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
        $course = new Course();
        $courses = $course->getCourse();
        echo json_encode($courses);
    }

    public function getSection($id){
        require APP . 'class/entity/course.php';
        $course = new Course();
        $sections = $course->getCourseSection($id);
        echo json_encode($sections);
    }

    public function getSession($id){
        require APP . 'class/entity/section.php';
        $session = new Section();
        $session = $session->getSectionSession($id);
        echo json_encode($session);
    }

    public function getClasslist($id){
        require APP . 'class/entity/section.php';
        $section = new Section();
        $studentList = $section->getCensoredClassList($id);
        //$studentKeys = $this->_getObjectKeys($studentList[0]);
        $data = $studentList;
        echo json_encode($data);
    }

    public function getParticipant($section_id){
        require APP . 'class/entity/participant.php';
        $participantKey = null;

        $participant = new Participant();
        $participantList = $participant->getUnmatchBySessionId($section_id);
        /*if(!empty($participantList)) {
            $participantKey = $this->_getObjectKeys($participantList[0]);
        }
        else{
            $participantKey = "empty";
        }
        $data = array('keys' =>$participantKey, 'list' => $participantList);*/
        echo json_encode($participantList);
    }

    public function match(){
        require APP . 'class/entity/participant.php';
        $participant = new Participant();
        $data = $_POST;

        foreach($data['matches'] as $id => $confirm ){
            if($confirm){
                if($participant->match($data['studentId'], $id)){
                    $data['matches'][$id] = 's';
                }
                else{
                    $data['matches'][$id] = 'f';
                }

            }
        }
        echo json_encode($data['matches']);
    }

    public function unmatch(){
        require APP . 'class/entity/participant.php';
        $participant = new Participant();
        $data = $_POST;

        // Get Darth Vaders id
        $darthVader = $participant->getDarthVarderBySessionId($data['sectionId']);

        foreach($data['unmatch'] as $id => $confirm){
            if($confirm){
                if($participant->unmatch($id, $darthVader->id)){
                    $data['unmatch'][$id] = 's';
                }
                else{
                    $data['unmatch'][$id] = 'f';
                }
            }
        }
        echo json_encode($data);
    }

    public function deleteRecord(){
        require APP . 'class/entity/participant.php';
        $participant = new Participant();
        $data = $_POST;

        foreach($data as $id => $confirm ){
            if($confirm){
                if($participant->delete($id)){
                    $data[$id] = 's';
                }
                else{
                    $data[$id] = 'f';
                }

            }
        }
        echo json_encode($data);
    }


}