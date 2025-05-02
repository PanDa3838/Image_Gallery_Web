<?php

namespace App;// عشان ممكن يكون عندي نفس الكلاس في اكتر من مكان بس يأسماء مختلفة 

use mysqli; 

class DB
{
    private string $hostname = "localhost"; // incabsulated parametars
    private string $username = "root"; // هنا مثلا لو كتبت root 123 و جيت عملت ران هيعملي through exception و هيقولي ان مفيش root اسمه 123
    private string $password = "";
    private string $database = "image_gallery";// اسم الداتا بيز بتاعتي 
    public mysqli $Connection;// عملت اوبجكت جديد اسمه كونكشن من نوع mysqli

    public function __construct()// constractor --> special method --> بيتعمله كولينج اوتوماتيك اول ما اكريت اوبجكت من كلاس 
    {
        $this->Connection = new mysqli($this->hostname, $this->username, $this->password, $this->database);// هنا بخزن الاوبجكت بتاعي اللي لسمه mysqli  قي اوبجكت جديد اسمه  كونيكشن
    }// الكونكشن دي من خلالها اقدر اعمل اكسس علي اي حاجة تخص الداتا بيز 

    public function checkConnection()// الفاكشن دي عشان تعمل تشيك للكونكشن بتاعي
    {
        if ($this->Connection->connect_error == null)// null يعني الكونكشن بتاعي تمام
            echo "Connected To Database";
        else
            echo "Not Connected To Database";
    }
}
// كلاس db ملوش قافلة  عشان مش بكتبه جوا فايل htmlmysqli عبارة عن كلاس bulid in في php
// كلاس mysqli عبارة عن كلاس bulid in في php
// العلامة دي --> تحل محل تادوت اوبيراتور عشان اقدر اعمل اكسس علي الحاجة 
// this تحل محل ال self في البايثون عشان اعمل refere current object 
// مينفعش اعمل اكسس لحاجة برايفت الانها بتكون انكبسوليشن 
// الباراميترز البرايفت في الكلاس ديجرام بشير ليها ب (-)
// require_once('../class/DB.php') ده كدة اسمه ريلاتيف باث يعني حسب المكان اللي عنده هتروح لحته معينه  بكتبه عشان يقدر السيرفر يشوف الكلاس ده 
// في اخوه بقي اسمه absolute bath 
// (../) معناها اني رجعت خطوة لورا 
// (../../) كدة بقيت واقفة في htdocx
//(../) كدة بقيت واقفة في ال AI-Prohest

