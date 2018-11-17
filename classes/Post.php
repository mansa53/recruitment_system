<?php
class Post {
        public static function createPost($posttext,$postnum,$postbody, $loggedInUserId, $profileUserId) {
                                    
                if ($loggedInUserId == $profileUserId) {
                        DB::query('INSERT INTO jobs VALUES (\'\',:posttext,:postnum, NOW(), :postbody, \'\', :userid )', array(':posttext'=>$posttext, ':postnum'=>$postnum, ':postbody'=>$postbody, ':userid'=>$profileUserId ));
                } else {
                        die('Incorrect user!');
                }
        }
        
        public static function likePost($postId, $likerId) {
                
                if (!DB::query('SELECT user_id FROM post_likes WHERE post_id=:postid AND user_id=:userid', array(':postid'=>$postId, ':userid'=>$likerId))) {
                        DB::query('UPDATE jobs SET likes=likes+1 WHERE id=:postid', array(':postid'=>$postId));
                        DB::query('INSERT INTO post_likes VALUES (\'\', :postid, :userid)', array(':postid'=>$postId, ':userid'=>$likerId));
                } else {
                        DB::query('UPDATE jobs SET likes=likes-1 WHERE id=:postid', array(':postid'=>$postId));
                        DB::query('DELETE FROM post_likes WHERE post_id=:postid AND user_id=:userid', array(':postid'=>$postId, ':userid'=>$likerId));
                }
        }
        public static function displayPosts($userid, $username, $loggedInUserId) {
                $dbposts = DB::query('SELECT * FROM jobs WHERE user_id=:userid ORDER BY id DESC', array(':userid'=>$userid));
                $posts = "";
                foreach($dbposts as $p) {
                       echo "$p[job_profile]
                       <br/>$p[openings]
                       <br/>$p[details]";
                       
                        if (!DB::query('SELECT post_id FROM post_likes WHERE post_id=:postid AND user_id=:userid', array(':postid'=>$p['id'], ':userid'=>$loggedInUserId))) {
                               echo " <form action='profilenew.php?username=$username&postid=".$p['id']."' method='post'>
                                          
                                        <input type='submit' name='like' value='Like'>
                                        <span>".$p['likes']." likes</span>
                                </form>
                                <hr /></br />
                               ";
                        } else {
                               
                        echo " <form action='profilenew.php?username=$username&postid=".$p['id']."' method='get'>
                                        <input type='submit' name='unlike' value='Unlike'>
                                        <span>".$p['likes']." likes</span>
                                       
                                </form>";
                               
                        }
                }
                return $posts;
        }
}
?>  