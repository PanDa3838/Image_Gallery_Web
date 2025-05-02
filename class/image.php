<?php 
namespace App;
class image{

    public function uploadimage(){
        if(isset($_POST["upload-img"])){
            $title = $_POST['title'];
            $image = $_FILES['image']['name'];  // ['image'] => name of the input , ['name'] => key in $_FILES To Take Name of image
            $tmp_name = $_FILES['image']['tmp_name']; // temp location for the image 
            $upload_dir = 'uploads/'.$image;  // direction to put the images 
            $uploaded_at = date('Y-m-d H:i:s'); // used to ranking images from old to new 
            $dbobj = new DB();
            $insertstat = "INSERT INTO `image_gallery` VALUES (NULL ,?,?,?,?)";
            $querydb = $dbobj->Connection->prepare($insertstat); // return object in sqli , $queryobj => type 'mysqli statement'
            $querydb-> bind_param('sssi' , $title , $image , $uploaded_at, $_SESSION['userID']); // Speprate sql query and data , prevent sql injection
            $querystatus = $querydb->execute(); // return boolean
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
        $resultobj = $queryobj -> get_result(); // hold the data was selected
        return $resultobj;
    }

    public function deleteimage(){
        if (isset($_POST['delbtn'])){
            $image_id = $_POST['image_id'];
            $myobjdb = new DB();
            $deletestat = "DELETE FROM `image_gallery` WHERE Image_ID = ?";
            $querydeletestat = $myobjdb->Connection->prepare($deletestat);
            $querydeletestat->bind_param('i', $image_id);
            $querystatus = $querydeletestat->execute();
            if($querystatus){
                header("location:viewimage.php?donedelete=$image_id");
            }else{
                Alert::PrintMessage("Failed to Delete Image #".$image_id , "Danger");
            }
            }
            
    }
}
?>