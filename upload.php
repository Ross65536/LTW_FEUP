<?php

function upload($image, $id, $type) {
    // Generate filenames for original, small and medium files
    $originalFileName = "images/" . $type . "/originals/$id.jpg";
    $tinyFileName = "images/" . $type . "/thumbs_tiny/$id.jpg";
    $smallFileName = "images/" . $type . "/thumbs_small/$id.jpg";
    $mediumFileName = "images/" . $type . "/thumbs_medium/$id.jpg";

    // Move the uploaded file to its final destination
    move_uploaded_file($image['tmp_name'], $originalFileName);

    // Crete an image representation of the original image
    $original = imagecreatefromjpeg($originalFileName);

    $width = imagesx($original);     // width of the original image
    $height = imagesy($original);    // height of the original image
    $square = min($width, $height);  // size length of the maximum square

    // Create and save a tiny square thumbnail
    $tiny = imagecreatetruecolor(100, 100);
    imagecopyresized($tiny, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 100, 100, $square, $square);
    imagejpeg($tiny, $tinyFileName);

    // Create and save a small square thumbnail
    $small = imagecreatetruecolor(200, 200);
    imagecopyresized($small, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 200, 200, $square, $square);
    imagejpeg($small, $smallFileName);

    // Calculate width and height of medium sized image (max width: 400)
    $mediumwidth = $width;
    $mediumheight = $height;
    if ($mediumwidth > 400) {
      $mediumwidth = 400;
      $mediumheight = $mediumheight * ( $mediumwidth / $width );
    }

    // Create and save a medium image
    $medium = imagecreatetruecolor($mediumwidth, $mediumheight);
    imagecopyresized($medium, $original, 0, 0, 0, 0, $mediumwidth, $mediumheight, $width, $height);
    imagejpeg($medium, $mediumFileName);
}

 ?>
