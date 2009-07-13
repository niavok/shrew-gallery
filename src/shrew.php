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

class Shrew {
  function Run()
  {
  	//Load config
    $config = new Config();
    $config->Load();
    
    $displayManager = new DisplayManager();
	  
    //Create Login Manager
    $loginManager = new LoginManager();
    $loginManager->Load();
    $loginFail = false;
    if($loginManager->WantLogin())
    {
       $loginFail = !$loginManager->TryLogin();
       if(!$loginFail)
       {
         header('location: index.php');
       }
    }
    
    if($loginManager->WantLogout())
    {
       $loginManager->Logout();
    }
   
    if(isset($_GET['want']) and $_GET['want']== 'source')
    {
      $displayManager->DisplaySource();
    }
    else if($loginManager->IsLogged())
    {
      $imageManager = new ImageManager();
      $images = $imageManager->GetImages();
      
      $displayManager->DisplayImagesPage($images);
      
    }
    else
    {
      $displayManager->DisplayLoginPage($loginFail);
    }
    
  }
}

?>
