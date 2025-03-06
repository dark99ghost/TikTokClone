<?php
$host = "localhost";
$user = "root"; // اسم المستخدم الافتراضي لـ XAMPP
$pass = "";     // كلمة السر الافتراضية (فاضية)
$db = "tiktok_clone";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("فشل الاتصال: " . mysqli_connect_error());
}
?>