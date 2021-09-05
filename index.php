<?php
if(isset($_POST['download'])) { // if download button clicked
    $imgUrl = $_POST['imgurl']; // getting image url from hidden input
    $ch = curl_init($imgUrl);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); // it returns data as the return value of curl_exec rather than outputting it directly
    $download = curl_exec($ch); // executing curl
    // echo $download;
    curl_close($ch); // closing curl session
    header('Content-type: image/jpg');
    header('Content-Disposition: attachment; filename="thumbnail.jpg"');
    echo $download;

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <title>Download youtube video thumbnail</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
        <header>Download Thumbnail</header>
        <div class="url-input">
            <span class="title">Paste video url:</span>
            <div class="field">
                <input type="text" placeholder = "https://www.youtube.com/watch?v=QJqGa_CVnLo" required>
                <input class = "hidden-input" type="hidden" name = "imgurl">
                <div class="bottom-line"></div>
            </div>
        </div>

        <div class="preview-area">
            <img src="youtube.jpg" alt="thumbnail" class="thumbnail">
            <i class="icon fas fa-cloud-download-alt"></i>
            <span>Paste video url to see preview</span>
        </div>
        <button class="download-btn" type="submit" name = "download">Download thumbnail</button>
    </form>


    <script>
        const urlField = document.querySelector(".field input");
        previewArea = document.querySelector(".preview-area");
        imgTag = previewArea.querySelector(".thumbnail");
        hiddenInput = document.querySelector(".hidden-input");

        urlField.onkeyup = () => {
            let imgUrl = urlField.value;
            previewArea.classList.add("active");


            if(imgUrl.indexOf("https://www.youtube.com/watch?v=") != -1){ // if entered value is yt video url
                let vidId = imgUrl.split("v=")[1].substring(0,11); // splitting yt video url from v= so we can get only video id
                // console.log(vidId);
                let ytImgUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`; // passing entered url video id inside by thumbnail url
                // console.log(ytImgUrl);
                imgTag.src = ytImgUrl;

            }else if(imgUrl.indexOf("https://youtu.be/") != -1){ // if video url is look like this
                let vidId = imgUrl.split("be/")[1].substring(0,11); // splitting yt video url from be/ so we can get only video id
                // console.log(vidId);
                let ytImgUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`; // passing entered url video id inside by thumbnail url
                // console.log(ytImgUrl);
                imgTag.src = ytImgUrl;

            }
            else if(imgUrl.match(/\.(jpe?g|png|gif|bmp|webp)$/i)){ // if entered value is other image file url
                imgTag.src = imgUrl;
            }
            else{
                imgTag.src = "";
                previewArea.classList.remove("active");
            }

            hiddenInput.value = imgTag.src; // passing img src to hidden input value

        }

    </script>
    
</body>
</html>