<?php 
namespace App;
class image{
    
    public function uploadimage(){
        if(isset($_POST["upload-img"])){
            $title = $_POST['title'];
            $image = $_FILES['image']['name'];  
            $tmp_name = $_FILES['image']['tmp_name'];
            $upload_dir = 'uploads/'.$image;  
            $uploaded_at = date('Y-m-d H:i:s'); 
            $dbobj = new DB();
            $insertstat = "INSERT INTO `image_gallery` VALUES (NULL ,?,?,?,?)";
            $querydb = $dbobj->Connection->prepare($insertstat); 
            $querydb-> bind_param('sssi' , $title , $image , $uploaded_at, $_SESSION['userID']);
            $querystatus = $querydb->execute(); 
            if($querystatus){
                move_uploaded_file($tmp_name, $upload_dir); 
                header('location:viewimage.php?doneupload=1');
            }else{
                alert::PrintMessage('Failed To Upload Image' , 'Danger');
            }
        }
    }

    public function getimage(){
        $dbobj = new DB();
        $Uploaded_At = date('Y-m-d');
        $selectstat = 'SELECT * FROM `image_gallery` where user_id = ? ORDER BY date(Uploaded_At) = ? DESC';
        $queryobj = $dbobj ->Connection->prepare($selectstat);
        $queryobj -> bind_param('is' , $_SESSION['userID'],$Uploaded_At);
        $queryobj -> execute();
        $resultobj = $queryobj -> get_result(); 
        return $resultobj;
    }

    
    public function getimgbyid($image_id){
        $selectstat = 'SELECT * FROM `image_gallery` where Image_ID = ? ';
        $dbobj = new DB();
        $queryobj = $dbobj ->Connection->prepare($selectstat);
        $queryobj -> bind_param('i' , $image_id);
        $queryobj -> execute();
        return ($queryobj->get_result())->fetch_assoc();
    }
    public function updateimage(){
        if (isset($_POST['btn_update_image'])){
        $image_id= $_POST["image_id"];
        $title = $_POST['new_title'];
        $updateimage = $_FILES['new_image']['name'];
        $tmp_name = $_FILES['new_image']['tmp_name'];
        $upload_dir = 'uploads/'.$updateimage;  
        $updatestat = 'UPDATE  `image_gallery`set File_Name= ? , Title = ? where Image_ID = ? ';
        $dbobj = new DB();
        $queryobj = $dbobj ->Connection->prepare($updatestat);
        $queryobj -> bind_param('ssi' ,$updateimage, $title, $image_id);
        $checkquery = $queryobj -> execute();
        if ($checkquery){
            move_uploaded_file($tmp_name, $upload_dir);
            header('location:viewimage.php');}
        else{
            Alert::PrintMessage("Failed to update Image " , "Danger");
        }
    }
}

    public function deleteimage(){
        if (isset($_GET["delete"])){
            $image_id= $_GET["delete"];
            $myobjdb= new DB();
            $deletestatment='DELETE FROM `image_gallery` WHERE Image_ID = ? ';
            $querystmtobj=$myobjdb->Connection->prepare($deletestatment);
            $querystmtobj->bind_param('i',$image_id);
            $checkquery= $querystmtobj->execute();
            if ($checkquery){
                header('location:viewimage.php?DoneDelete='.$image_id);
                exit();
            }else{
                Alert::PrintMessage("Failed To Delete Image #".$image_id,"Danger");
            }
            }
    }

}