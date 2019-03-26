<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Music Viewer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="viewer.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
    <div id="header">
    
      <h1>190M Music Playlist Viewer</h1>
      <h2>Search Through Your Playlists and Music</h2>
    </div>
    <div id="listarea">
     
      <ul id="musiclist">
      <?php
            foreach (glob("songs/*.mp3") as $filename) {
           list($a, $b) = explode('/', $filename);
               
          ?>
              
               <li class="mp3item">
                 
                  <a href="<?=$filename?>"> <?= " $b"?>  (<?php 
              if(filesize($filename)>0 && (filesize($filename))<1023)
              {
                  echo "".filesize($filename). " b" ;
              }
              else if (filesize($filename) >=1024 && filesize($filename)<=1048575)
              {
                  
					$kilobyte = round(filesize($filename)/1024,2);
					echo "" .$kilobyte. " Kb";
				}
                 else  if(filesize($filename) >1048576)
              {
                  
					$megabyte = round(filesize($filename)/1048576,2);
					echo "" .$megabyte. " Mb";
				}
                      
                      ?>)</a>     
               </li>
               
              <?php 
            } ?>
            
            
    <?php
            foreach (glob("songs/*.txt") as $textName) {
                list($a, $b) = explode('/', $textName);
              ?>
    
               <li class="playlistitem">
                 
                  <a href="<?=$textName?>">  <?=" $b" ?></a>
                  
                  </li>
              <?php 
            } ?>
         
      </ul>
    </div>
  </body>
</html>