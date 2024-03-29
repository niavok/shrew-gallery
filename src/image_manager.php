<?php
//l Copyright (C) 2009 Frédéric Bertolus.
//l
//l This file is part of Shrew-gallery.
//l
//l   Shrew-gallery is free software: you can redistribute it and/or modify
//l   it under the terms of the GNU Affero General Public License as published by
//l   the Free Software Foundation, either version 3 of the License, or
//l   (at your option) any later version.
//l
//l   Shrew-gallery is distributed in the hope that it will be useful,
//l   but WITHOUT ANY WARRANTY; without even the implied warranty of
//l   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//l   GNU Affero General Public License for more details.
//l
//l   You should have received a copy of the GNU Affero General Public License
//l   along with Shrew-gallery.  If not, see <http://www.gnu.org/licenses/>.

class ImageManager {
  function GetImages()
  {
    $dir = opendir('.');
    $images = array();

    while ($f = readdir($dir)) {
       if(is_file($f)) {
         if($this->IsImage($f))
         {
           $image = new Image();
           $image->SetPath($f);
           $images[] = $image;
         }
       }
    } 
    closedir($dir);
    return $images;
  }
  
  function IsImage($f)
  {
    $is_image = false;
    if(preg_match('#.jpg$#i',$f))
    {
      $is_image = true;
    }
  
    if(preg_match('#.bmp$#i',$f))
    {
      $is_image = true;
    }
   
    if(preg_match('#.png$#i',$f))
    {
      $is_image = true;
    }
    
    if(preg_match('#.jpeg$#i',$f))
    {
      $is_image = true;
    }
    
    return $is_image;

  }
}

?>
