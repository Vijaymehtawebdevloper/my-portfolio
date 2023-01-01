<?php
    include "database.php";

    if(isset($_POST['admin'])){
        if(!isset($_POST['name']) || empty($_POST['name'])){
            echo json_encode(array('error' => 'Name fiels is empty')); exit;

        }else if(!isset($_POST['email']) || empty($_POST['email'])){
            echo json_encode(array('error' => 'Email fiels is empty')); exit;

        }else if(!isset($_POST['password']) || empty($_POST['password'])){
            echo json_encode(array('error' => 'Password fiels is empty')); exit;
        }else{
            $db = new database();
            $password = sha1($_POST['password']);

            // echo $password;
            $parm = array(
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $password,
            );

            $db->select('admin', '*', null, "(email = '{$_POST['email']}') AND password = '{$_POST['password']}'");
            $exist = $db->getResult();

            if(!empty($exist)){
                echo json_encode(array("error" => "Data alredy exist !")); exit;
                
            }else{
                $db->insert('admin', $parm);

                $response = $db->getResult();
                if(!empty($response)){
                    echo json_encode(array('success' => $response)); exit;
                }else{
                    echo json_encode(array('success' => 'some error')); exit;
                }
            }
        }
    }




// admin login
    if(isset($_POST['adminLogin'])){
        if(!isset($_POST['email']) || empty($_POST['email'])){
            echo json_encode(array('error' => 'Email fiels is empty')); exit;

        }else if(!isset($_POST['password']) || empty($_POST['password'])){
            echo json_encode(array('error' => 'Password fiels is empty')); exit;
        }else{
            $db = new database();
            $password = sha1($_POST['password']);

            // echo $password;

            $db->select('admin', '*', null, "(email = '{$_POST['email']}') AND password = '{$password}'");
            $exist = $db->getResult();

            if(!empty($exist)){
                session_start();
                $_SESSION['admin_role'] = 'admin';
                $_SESSION['admin_name'] = $exist[0]['name'];
                echo json_encode(array("success" => "log in successfully")); exit;
            }else{
                echo json_encode(array("error" => "false")); exit;
            }
        }
    }

?>