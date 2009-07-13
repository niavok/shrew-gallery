<?php

class Shrew {
  function Run()
  {
  	//Load config
    $config = new Config();
    $config->Load();
    
    $displayManager = new DisplayManager();
	  
    //Create Login Manager
    $loginManager = new LoginManager();
    
    if($loginManager->WantLogin())
    {
      $loginManager->TryLogin();
    }
    
    
    if($loginManager->IsLogged())
    {
      $imageManager = new ImageManager();
      $images = $imageManager->GetImages();
      
      $displayManager->DisplayImagesPage($images);
      
    }
    else
    {
      $displayManager->DisplayLoginPage();
    }
    
  }
}

?>
