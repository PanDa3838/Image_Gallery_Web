<?php
namespace App;
    
class Alert
{
    public static function PrintMessage($text, $type)
    {
        if (strtolower($type) == "danger")
            echo "<div style='text-align:center;margin-bottom:0;' class='alert alert-danger' role='alert'>" . $text . "</div>";
        else
            echo "<div style='text-align:center;margin-bottom:0;' class='alert alert-primary' role='alert'>" . $text . "</div>";
    }

    public static function alertAfterSignUp()
    {
        if (isset($_GET["doneSignUp"])) {
            Alert::PrintMessage("Done Create your account", 'success');
        }
    }

    public  static function AlertAfterupload(){
        if(isset($_GET['doneupload'])){
            Alert::PrintMessage("Done Uploaded Your Photo","success");
        }
    }
    public static function AlertAfterdelete(){
        if(isset($_GET['DoneDelete'])){
            $id = $_GET['DoneDelete'];
            Alert::PrintMessage("Done Delete Image #$id" , "success");
        }
    }

}
