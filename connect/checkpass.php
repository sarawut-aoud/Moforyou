<?php
require_once "functions.php";
$passcheck = new farmer();

// Getting post value
$pass = md5($_POST['old_pass']);
$id = $_POST['id'];
$sql = $passcheck->passavailable($id);

$num = mysqli_fetch_assoc($sql);

echo "<input type='hidden' id='passrenew' value=" . $pass . ">";
echo "<input type='hidden' id='passold' value='" . $num['password'] . "'>";
?>
<script>
    var pass = $('#passrenew').val();
    var cpass = $('#passold').val();
    if (pass == "d41d8cd98f00b204e9800998ecf8427e") {
        $('#old_pass').attr({
            class: 'form-control '
        });
    } else if (pass != cpass) {
        $('#old_pass').attr({
            class: 'form-control  is-invalid'
        });

    } else {
        $('#old_pass').attr({
            class: 'form-control  is-valid'
        });

    }
</script>
