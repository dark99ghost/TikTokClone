<?php
include 'config.php';

if (isset($_FILES['video'])) {
    $video = $_FILES['video'];
    $video_name = $video['name'];
    $video_tmp = $video['tmp_name'];
    $video_path = "uploads/" . $video_name;

    // نقل الفيديو لمجلد uploads
    if (move_uploaded_file($video_tmp, $video_path)) {
        // إضافة المسار لقاعدة البيانات
        $sql = "INSERT INTO videos (video_path) VALUES ('$video_path')";
        if (mysqli_query($conn, $sql)) {
            echo "تم رفع الفيديو بنجاح!";
        } else {
            echo "خطأ في قاعدة البيانات: " . mysqli_error($conn);
        }
    } else {
        echo "فشل رفع الفيديو.";
    }
}
?>