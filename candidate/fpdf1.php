<!DOCTYPE HTML>

<html>
	<head>
		<title>Generic - Projection by TEMPLATED</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="assets/css/main.css" />
</head>
<html>
    <body class="subpage">
   

<!-- Header -->
    <header id="header">
        <div class="inner">
            <a href="./index.php" class="logo"><strong>Home</strong></a>
            <nav id="nav">
                <a href="../index.php">Home</a>
                <a href="profile.php">Profile</a>
                
            </nav>
            <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
        </div>
    </header>
        
    
<?php



include('C:\MAMP\htdocs\recsystem\classes\Login.php');
include('C:\MAMP\htdocs\recsystem\candidate\create-account.php');
require('C:\MAMP\htdocs\recsystem\candidate\fpdf\fpdf.php');
include('C:\MAMP\htdocs\recsystem\classes\DB.php');
#require('C:\MAMP\htdocs\recsystem\candidate\fpdf\font');



if(isset($_POST['resume'])) {
    if (Login::isLoggedIn()) {
        $userid = Login::isLoggedIn();
    }

    $id=$userid;
    $objective=$_POST['objective'];
    $skill=$_POST['skills'];
    $projects=$_POST['projects'];
    $works=$_POST['work'];
    DB::query('INSERT INTO  CV VALUES(:userid,:objective,:skills,:projects,:works)',array(':userid'=>$userid,':objective'=>$objective,':skills'=>$skill,':projects'=>$projects,':works'=>$works));
$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Courier','','');
$pdf->Cell(30,10,'MyResume',1,1,'C');
$pdf->Ln(10);



$pathtofile="C:/MAMP/htdocs/recsystem/candidate/resumes/$userid";
foreach ($_POST as $key =>$data)
{   #$pdf->Cell(50,10,"$key:",1,1,'C');
    $pdf->Write(5, " $key:"); //write
    $pdf->Ln(10); // new line
    $pdf->Cell(50,10,"$data",1,1,'C');
   
    $pdf->Ln(5); // new line
}
$pdf->Output($pathtofile.'resume.pdf','F'); // save to file



}




?>

 </body>

</html>




