<?php
session_start();
if (isset($_SESSION["id"]) && isset($_SESSION["user"])) {
} else {
	echo "<script> window.location = '../../page-404.html' ;</script>";
}
?>