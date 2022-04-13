<?php

    namespace App\Controllers;
    use App\Support\Database;


    class Student extends Database{


        // Create Student.....
        public function student_create($name,$email,$cell,$address,$img_f_name)
        {
            $data = parent::create("INSERT INTO student (name,email,cell,address,image) VALUES ('$name','$email','$cell','$address','$img_f_name')");

            if ($data) {
                return true;
            }else{
                return false;
            }

        }

        // All Student.....
        public function student_all()
        {
            return parent::student_show("SELECT * FROM student");
            
        }



    }













?>