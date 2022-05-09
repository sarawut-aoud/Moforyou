<?php
require($_SERVER['DOCUMENT_ROOT'] . "/moforyou/plugins/phpmailer/PHPMailerAutoload.php");
$email = $_REQUEST['email'];
header('Content-Type: text/html; charset=utf-8');
$path = $_SERVER['HTTP_HOST'] .'/moforyou/pages/login/_active_id.php?email='.$email.'';
$mail = new PHPMailer;
$mail->CharSet = "utf-8";
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;


$gmail_username = "u.sarawut586@gmail.com"; // gmail ที่ใช้ส่ง
$gmail_password = "Pass0979284920"; // รหัสผ่าน gmail
// ตั้งค่าอนุญาตการใช้งานได้ที่นี่ https://myaccount.google.com/lesssecureapps?pli=1


$sender = "MOFORYOU"; // ชื่อผู้ส่ง
$email_sender = "MOFORYOU@gmail.com"; // เมล์ผู้ส่ง 
$email_receiver = $email; // เมล์ผู้รับ ***

$subject = "ยืนยันตัวตน"; // หัวข้อเมล์


$mail->Username = $gmail_username;
$mail->Password = $gmail_password;
$mail->setFrom($email_sender, $sender);
$mail->addAddress($email_receiver);
$mail->Subject = $subject;

$email_content = "
<!DOCTYPE html>
<html>
  <head>
    <meta charset='UTF-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <title>Active Your Password</title>
  </head>

  <body>
    <center>
      <table style='border-radius: 20px;background-color: white;font-size: 30px;'>
        <thead>
          <tr>
            <th>
              <h1 style='background-color:rgba(207, 116, 27, 1);padding: 10px 0 20px 10px;margin-bottom: 10px;font: size 30px;color: #FFF;'>
              
                MOFORYOU
              </h1>
            </th>
          </tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          
        </thead>
        <tbody>
          <tr >
            <td align='center' >
              <img
                style='width:25%'
                src='https://cdn-icons.flaticon.com/png/512/1709/premium/1709977.png?token=exp=1652000609~hmac=77c04fd6f63865c9c346bc4bc5e0c183'
              />
            </td>
            <tr>
              <td align='center'> 
                <a href='" . $path . "' target='_blank'>
                  <h4 style=' padding: 10px 10px 20px 10px;margin-top: 10px;'>
                  <strong style='color: #3c83f9'>
                    >> กรุณาคลิ๊กที่นี่ เพื่อยืนยันตัวตน <<
                  </strong>
                </h4>
              </a>
              
            </td>
            </tr>
            <tr>
              <td  align='center' >
                <h1 style='background-color:rgba(207, 116, 27, 1);color: #FFF;font-size: 16px;'>Copyright © 2022  MoForYou</h1>
              </td>
            </tr>
          </tr>
        </tbody>
      </table>
    </center>
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
    echo "<script>
          window.setTimeout(function() {
            window.location = '../email/sendmail.html';
          }, 1000);
        </script>";
	}
}
