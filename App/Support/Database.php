<?php
    namespace App\Support;
    include_once "vendor/autoload.php";
    use mysqli;

    abstract class Database{

        private $host = "localhost";
        private $user = "root";
        private $pass = "";
        private $db_name = "stu_crud";
        private $connection ;

        //Database Connection......
        private function Connection()
        {
            return $this -> connection = new mysqli($this -> host, $this -> user, $this -> pass, $this -> db_name);
        }

        //Admin Registration.......
        public function create($sql)
        {
            return $this -> Connection() -> query($sql);
        }

        //Admin Login.......
        public function login($sql)
        {
            return $this -> Connection() -> query($sql);
        }

        //Student show....
        public function student_show($sql)
        {
            return $this -> Connection() -> query($sql);
        }
















    }














?>