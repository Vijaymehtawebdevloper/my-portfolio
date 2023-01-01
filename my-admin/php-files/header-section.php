<?php
    include "database.php";
    // insert dat in database
    if(isset($_POST['create'])){
        
        if(!isset($_POST['title']) || empty($_POST['title'])){
            echo json_encode(array("error" => "title field is required !")); exit;
        }else if(!isset($_POST['subTitle']) || empty($_POST['subTitle'])){
            echo json_encode(array("error" => "subtitle field is empty !")); exit;
        }else{
            $db = new database();
            $title = $db->escapeString($_POST['title']);
            $subTitle = $db->escapeString($_POST['subTitle']);
            
            $logoImage = uniqid().'_'.$_FILES['logoImage']['name'];
	        move_uploaded_file($_FILES['logoImage']['tmp_name'], '../../image/img/'.$logoImage);

            $db->select('banner', '*', null, "title = '{$title}'",null, null);


            $exist = $db->getResult();
            if(!empty($exist)){
    			echo json_encode(array('error'=>'Category Already exists.'));
    		}else{
				$db->insert('banner',array('title'=>$title, 'subTitle' => $subTitle, 'logo' => $logoImage));
				$response = $db->getResult();

				if(!empty($response)){
					echo json_encode(array('success'=>$response));
				}
    		}
        }
    }

    // edit data in database
    if(isset($_POST['edit'])){
        
        if(!isset($_POST['title']) || empty($_POST['title'])){
            echo $_POST['title'];
            echo json_encode(array("error" => "title field is required !")); exit;
        }else if(!isset($_POST['subTitle']) || empty($_POST['subTitle'])){
            echo json_encode(array("error" => "subtitle field is empty !")); exit;
        }else{
            $db = new database();
            $title = $db->escapeString($_POST['title']);
            $subTitle = $db->escapeString($_POST['subTitle']);
            $id = $db->escapeString($_POST['id']);
            
            if(isset($_FILES['logoImage'])){
                $logoImage = uniqid().'_'.$_FILES['logoImage']['name'];
            }else{
                $logoImage = "";
            }

            if($logoImage == ""){
                echo json_encode(array("error" => "image filed is empty !")); exit;
            }else{
                move_uploaded_file(($_FILES['logoImage']['tmp_name']), "../../image/img/".$logoImage);
                $db->update('banner', array('title' => $title, 'subTitle' => $subTitle, 'logo' => $logoImage), "autoID = '{$id}'");

                $response = $db->getResult();

                if(!empty($response)){
                    echo json_encode(array('success' => $response));
                }
            }
        }
    }

    // delete data from database
    if(isset($_POST['delete_id'])){

        $db = new Database();
    
        $id = $db->escapeString($_POST['delete_id']);
        $title = $db->escapeString($_POST['title']);
    
        $db->delete('banner',"autoID ='{$id}'");
        $db->sql("UPDATE banner SET title = title - 1 WHERE autoID = {$title}");
        $response = $db->getResult();
        if(!empty($response)){
            echo json_encode(array('success'=>$response)); exit;
        }
    }
?>