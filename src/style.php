
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

class Style {
  function Generate()
  {
  	return 
    '
    body 
    {
      background-color : black;
      font-size : 0.8em;
      color : rgb(200,200,200);
    }
    
    a
    {
      text-decoration : none;
      font-style: oblique;
      color : rgb(180,180,180);
    }
    
    h1
    {
      color : rgb(220,220,220);
    }
    
    input
    {
      background-color : rgb(40,40,40);
      border : 1px solid rgb(30,30,30);
      color : rgb(230,230,230);
    }
    
    #page
    {
      margin : 15px;
      background-color : rgb(10,10,10);
      border : 1px solid rgb(20,20,20);
      padding : 10px;
    }
    
    .image-bloc
    { margin : 15px;
      background-color : rgb(20,20,20);
      border : 1px solid rgb(30,30,30);
      padding : 10px;
    }
    
    .image-infos-bloc
    {
      float:left;
    }
    
    .image-infos
    { 
      margin-bottom : 15px;
      margin-right : 15px;
      padding-bottom : 10px;
      padding-top : 10px;
      padding-right : 10px;
      background-color : rgb(10,10,10);
      border : 1px solid rgb(20,20,20);
    }
    
    #footer
    { 
      margin : 15px;
      padding : 10px;
      background-color : rgb(15,15,15);
      border : 1px solid rgb(25,25,25);
      text-align : center;
    }
    
    .image-infos h1
    {
      text-align : center;
      font-size : 1.0em;
      
    }
    
    .error
    {
      color : red;
    }
    ';
  }
}

?>
