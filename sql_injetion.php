

// ดัก sql injection  ระดับ ต่ำ -> กลาง 
// // $ตัวแปล = htmlspecialchars(htmlspecialchars(htmlspecialchars(mysqli_real_escape_string($conn,$_POST['']),ENT_COMPAT)));
$cut = explode('/',$_SERVER["REQUEST_URI"]);
foreach($cut as $cut){
    echo ucfirst(str_replace(array(".php","/"),array(""," "),$cut) . ' / ');
}

