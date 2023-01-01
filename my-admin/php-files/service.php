<?php
    include "database.php";

    if(isset($_POST['service'])){
        if(!isset($_POST['title']) || empty($_POST['title'])){
            echo json_encode(array("error" => "title dield is empty")); exit;

        }else if(!isset($_POST['subtitle']) || empty($_POST['subtitle'])){
            echo json_encode(array("error" => "sub title dield is empty")); exit;

        }else if(!isset($_POST['serviceName']) || empty($_POST['serviceName'])){
            echo json_encode(array("error" => "service name dield is empty")); exit;

        }else if(!isset($_POST['fonticon']) || empty($_POST['fonticon'])){
            echo json_encode(array("error" => "Font dield is empty")); exit;

        }else if(!isset($_POST['serviceInformation']) || empty($_POST['serviceInformation'])){
            echo json_encode(array("error" => "service information dield is empty")); exit;

        }else{

            $db = new database();
            if(isset($_FILES['icon'])){
                $icon = uniqid().'_'.$_FILES['icon']['name'];
                move_uploaded_file($_FILES['icon']['tmp_name'],"../../image/img/".$icon);
            }else{
                $icon = "";
            }
            
            $prms = array(
                'title' => $db->escapeString($_POST['title']),
                'subtitle' => $db->escapeString($_POST['subtitle']),
                'serviceName' => $db->escapeString($_POST['serviceName']),
                'fonticon' => $db->escapeString($_POST['fonticon']),
                'serviceInfo' => $db->escapeString($_POST['serviceInformation']),
                'icon' => $db->escapeString($icon)
            );

            $db->select('service', '*', null, "serviceName = '{$_POST['serviceName']}'", null, null);
            $exist = $db->getResult();

            if(!empty($exist)){
                echo json_encode(array("error" => "table already exist")); exit;
            }else{
                $db->insert('service', $prms);
                $response = $db->getResult();
                if(!empty($response)){
                    echo json_encode(array("success" => $response)); exit;
                }else{
                    echo json_encode(array("error" => $response)); exit;
                }
            }

        }
    }

    if(isset($_POST['ediService'])){
        if(!isset($_POST['title']) || empty($_POST['title'])){
            echo json_encode(array("error" => "title dield is empty")); exit;

        }else if(!isset($_POST['subtitle']) || empty($_POST['subtitle'])){
            echo json_encode(array("error" => "sub title dield is empty")); exit;

        }else if(!isset($_POST['serviceName']) || empty($_POST['serviceName'])){
            echo json_encode(array("error" => "service name dield is empty")); exit;

        }else if(!isset($_POST['fonticon']) || empty($_POST['fonticon'])){
            echo json_encode(array("error" => "Font dield is empty")); exit;

        }else if(!isset($_POST['serviceInformation']) || empty($_POST['serviceInformation'])){
            echo json_encode(array("error" => "service information dield is empty")); exit;

        }else{

            $db = new database();
            if(isset($_FILES['icon'])){
                $icon = uniqid().'_'.$_FILES['icon']['name'];
                move_uploaded_file($_FILES['icon']['tmp_name'],"../../image/img/".$icon);
            }else{
                $icon = "";
            }
            $id = $db->escapeString($_POST['dataid']);
            
            $prms = array(
                'title' => $db->escapeString($_POST['title']),
                'subtitle' => $db->escapeString($_POST['subtitle']),
                'serviceName' => $db->escapeString($_POST['serviceName']),
                'fonticon' => $db->escapeString($_POST['fonticon']),
                'serviceInfo' => $db->escapeString($_POST['serviceInformation']),
                'icon' => $db->escapeString($icon)
            );

            $db->update('service', $prms, "serviceID = '{$id}'");
            $response = $db->getResult();

            if(!empty($response)){
                echo json_encode(array("success" => $response));exit;
            }else{
                echo json_encode(array("error" => "error"));
            }

        }
    }
?>