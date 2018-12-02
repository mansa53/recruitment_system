<?php

include('C:\MAMP\htdocs\recsystem\classes\DB.php');
?>
 

<?php
if(isset($_POST['interview']))
{  
    $posts=DB::query('SELECT post_id,user_id FROM post_likes
    GROUP BY
    post_id HAVING COUNT(*)>0');
 
    foreach ($posts as $p) {
        $jobid=$p['post_id'];
        
        $userid=$p['user_id'];
        $date = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 5, date('Y')));
        
    DB::query('INSERT INTO interviews VALUES(\'\',:jobid,:userid,:dates)',array(':jobid'=>$jobid,':userid'=>$userid,':dates'=>$date));
    #DB::query('DELETE from jobs where id=:jobid',array(':jobid'=>$jobid));
    }
}





  function display() {

 if(isset($_POST['display'])) {
   
    $dbposts = DB::query('SELECT job_id,user_id,interview_date from interviews group by job_id ORDER BY id DESC');
    $posts = "";
  # print_r($dbposts);
 
    foreach($dbposts as $p) {
        $profile=$p['job_id'];
        $jprofile=DB::query('SELECT job_profile from jobs where id=:jobid',array(':jobid'=>$profile));
         $j=$jprofile[0];

           echo "<b>PROFILE</b>:$j[job_profile]
           <br/>INTERVIEW DATE:<b> $p[interview_date]</b>
           </br> ------------------------------------------------------------------------------------------------------------------------------</br>";
            }
    }
    
  }


?>