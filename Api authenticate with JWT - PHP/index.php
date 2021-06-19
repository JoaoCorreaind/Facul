<?php

  session_start();  
  $requestMethod = $_SERVER['REQUEST_METHOD']; 
  $local = $_SERVER['SCRIPT_NAME']; 
  $uri = $_SERVER['PHP_SELF'];
  $rout = str_replace($local, '', $uri);

  $uriSegments = explode('/', $rout);

  if(isset($uriSegments[1])){
      $controller = $uriSegments[1];
      switch($controller){
        case 'contacts':
          require_once('controllers/ContactController.php');
          $Contact = new ContactController();
          switch($requestMethod){
              case 'GET':
                try {
                  if(isset($uriSegments[2])){
                    $Contact -> listContact($uriSegments[2]);
                  }else{
                    $Contact -> listContacts();
                  }
                } catch (\Throwable $th) {
                  print $th;
                }
                
                
              break;
              case 'POST':
                $Contact -> insertContact();
              break;
          }
        break;

        case 'users':
          require_once('controllers/UsersController.php');
          $Users = new UsersController();
          switch($requestMethod){
            case 'GET':
              if(isset($uriSegments[2]) && $uriSegments[2]=='login'){
                if(!isset($uriSegments[3]) || $uriSegments[3]= ''){
                    $Users -> login();
                }
                  
              }
            break;
          }
        
          break;
      
    }
  }
?>