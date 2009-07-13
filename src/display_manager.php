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
  function DisplayImagesPage()
  {
      $this->PrintHtmlHeader();
      $this->PrintImagesPageHeader();
      $this->PrintImagesPageBody();
      $this->PrintFooter();
  }
  
  function DisplayLoginPage()
  {
  }
  
  function PrintHtmlHeader()
  {  
    echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
    echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >';
    echo '  <head>';
    echo '    <title>Bienvenue sur mon site !</title>';
    echo '    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
    echo '  </head>';
    echo '  <body>';
    echo '  <div id="page">';
  }
  
  function PrintFooter()
  {
    echo '      <div id="footer">';
    echo '        <p id="copyright" ></p>Powered by Shrew-gallery - Copyright (C) 2009 Frédéric Bertolus</p>';
    echo '        <p id="licence" >Shrew-gallery is free software: you can redistribute it and/or modify it under the terms of the GNU Affero General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.</p>';
    echo '        <p id="source" ></p>The source code can be found at the following URL : <a href="shrew-gallery.tar.gz>shrew-gallery.tar.gz</a></p>';
    echo '      </div>';//div footer
    echo '    </div>';//div page
    echo '  </body>';
    echo '</html>';
  }
  
  function PrintImagesPageHeader()
  {
  }
  
  function PrintImagesPageBody()
  {
  }
     


  
}

?>
