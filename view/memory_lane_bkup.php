<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="utf-8">
  <meta name="keywords" content="My Own Memory Lane, memory, memory support, cognitive support, dementia, alzheimer's, alzheimer, alzheimers, alzheimer's disease, alzheimers disease, alzheimer disease, help alzheimer's, forget, foregetting, memory loss, memory impairment">
  
  <title>My Own Memory Lane</title><meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="css/responsiveslides.css">
    <link rel="icon" type="image/png" href="favicon.png">
  <link rel="stylesheet" href="css/demo.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="js/responsiveslides.min.js"></script>
  <script>
    // You can also use "$(window).load(function() {"
    $(function () {

      $("#slider4").responsiveSlides({
        auto: true,
        pager: false,
        nav: false,
        speed: 3000,  
		timeout: 8000,
      });

    });
  </script></head>
<body>
<table style="width: 100%;" align="right" border="0" cellpadding="0" cellspacing="0">
<tbody><tr>
<td style="width: 146px;"><a href="index.php"><img src="images/400%20x%20400%20logo.png" alt="My Own Memory Lane" style="border: 0px solid ; width: 100px; height: 100px;"></a></td>
<td style="text-align: left;"><h1 style="margin-left: 18px;text-transform:capitalize"><?php echo $_SESSION['f_name']; if(substr($_SESSION['f_name'], -1)!="s"){echo "'s";}else{echo "'";} ?> Memory Lane</h1></td></tr></tbody></table>
  <div id="wrapper">
    <div class="callbacks_container">
      <ul class="rslides" id="slider4">
      <?php
	  foreach($photos as $photo) {?>
        <li align="center">
          <img src="<?php echo $photo['photo_name']; ?>" width="100%" alt="" align="center">
          <p class="caption"><?php echo $photo['photo_caption']; ?></p>
        </li>
     <?php } ?>
      </ul>
    </div>
	<a href="index.php?page=manage_photos">Edit My Own Memory Lane</a>    
  </div>
