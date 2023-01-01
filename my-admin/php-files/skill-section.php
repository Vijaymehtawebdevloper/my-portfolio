<?php
    include "database.php";

    if(isset($_POST['skillSection'])){
        if(!isset($_POST['title']) || empty($_POST['title'])){
            echo json_encode(array("error" => "title fiels is empty !")); exit;
        }else if(!isset($_POST['subtitle']) || empty($_POST['subtitle'])){
            echo json_encode(array("error" => "subtitle fiels is empty !")); exit;
        }else if(!isset($_POST['skillName']) || empty($_POST['skillName'])){
            echo json_encode(array("error" => "skill name fiels is empty !")); exit;
        }else if(!isset($_POST['skillPercentage']) || empty($_POST['skillPercentage'])){
            echo json_encode(array("error" => "skill percentage name fiels is empty !")); exit;
        }else{

            $db = new database();

            $prms = array(
                'title' => $db->escapeString($_POST['title']),
                'subtitle' => $db->escapeString($_POST['subtitle']),
                'skillName' => $db->escapeString($_POST['skillName']),
                'skillPercentage' => $db->escapeString($_POST['skillPercentage']),
            );

            $db->select('myskills', '*', null, "skillName = '{$_POST['skillName']}'", null, null);

            $exist = $db->getResult();

            if(!empty($exist)){
                echo json_encode(array("error" => "Data alredy exist !")); exit;
            }else{
                $db->insert('myskills', $prms);
                $response = $db->getResult();

                if(!empty($response)){
                    echo json_encode(array('success' => $response)); exit;
                }
            }
        }
    }

    if(isset($_POST['editskill'])){
        if(!isset($_POST['title']) || empty($_POST['title'])){
            echo json_encode(array("error" => "title fiels is empty !")); exit;
        }else if(!isset($_POST['subtitle']) || empty($_POST['subtitle'])){
            echo json_encode(array("error" => "subtitle fiels is empty !")); exit;
        }else if(!isset($_POST['skillName']) || empty($_POST['skillName'])){
            echo json_encode(array("error" => "skill name fiels is empty !")); exit;
        }else if(!isset($_POST['skillPercentage']) || empty($_POST['skillPercentage'])){
            echo json_encode(array("error" => "skill percentage name fiels is empty !")); exit;
        }else{

            $db = new database();
            $id = $db->escapeString($_POST['dataid']);
            $prms = array(
                'title' => $db->escapeString($_POST['title']),
                'subtitle' => $db->escapeString($_POST['subtitle']),
                'skillName' => $db->escapeString($_POST['skillName']),
                'skillPercentage' => $db->escapeString($_POST['skillPercentage']),
            );

            $db->update('myskills', $prms, "skillID = '{$id}'");
            $response = $db->getResult();
            if(!empty($response)){
                echo json_encode(array('success' => $response)); exit;
            }else{
                echo json_encode(array('error' => 'error')); exit;
            }
        }
    }

    
?>