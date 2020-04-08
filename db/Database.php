<?php

class Database{
    private $server = "localhost";
    private $user = "root";
    private $pass = "adrianAmaya13P";
    private $db = "videogames_site";

    public function __construct(){ }

    public function connect(){
        $con = mysqli_connect($this->server, $this->user, $this->pass, $this->db);
        return $con;
    }


}