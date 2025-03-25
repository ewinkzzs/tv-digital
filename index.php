<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TV Digital</title>
    <link href="https://db.onlinewebfonts.com/c/f147179ef27e8141cadd3f6bca344f21?family=Abadi+MT+Std+Condensed" rel="stylesheet">
    <style>
        body { margin: 0; overflow: hidden; background-color: black; color: white; font-family: 'Abadi MT Std Condensed', sans-serif;}
        .media-container { display: flex; justify-content: center; align-items: center; width: 100vw; height: 90vh; }
        img, iframe, video { width: 100vw; height: 90vh; object-fit: contain; display: none; }

        /* Running text */
        .running-text-container {
            position: absolute;
            bottom: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            overflow: hidden;
            white-space: nowrap;
            padding: 0px 0px 20px 0px;
            font-family: 'Abadi', sans-serif;
            font-size: 30px;
            display: flex;
        }
        .running-text {
            display: inline-block;
            white-space: nowrap;
            padding-right: 50px;
            animation: marquee 10s linear infinite;
        }
        .running-text-wrapper {
            display: flex;
            width: 200%;
        }
        @keyframes marquee {
            from { transform: translateX(0%); }
            to { transform: translateX(-50%); }
        }
    </style>
</head>
<body>
    <div class="media-container">
        <iframe id="mediaYoutube" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        <img id="mediaImage">
        <video id="mediaVideo" controls></video>
    </div>

    <div class="running-text-container">
        <div class="running-text-wrapper">
            <span class="running-text">
                Jarak Mekkah tidak akan berubah, jika kamu tidak pernah melangkah | Umrah bukan soal harga, tapi soal berkah
                "Sebaik-baik manusia adalah yang paling bermanfaat bagi manusia lain." - HR. Ahmad &nbsp; &nbsp;
            </span>
            <span class="running-text">
                Jarak Mekkah tidak akan berubah, jika kamu tidak pernah melangkah | Umrah bukan soal harga, tapi soal berkah
                "Sebaik-baik manusia adalah yang paling bermanfaat bagi manusia lain." - HR. Ahmad &nbsp; &nbsp;
            </span>
        </div>
    </div>

    <script>
        const mediaList = [
            { type: "youtube", src: "https://www.youtube.com/embed/zVaXfF3uZbI?autoplay=1&mute=1&enablejsapi=1" },
            { type: "image", src: "assets/image/WhatsApp Image 2024-11-05 at 14.26.13_79a52017.jpg" },
            { type: "image", src: "assets/image/WhatsApp Image 2024-10-14 at 16.04.41_ic879bdb.jpg" },
            { type: "image", src: "assets/image/WhatsApp Image 2024-10-21 at 16.41.44_6bdcc01a.jpg" },
            { type: "video", src: "assets/video/Keberangkatan 27 Agustus 2023.mp4" },
            { type: "video", src: "assets/video/Keberangkatan 30 Agustus 2023.mp4" },
            { type: "video", src: "assets/video/Keberangkatan jamaah 20 September 2023.mp4" },
            { type: "video", src: "assets/video/Kepulangan jamaah 27 Agustus 2023.mp4" },
            { type: "video", src: "assets/video/Kepulangan jamaah 30 Agustus 2023.mp4" }
        ];

        let currentIndex = 0;
        const imgElement = document.getElementById("mediaImage");
        const youtubeElement = document.getElementById("mediaYoutube");
        const videoElement = document.getElementById("mediaVideo");

        function showMedia() {
            imgElement.style.display = "none";
            youtubeElement.style.display = "none";
            videoElement.style.display = "none";

            const media = mediaList[currentIndex];

            if (media.type === "youtube") {
                youtubeElement.src = media.src;
                youtubeElement.style.display = "block";

                setTimeout(() => {
                    youtubeElement.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
                }, 1000);

                setTimeout(() => {
                    youtubeElement.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
                    nextMedia();
                }, 10000);
            } 
            else if (media.type === "image") {
                imgElement.src = media.src;
                imgElement.style.display = "block";
                setTimeout(nextMedia, 5000);
            } 
            else if (media.type === "video") {
                videoElement.src = media.src;
                videoElement.style.display = "block";
                videoElement.play();
                videoElement.onended = nextMedia;
            }
        }

        function nextMedia() {
            currentIndex = (currentIndex + 1) % mediaList.length;
            showMedia();
        }

        showMedia();
    </script>
</body>
</html>
