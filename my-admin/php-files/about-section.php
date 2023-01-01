<?php
    include "database.php";

    if(isset($_POST['about'])){
        if(!isset($_POST['title']) || empty($_POST['title'])){
            echo json_encode(array("error" => "Title field is empty !")); exit;

        }else if(!isset($_POST['subtitle']) || empty($_POST['subtitle'])){
            echo json_encode(array("error" => "sub-title field is empty")); exit;

        }else if(!isset($_POST['name']) || empty($_POST['name'])){
            echo json_encode(array("error" => "Name field is empty")); exit;

        }else if(!isset($_POST['email']) || empty($_POST['email'])){
            echo json_encode(array("error" => "sub-title field is empty")); exit;

        }else if(!isset($_POST['education']) || empty($_POST['education'])){
            echo json_encode(array("error" => "Education field is empty")); exit;

        }else if (!isset($_POST['date']) || empty($_POST['date'])){
            echo json_encode(array("error" => "date field is empty")); exit;

        }else if(!isset($_POST['phoneNumber']) || empty($_POST['phoneNumber'])){
            echo json_encode(array("error" => "phone number is empty")); exit;
            
        }else{
            $db = new database();
            
            
            $profile = uniqid().'_'.$_FILES['profile']['name'];
            move_uploaded_file($_FILES['profile']['tmp_name'], "../../image/img/".$profile);

            
                $parms = array(
                    'title' => $db->escapeString($_POST['title']),
                    'subtitle' => $db->escapeString($_POST['subtitle']),
                    'name' => $db->escapeString($_POST['name']),
                    'telNumber' => $db->escapeString($_POST['phoneNumber']),
                    'email' => $db->escapeString($_POST['email']),
                    'education' => $db->escapeString($_POST['education']),
                    'dob' => $db->escapeString($_POST['date']),
                    'profile' =>$profile,
                    'status' => 1
                );
                
                
            
                
            $db->select('about', '*', null, "title = '{$_POST['title']}'", null, null);

            $exist = $db->getResult();

            if(!empty($exist)){
                echo json_encode(array("error" => 'data already exist'));  exit;

            }else{
                $db->insert('about', $parms);
                $response = $db->getResult();

                if(!empty($response)){
                    echo json_encode(array('success' => $response));
                }
            }
        }
    }
    // update data
    if(isset($_POST['about_edit'])){
        if(!isset($_POST['title']) || empty($_POST['title'])){
            echo json_encode(array("error" => "Title field is empty !")); exit;

        }else if(!isset($_POST['subtitle']) || empty($_POST['subtitle'])){
            echo json_encode(array("error" => "sub-title field is empty")); exit;

        }else if(!isset($_POST['name']) || empty($_POST['name'])){
            echo json_encode(array("error" => "Name field is empty")); exit;

        }else if(!isset($_POST['email']) || empty($_POST['email'])){
            echo json_encode(array("error" => "email field is empty")); exit;

        }else if(!isset($_POST['education']) || empty($_POST['education'])){
            echo json_encode(array("error" => "Education field is empty")); exit;

        }else if (!isset($_POST['date']) || empty($_POST['date'])){
            echo json_encode(array("error" => "date field is empty")); exit;

        }else if(!isset($_POST['phoneNumber']) || empty($_POST['phoneNumber'])){
            echo json_encode(array("error" => "phone number is empty")); exit;

        }else{
            $db = new database();
            $id = $db->escapeString($_POST['dataid']);
            

            if(isset($_FILES['profile'])){
                $profile = uniqid().' '.$_FILES['profile']['name'];
                move_uploaded_file($_FILES['profile']['tmp_name'], "../../image/img/".$profile);
            }else{
                $profile = "";
            }
            $parms = array(
                'title' => $db->escapeString($_POST['title']),
                'subtitle' => $db->escapeString($_POST['subtitle']),
                'name' => $db->escapeString($_POST['name']),
                'telNumber' => $db->escapeString($_POST['phoneNumber']),
                'email' => $db->escapeString($_POST['email']),
                'education' => $db->escapeString($_POST['education']),
                'dob' => $db->escapeString($_POST['date']),
                'profile' =>$profile,
                'status' => 1
            );

            if(empty($profile)){
                echo json_encode(array("error" => "Profile is not exist")); exit;

            }else{
                $db->update('about', $parms, "aboutID = '{$id}'");
                $response = $db->getResult();

                if(!empty($response)){
                    echo json_encode(array('success' => $response));
                }
            }
        }
    }
?>