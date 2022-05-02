<?php
session_start();

if (isset($_SESSION["id"]) && isset($_SESSION["user"])) {
	// ทำตรงนี้
} else {
	 echo "<script> window.location = '../../page-404.html' ;</script>";
}
?>