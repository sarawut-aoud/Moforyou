<?php

session_start();

unset($_SESSION["id"]);
unset($_SESSION["user"]);
unset($_SESSION["fullname"]);
unset($_SESSION["person_id"]);
unset($_SESSION["phone"]);
unset($_SESSION["email"]);

echo "<script>
	window.setTimeout(function() {
		window.location = '../login/login';
	 }, 1000);
</script>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="icon" href="../../dist/img/icon/icon.ico" type="image/x-icon" />

    <title>logout</title>


    <!-- Font Awesome Icon -->
    <link type="text/css" rel="stylesheet" href="../../dist/css/font-awesome.min.css" />

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="../../dist/css/style404.css" />

</head>

<body>

    <div id="notfound" style="background-color: white;">
        <div class="notfound">
            <div class="">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div>
                <img src="../../dist/img/load2.gif" style="width:400px">
                <h2>กำลังออกจากระบบ <span style="color:saddlebrown;">Good bye!</span></h2>
            </div>

            <!-- <h2 style="color: red;">กำลังออกจากระบบ</h2> -->
        </div>
    </div>

</body>

</html>