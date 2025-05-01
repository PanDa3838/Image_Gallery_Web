<?php 
namespace App;
class image{

    public function uploadimage(){
        if(isset($_POST["upload-img"])){
            $title = $_POST['title'];
            $image = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name']; // temp location for the image 
            $upload_dir = 'uploads/'.$image;
            $uploaded_at = date('Y-m-d H:i:s');
            $dbobj = new DB();
            $insertstat = "INSERT INTO `image_gallery` VALUES (NULL ,?,?,?,?)";
            $querydb = $dbobj->Connection->prepare($insertstat);
            $querydb-> bind_param('sssi' , $title , $image , $uploaded_at, $_SESSION['userID']); 
            $querystatus = $querydb->execute();
            if($querystatus){
                move_uploaded_file($tmp_name, $upload_dir); // move image from temp location to upload folder
                header('location:viewimage.php?doneupload=1');
            }else{
                alert::PrintMessage('Failed To Upload' , 'Danger');
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
}
?>