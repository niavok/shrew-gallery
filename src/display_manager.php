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

class DisplayManager {
  function DisplayImagesPage($images)
  {
      $this->PrintHtmlHeader(true);
      $this->PrintImagesPageHeader($images);
      $this->PrintImagesPageBody($images);
      $this->PrintFooter();
  }
  
  function DisplayLoginPage($loginFail)
  {
    $this->PrintHtmlHeader(false);
    $this->PrintLoginForm($loginFail);
    $this->PrintFooter();
  }
  
  function PrintHtmlHeader($logout)
  {  
    $style = new Style();
    echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">'."\n";
    echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >'."\n";
    echo '  <head>'."\n";
    echo '    <title>Shrew Gallery</title>'."\n";
    echo '    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'."\n";
    echo '<style type="text/css">'."\n";
    echo $style->Generate();
    echo '</style>'."\n";
    echo '  </head>'."\n";
    echo '  <body>'."\n";
    echo '  <div id="page">'."\n";
    if($logout)
    {
      echo '    <div id=logout><a href=index.php?want=logout >Déconnection</a></div>'."\n";
    }
    echo '    <h1>Shrew gallery</h1>'."\n";
  }
  
  function PrintFooter()
  {
    echo '      <div id="footer">'."\n";
    echo '        <p id="copyright" ></p>Powered by Shrew-gallery v1.0.0 - Copyright (C) 2009 Frédéric Bertolus</p>'."\n";
    echo '        <p id="licence" >Shrew-gallery is free software: you can redistribute it and/or modify it under the terms of the GNU Affero General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.</p>'."\n";
    echo '        <p id="source" ></p>The source code can be found at the following URL : <a href="index.php?want=source">index.php</a></p>'."\n";
    echo '      </div>'."\n";//div footer
    echo '    </div>'."\n";//div page
    echo '  </body>'."\n";
    echo '</html>';
  }
  
  function PrintImagesPageHeader($images)
  {
    
    if($images)
    { 
      echo '<p>Cette gallerie contient '.count($images).' images. Vous pouvez télécharger l\'intégralité de la gallerie en suivant ce lien : <a href=all.zip >all.zip</a>.</p>'."\n";
    }
  }
  
  function PrintImagesPageBody($images)
  {
    
    if($images)
    {
      $start = 0;
      $count = 8;
      if($_GET['start'])
      {
        $start = $_GET['start'];
      }
      
      if($start <0) { $start = 0;}
      if($start >=count($images)) { $start = count($images)-1;}
      
      
      if($_GET['count'])
      {
        $count = $_GET['count'];
      }
      $end = $start+$count;
      
      if($end <0) { $end = 0;}
      if($end >count($images)) { $end = count($images);}
      
      
      echo '<p><form action="index.php" method="get">Images par page : <input name=start type=hidden value="'.$start.'"/><input type=text name=count size=2 value="'.$count.'"/> <input type=submit value=OK /></form></p>'."\n";
      
      for($index = $start; $index < $end; $index++)
      {
        $image = $images[$index];
        echo '      <div id="image-'.$index.'" class="image-bloc">'."\n";
        echo '        <div class="image-infos-bloc">'."\n";
        echo '        <div class="image-infos">'."\n";
        echo '          <h1>Image '.($index+1).' sur '.count($images).'</h1>'."\n";
        echo '          <ul>'."\n";
        echo '           <li><a href="'.$image->GetPath().'" >Original</a></li>'."\n";
        echo '          </ul>'."\n";
        echo '        </div>'."\n";
        echo '        <div class="image-infos">'."\n";
        echo '          <ul>'."\n";
        echo '           <li><a href="#page" >Haut de la page</a></li>'."\n";
        if($index>0){
          echo '           <li><a href="#image-'.($index-1).'" >Image précédente</a></li>'."\n";
        }
        if($index<($end-1)){
          echo '           <li><a href="#image-'.($index+1).'" >Image suivante</a></li>'."\n";
        }
        echo '           <li><a href="#footer" >Bas de la page</a></li>'."\n"; 
        echo '          </ul>'."\n";
        echo '          <ul>'."\n";
        
        if($start>0){
          echo '           <li><a href="index.php?count='.$count.'" >Première page</a></li>'."\n";
          echo '           <li><a href="index.php?start='.($start-$count).'&count='.$count.'" >Page précédente</a></li>'."\n";
        }
        if($end<count($images)){
          echo '           <li><a href="index.php?start='.($start+$count).'&count='.$count.'" >Page suivante</a></li>'."\n";
          echo '           <li><a href="index.php?start='.(count($images)-$count).'&count='.$count.'" >Dernière page</a></li>'."\n"; 
        }
        echo '          </ul>'."\n";
        
        
        echo '        </div>'."\n"; 
        echo '        </div>'."\n";    
        echo '        <div class="image">'."\n";
        echo '        <img src="'.$image->GetPath().'" width=800px />'."\n";
        echo '        </div>'."\n";
        echo '      </div>'."\n";//div image
      }
    } else {
      echo '      <div  class="image-bloc">'."\n";
      echo '      Aucune image trouvé'."\n";
      echo '      </div>'."\n";//div image
    }
  }
     
  function DisplaySource()
  {
    header( "Content-Type: text/plain" );
    $source = fopen("index.php","r");

    while ($ligne = fgets($source))
    {
      echo $ligne;
    }

    fclose($source);
  }

  function PrintLoginForm($loginFail)
  {
    echo '      <div  class="image-bloc">'."\n";
    echo '        <form action="index.php?want=login" method="post" >'."\n";
    echo '          <ul>'."\n";
    if($loginFail){
     echo '            <li class=error >Identifiant ou mot de passe incorrect. Accès refusé.</li>'."\n";
    }
    echo '            <li>Identifiant : <input name=login type=text /></li>'."\n";
    echo '            <li>Mot de passe : <input name=password type=password /></li>'."\n";
    echo '            <li><input type=submit value="Valider" /></li>'."\n";
    echo '          </ul>'."\n";
    echo '        </form>'."\n";
    echo '      </div>'."\n";//div image
  }
  
}

?>
