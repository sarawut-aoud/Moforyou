<?php 
require($_SERVER['DOCUMENT_ROOT'] . "./plugins/phpmailer/PHPMailerAutoload.php");

header('Content-Type: text/html; charset=utf-8');

$mail = new PHPMailer;
$mail->CharSet = "utf-8";
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;


$gmail_username = "xxxx@gmail.com"; // gmail ที่ใช้ส่ง
$gmail_password = "xxxx"; // รหัสผ่าน gmail
// ตั้งค่าอนุญาตการใช้งานได้ที่นี่ https://myaccount.google.com/lesssecureapps?pli=1


$sender = "MOFORYOU"; // ชื่อผู้ส่ง
$email_sender = "u.sarawut586@gmail.com"; // เมล์ผู้ส่ง 
$email_receiver = "aun.puri@gmail.com"; // เมล์ผู้รับ ***

$subject = "เปลี่ยนรหัสผ่าน"; // หัวข้อเมล์


$mail->Username = $gmail_username;
$mail->Password = $gmail_password;
$mail->setFrom($email_sender, $sender);
$mail->addAddress($email_receiver);
$mail->Subject = $subject;

$email_content = "
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset=utf-8'/>
			<title>ทดสอบการส่ง Email</title>
		</head>
		<body>
			<h1 style='background: #3b434c;padding: 10px 0 20px 10px;margin-bottom:10px;font-size:30px;color:white;' >
				<img src='http://pngimg.com/uploads/apple_logo/apple_logo_PNG19670.png' style='width: 80px;'>
				APPLE
			</h1>
			<div style='padding:20px;'>
				<div style='text-align:center;margin-bottom:50px;'>
					<img src='http://cdn.wccftech.com/wp-content/uploads/2017/02/Apple-logo.jpg' style='width:100%' />					
				</div>
				<div>				
					<h2>การกู้รหัสผ่าน สำหรับ Apple : <strong style='color:#0000ff;'></strong></h2>
					<a href='#' target='_blank'>
						<h1><strong style='color:#3c83f9;'> >> กรุณาคลิ๊กที่นี่ เพื่อตั้งรหัสผ่านใหม่<< </strong> </h1>
					</a>
				</div>
				<div style='margin-top:30px;'>
					<hr>
					<address>
						<h4>ติดต่อสอบถาม</h4>
						<p>Apple Thailand</p>
						<p>www.facebook.com/apple</p>
					</address>
				</div>
			</div>
			<div style='background: #3b434c;color: #a2abb7;padding:30px;'>
				<div style='text-align:center'> 
					2016 © Apple Thailand
				</div>
			</div>
		</body>
	</html>
";

//  ถ้ามี email ผู้รับ
if ($email_receiver) {
	$mail->msgHTML($email_content);


	if (!$mail->send()) {  // สั่งให้ส่ง email

		// กรณีส่ง email ไม่สำเร็จ
		echo "<h3 class='text-center'>ระบบมีปัญหา กรุณาลองใหม่อีกครั้ง</h3>";
		echo $mail->ErrorInfo; // ข้อความ รายละเอียดการ error
	} else {
		// กรณีส่ง email สำเร็จ
		echo "ระบบได้ส่งข้อความไปเรียบร้อย";
	}
}



?>