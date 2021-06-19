<?php
class ConnectClass{

    var $conn;

    public function openConnect()
    {
        $servername = '127.0.0.1';
        $username = 'root';
        $password = 'root';
        $dbname = 'banco_do_javis';
        $this -> conn = new mysqli($servername, $username, $password, $dbname);
    }

    public function getConn()
    {
        return $this -> conn;
    }
}


?>