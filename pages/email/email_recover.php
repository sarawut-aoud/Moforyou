<?php

// require '../../vendor/phpmailer/phpmailer/src/Exception.php';
// require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
// require '../../vendor/phpmailer/phpmailer/src/SMTP.php';

require '../../plugins/phpmailer/PHPMailerAutoload.php';
//Load Composer's autoloader
// require '../../vendor/autoload.php';
$email = $_REQUEST['email'];
// header('Content-Type: text/html; charset=utf-8');
$path = $_SERVER['HTTP_HOST'] . '/pages/login/recover-password.php?email=' . $email . '';
// $path = $_SERVER['HTTP_HOST'] . '/moforyou/pages/login/recover-password.php?email=' . $email . '';

//mail server//
$mail->CharSet = "utf-8";
$mail->isSMTP();
$mail->Mailer = 'stmp';
$mail->Host = 'mail.primary-serv.com';
$mail->Port = 25;
$mail->SMTPAuth = false;
$mail->SMTPAutoTLS = false;
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$gmail_username = "moforyou@mfu.primary-serv.com"; // gmail ที่ใช้ส่ง
$gmail_password = "Pass123456"; // รหัสผ่าน gmail
//mail server//

//gamil
// $mail->CharSet = "utf-8";
// $mail->isSMTP();
// $mail->Mailer = 'stmp';
// $mail->SMTPSecure = 'ssl';
// $mail->Host = 'smtp.gmail.com';
// $mail->Port = '465';
// $mail->SMTPAuth = true;
// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
// $gmail_username = "u.sarawut586@gmail.com"; // gmail ที่ใช้ส่ง
// $gmail_password = "Pass0979284920"; // รหัสผ่าน gmail
//gamil

$sender = "MOFORYOU"; // ชื่อผู้ส่ง
$email_sender = "MOFORYOU@gmail.com"; // เมล์ผู้ส่ง 
// $email_receiver = "sarawut.aou@pcru.ac.th"; // เมล์ผู้รับ ***
$email_receiver = $email; // เมล์ผู้รับ ***

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
    <meta charset='UTF-8' />
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <meta http-equiv='Content-Type' content='text/html; charset=windows-874'>
    <meta http-equiv='Content-Type' content='text/html; charset=tis-620'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <title>Reset Your Password</title>
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
                style='width: 25%'
                src='https://img.icons8.com/external-inipagistudio-mixed-inipagistudio/344/external-password-cycber-security-system-inipagistudio-mixed-inipagistudio.png'
              />
            </td>
            <tr>
              <td  align='center' >
                คุณจำรหัสผ่านไม่ได้ใช่หรือไม่  ?
              </td>
            </tr>
            <tr>
              <td align='center'> 
                <a href='" . $path . "' target='_blank'>
				<h4 style=' padding: 10px 10px 20px 10px;margin-top: 10px;'>
                  <strong style='color: #3c83f9'>
                    >> กรุณาคลิ๊กที่นี่ เพื่อตั้งรหัสผ่านใหม่ <<
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
    // echo "ระบบได้ส่งข้อความไปเรียบร้อย";
    echo "<script>
          window.setTimeout(function() {
            window.location = '../email/sendmail.html';
          }, 1000);
        </script>";
  }
}
