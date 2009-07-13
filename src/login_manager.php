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

class LoginManager {
  private $loginList = array();
  private $passwordList = array();
  private $access_locked = false;
  function WantLogin()
  {
    if(!isset($_GET['want']))
    {
      return false;
    }
    return ($_GET['want'] == 'login');
  }
  
  function WantLogout()
  {
    if(!isset($_GET['want']))
    {
      return false;
    }
    
    return ($_GET['want'] == 'logout');
  }
  
  function IsLogged()
  {
    if($this->access_locked)
    {
      if($_SESSION['logged'] == 'yes')
      {
        return true;
      } else {
        return false;
      }
    } else {
      return true;
    }
  }
  
  function TryLogin()
  {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $success = false;

    if(($pos = array_search($login,$this->loginList)) !==false)
    {
      if($this->passwordList[$pos] == $password)
      {
        $success = true;
        $_SESSION['logged'] = 'yes'; 
      }
      
    }

    return $success;
  }
  
  function Logout()
  {
    session_destroy();
    $_SESSION['logged'] = 'no'; 
  }
  
  function Load()
  {
    session_start();
    if(file_exists("access.php"))
    {
      $conf_file = fopen("access.php", "r");
      $this->access_locked = true;
      while($ligne = fgets($conf_file))
      {
        if(preg_match("#^//access ([a-zA-Z0-9]+) ([a-zA-Z0-9]+)$#", $ligne))
        {
          $ligne = str_replace("\n", "", $ligne); 
          $login = preg_replace("#^//access ([a-zA-Z0-9]+) ([a-zA-Z0-9]+)$#",'$1',$ligne);
          $password = preg_replace("#^//access ([a-zA-Z0-9]+) ([a-zA-Z0-9]+)$#",'$2',$ligne);
          $this->loginList[] = $login;
          $this->passwordList[] = $password;

        }
      }
     
      fclose($conf_file);
    } else {
      $this->access_locked = false;
    }
  }

}

?>
