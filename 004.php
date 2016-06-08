<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        // var_dump($_FILES['avatar'], __DIR__);

    class Photo {
        public function upload($photo){
        $filename = md5(date('Y-m-d H:i:s')) . '.jpg';
        $photo = __DIR__. '/'. $filename;
        if(move_uploaded_file($_FILES['avatar']['tmp_name'], $photo)) {
            echo "Successfully Uploaded";
            // var_dump($filename);
            // echo $filename;
            echo "<img src=\"$filename\">";
            }

        }
    }


    $picupload = new Photo($photo);
    $picupload->upload($photo);




    ?>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="avatar">
        <button type="submit">Upload</button>
    </form>
</body>
</html>