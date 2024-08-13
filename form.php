<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';

$nazwa = $_POST['nazwa'];
$rok = $_POST['rok'];
$silnik = $_POST['silnik'];
$przebieg = $_POST['przebieg'];
$telefon = $_POST['telefon'];
$komentarz = $_POST['komentarz'];

if(!empty($email)){

$uploaddir = 'upload/';
foreach ($_FILES['upload']['error'] as $key => $error)
{
	if ($error == UPLOAD_ERR_OK)
    {
    	$tmp_name = $_FILES['upload']['tmp_name'][$key];
        $name = 'attachment'.$key.'.jpg';
        $uploadfile = $uploaddir . basename($name);
		move_uploaded_file($tmp_name, $uploadfile);
    }
}

$mail = new PHPMailer(true);
        	
try {
	//Recipients
	$mail->setFrom('k.walkowiak@zset.leszno.pl', 'MKAuto');
	$mail->addAddress('k.walkowiak@zset.leszno.pl', 'MKAuto');     //Add a recipient

	//Attachments
	if(file_exists('upload/attachment0.jpg')){
		$mail->addAttachment('upload/attachment0.jpg');         //Add attachments
	}
	if(file_exists('upload/attachment1.jpg')){
		$mail->addAttachment('upload/attachment1.jpg');         //Add attachments
	}
	if(file_exists('upload/attachment2.jpg')){
		$mail->addAttachment('upload/attachment2.jpg');         //Add attachments
	}
	if(file_exists('upload/attachment3.jpg')){
		$mail->addAttachment('upload/attachment3.jpg');         //Add attachments
	}
	if(file_exists('upload/attachment4.jpg')){
		$mail->addAttachment('upload/attachment4.jpg');         //Add attachments
	}
	//Content
	$mail->isHTML(true);                                  //Set email format to HTML
	$mail->Subject = 'Mail od: '.$names;
	$mail->Body    = 'Dane z Arkusza Strony:<br><b>Nazwa Auta:</b> '.$nazwa.'<br><b>Rocznik:</b> '.$rok.'<br><b>Silnik auta:</b> '.$silnik.'<br><b>Przebieg auta:</b> '.$przebieg.'<br><b>Telefon:</b> '.$telefon.'<br><b>Komentarz:</b> '.$komentarz.'<br>';

	$mail->send();
	if(file_exists('upload/attachment0.jpg')){
		unlink('upload/attachment0.jpg');
	}
	if(file_exists('upload/attachment1.jpg')){
		unlink('upload/attachment1.jpg');
	}
	if(file_exists('upload/attachment2.jpg')){
		unlink('upload/attachment2.jpg');
	}
	if(file_exists('upload/attachment3.jpg')){
		unlink('upload/attachment3.jpg');
	}
	if(file_exists('upload/attachment4.jpg')){
		unlink('upload/attachment4.jpg');
	}
	setcookie('success', 'alert', time() + 10, "/");
	header("Location: https://proarti.com.pl/#contact");
	die;
} catch (Exception $e) {
	setcookie('critical', 'alert', time() + 10, "/");
	header("Location: https://proarti.com.pl/#contact");
   	die;
}

} else {
	setcookie('danger', 'alert', time() + 10, "/");
	header("Location: https://proarti.com.pl/#contact");
	die;
}
?>