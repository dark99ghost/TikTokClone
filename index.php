<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>عرض الفيديوهات</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="video-container">
        <?php
        include 'config.php';
        $sql = "SELECT * FROM videos";
        $result = mysqli_query($conn, $sql);
        $videos = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $videos[] = $row['video_path'];
        }
        ?>
        <video id="current-video" controls autoplay loop playsinline></video>
        <div class="button-container">
            <button id="prev-btn">⬆</button>
            <button id="next-btn">⬇</button>
        </div>
    </div>
    <script>
        const videos = <?php echo json_encode($videos); ?>;
        let currentIndex = 0;
        const videoElement = document.getElementById('current-video');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');

        function loadVideo(index) {
            if (index >= 0 && index < videos.length) {
                videoElement.src = videos[index];
                videoElement.play().catch(error => {
                    console.log("خطأ في التشغيل التلقائي: ", error);
                });
                currentIndex = index;
            }
        }

        if (videos.length > 0) {
            loadVideo(0);
        }

        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) {
                loadVideo(currentIndex - 1);
            }
        });

        nextBtn.addEventListener('click', () => {
            if (currentIndex < videos.length - 1) {
                loadVideo(currentIndex + 1);
            }
        });
    </script>
</body>
</html>