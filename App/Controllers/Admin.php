<?php

    namespace App\Controllers;
    use App\Support\Database;

    class Admin extends Database{

        //Admin Registration......
        public function admin_registration($name,$email,$cell,$hash_pass,$img_f_name)
        {
            $data = parent::create("INSERT INTO admin (name,email,cell,pass,image) VALUES ('$name','$email','$cell','$hash_pass','$img_f_name')");
            if ($data) {
                return true;
            }else{
                return false;
            }

        }

        //Admin Login......
        public function admin_login($ema_usa, $pass)
        {
            $data = parent::login("SELECT * FROM admin WHERE email='$ema_usa'");
            $all_data = $data -> num_rows;

            if ($all_data > 0) {
                return true;
            }else{
                return false;
            }

        }

        //Select Data......
        public function select_data($ema_usa)
        {
            $data = parent::login("SELECT * FROM admin WHERE email='$ema_usa'");
            return $all_data = $data -> fetch_object();
        }














    }













?>