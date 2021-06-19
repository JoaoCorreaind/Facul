<?php
class ContactController
{

    var $ContactModel;
    var $UserController;

    public function __construct(){
        require_once('models/ContactModel.php');
        $this -> ContactModel = new ContactModel();
        require_once('controllers/UsersController.php');
        $this -> UserController = new UsersController();
    }


    public function listContacts(){

        if($this -> UserController -> isAdmin() == true){
            $this -> ContactModel -> getContacts();
            $result = $this -> ContactModel -> getConsult();

            $arrayContacts = array();
            
            try {
                while($line = $result -> fetch_assoc()){
                    array_push($arrayContacts,$line);
                }
                header('Content-Type: application/json');
                echo json_encode($arrayContacts);
            } catch (\Throwable $th) {
                echo $th + "funcou";
            }
                  
        }else{
            header('Content-Type: application/json');
            echo json_encode('{"message" : "token requerido"}');
        }
    }
    public function listContact($idContact){
        if($this -> UserController -> isAdmin() == true){
            $this -> ContactModel -> getContact($idContact);
            $result = $this -> ContactModel -> getConsult();
    
            $arrayContacts = array();
    
            while($line = $result -> fetch_assoc()){
                array_push($arrayContacts,$line);
            }
    
            header('Content-Type: application/json');
            echo json_encode($arrayContacts);
                  
        }else{
            header('Content-Type: application/json');
            echo json_encode('{"message" : "token requerido"}');
        }
        
        
    }

    public function insertContact(){
        
        $contact = json_decode(file_get_contents('php://input'));

        $arrayContact['name'] = $contact -> name;
        $arrayContact['email'] = $contact -> email;
        $arrayContact['message'] = $contact -> message;

        $this -> ContactModel -> insertContact($arrayContact);
        $idContact = $this -> ContactModel -> getConsult();

        header('Content-Type: application/json');
        echo ('{"result":"true"}');
    }
    
}

?>

