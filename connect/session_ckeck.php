<?php
session_start();
if (isset($_SESSION["id"]) && isset($_SESSION["user"])) {
} else {
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title></title>
		<?php
		require_once '../../build/script.php';
		?>
	</head>

	<body>
		<script>
			Swal.fire({

				title: '<h1>โปรดทำการเข้าสู่ระบบ !!</h1>',
				icon: 'warning',
				text: '',
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'ตกลง'
			}).then((result) => {
				window.location = '../../pages/login/login'
			})
		</script>
	</body>

	</html>
<?php
	exit();
}
?>