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
            self::PrintMessage("Done creating your account", 'success');//استخدمت self علشان انا واقفة في كلاس الاليرت نفسه
        }
    }

    public  static function AlertAfterupload(){
        if(isset($_GET['doneupload'])){
            alert::PrintMessage("Done Uploaded Your Photo","success");
        }
    }
    public static function AlertAfterdelete(){
        if(isset($_GET['donedelete'])){
            $id = $_GET['donedelete'];
            Alert::PrintMessage("Done Delete Image #$id" , "success");
        }
    }

}
