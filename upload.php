<?php
session_start();
#displaying alert boxes
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }

#uploading the image
if(isset($_POST['upload'])){
	if(!empty($_FILES['file']['name'])){
	#getting details of file
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
	
	#convert filename string to array
	$fileExt = explode('.',$_FILES['file']['name']);
	
	#convert file extension to lowercase
	$_SESSION['fext']=strtolower(end($fileExt));
	$allowed = array('jpg', 'jpeg', 'png');
	
	#check for allowed extensions
	if(in_array($_SESSION['fext'], $allowed)){
		if(getimagesize($fileTmpName)){
			if($fileSize<5000000){
				$fileDestination = "images/".$_FILES['file']['name'];
				if(move_uploaded_file($fileTmpName, $fileDestination)){
					$_SESSION['fname']=$_FILES['file']['name'];
					header('Location: filters.php');
				}
				else { $_SESSION['err']=1; $_SESSION['upldRedir']=1; header('location:index.php'); }
			}
			else { $_SESSION['err']=2; $_SESSION['upldRedir']=1; header('location:index.php'); }
		}
		else { $_SESSION['err']=3; $_SESSION['upldRedir']=1; header('location:index.php'); }
	}else { $_SESSION['err']=4; $_SESSION['upldRedir']=1; header('location:index.php'); }
}else { $_SESSION['err']=5; $_SESSION['upldRedir']=1; header('location:index.php');}
}

?>