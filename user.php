<?php
    include "my-admin/php-files/database.php";

    if(isset($_POST['user'])){
        if(!isset($_POST['name']) || empty($_POST['name'])){
            echo json_encode(array("error" => "Name fiels is empty !")); exit;

        }else if(!isset($_POST['phoneNumber']) || empty($_POST['phoneNumber'])){
            echo json_encode(array("error" => "Phone number fiels is empty !")); exit;

        }else if(!isset($_POST['email']) || empty($_POST['email'])){
            echo json_encode(array("error" => "Email fiels is empty !")); exit;
            
        }else if(!isset($_POST['massage']) || empty($_POST['massage'])){
            echo json_encode(array("error" => "Massage name fiels is empty !")); exit;

        }else{

            $db = new database();

            $prms = array(
                'name' => $db->escapeString($_POST['name']),
                'phoneNumber' => $db->escapeString($_POST['phoneNumber']),
                'email' => $db->escapeString($_POST['email']),
                'massage' => $db->escapeString($_POST['massage']),
            );

            $db->insert('user', $prms);
            $response = $db->getResult();

            if(!empty($response)){
                echo json_encode(array('success' => $response)); exit;
            }
        }
    }
?>