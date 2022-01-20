<?php
require_once 'func_pass.php';
require_once "functions.php";
$passcheck = new farmer();
$func_pass = new Setpwd();
// Getting post value
$pass = $_POST['old_pass'];
$id = $_POST['id'];
$sql = $passcheck->passavailable($id);

$encode = $func_pass->encode($pass); // เข้ารหัส password
$pass_sha = $func_pass->Setsha256($encode); //เอา ชื่อ + pass เข้า hmac 
$num = mysqli_fetch_assoc($sql);

if (password_verify($pass_sha, $num['password'])) {
    echo "<script>$('#old_pass').attr({class: 'form-control  is-valid'});</script>"; //todo: ถ้ารหัสผ่านตรงกับ db
    echo "<script>$('#submit_pass').prop('disabled', false);</script>"; 
}else if($pass == NULL){
    echo "<script>$('#old_pass').attr({class: 'form-control '});</script>"; //todo : ถ้าไม่ได้ใส่ข้อมูล
    echo "<script>$('#submit_pass').prop('disabled', false);</script>";
}else{
    echo "<script>$('#old_pass').attr({class: 'form-control is-invalid'});</script>"; //todo: ถ้ารหัสผ่านไม่ตรงกับ db
    echo "<script>$('#submit_pass').prop('disabled', true);;</script>"; 
}
?>
<!-- 
<script>
    var cpass = $('#passold').val();
    if (cpass == NULL) {
        $('#old_pass').attr({
            class: 'form-control '
        });
    } else if (cpass != '1001') {
        $('#old_pass').attr({
            class: 'form-control  is-invalid'
        });

    } else {
        $('#old_pass').attr({
            class: 'form-control  is-valid'
        });

    }
</script> -->