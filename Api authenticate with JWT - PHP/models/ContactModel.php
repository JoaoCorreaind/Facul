<?php

    class ContactModel{
        var $result;
        var $conn;

        public function __construct()
        {
            require_once('bd/connectClass.php');
            $Oconn = new connectClass();
            $Oconn -> openConnect();
            $this -> conn = $Oconn ->getConn();

        }
        public function getContacts() {
            $sql = "SELECT * FROM contacts order by idContact";

            $this -> result = $this -> conn -> query($sql);

        }

        public function insertContact($arrayContact) //inseir dados no array pro banco
        {
            $sql = "
                INSERT INTO contacts
                    (name, email, message )
                VALUES(
                    '{$arrayContact['name']}',
                    '{$arrayContact['message']}',
                    '{$arrayContact['email']}'
                    
                )
            ";

            $this -> conn -> query($sql);
            $this -> result = $this -> conn -> insert_id;
        }

        public function getContact($idContact)
        {
            $sql = "
                SELECT * FROM contacts 
                WHERE idContact = {$idContact}
            ";
            $this -> result = $this -> conn -> query($sql);
        }

        
        public function getConsult(){
            return $this -> result;
        }
    }
