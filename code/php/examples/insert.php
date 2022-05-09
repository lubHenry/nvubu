<?php
require('db.php');
global $con;
require('auth.php');
if(!empty($_POST))
{
    $output = '';
    $sector = mysqli_real_escape_string($con, $_POST["sector"]);
    $distress = mysqli_real_escape_string($con, $_POST["distress"]);
    $post = "Possible".$distress." in ".$sector;
    $email = $_SESSION['email'];
    $id_Qry = "SELECT id from users where email = $email";
    $idOut = $con->query($id_Qry);
    $userId= $idOut->fetch_array(MYSQLI_ASSOC);
    $query = "
    INSERT INTO posts(post,type, sector, userid, posted_by)  
     VALUES('$post', 1, '$sector', '$userId', '$userId')
    ";
    if(mysqli_query($con, $query))
    {
        $output .= '<label class="text-success">Submission Done</label>';
    }
    echo $output;
}
?>