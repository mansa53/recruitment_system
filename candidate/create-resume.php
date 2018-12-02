<?php
      function createResume() {
        include('C:\MAMP\htdocs\recsystem\classes\DB.php');
        include('C:\MAMP\htdocs\recsystem\classes\Login.php');
        if(isset($_POST['resume'])) {
                $objective=$_POST['objective'];
                $skill=$_POST['skills'];
                $projects=$_POST['projects'];
                $works=$_POST['work'];
                if (Login::isLoggedIn()) { 
                        $userid = Login::isLoggedIn();
                }
                       
                DB::query('INSERT INTO  CV VALUES(:userid,:objective,:skills,:works,:projects)',array(':userid'=>$userid,':objective'=>$objective,':skills'=>$skill,':works'=>$works,':projects'=>$projects));
               # echo "Success";      
        }
    }


?>