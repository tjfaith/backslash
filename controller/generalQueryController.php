<?php 

use Illuminate\Http\Request;
use Illuminate\Database\Capsule\Manager as Capsule;

use Models\school;
use Models\program_type;
use Models\department;

class generalQueryController
{
        // Generate id
        private function generateId(){
            // CODE TO GENERATE ID
             $token = 'qwertzuiopasdfghjklyxcvbnmABCDEFGHIJKLMNOPQRSTUVWXYZ123456789abcdefghijklmnopqrstuvwxyz';
             $token = str_shuffle($token);
             $token = substr($token,  0,  2);
             $current_date = date('Ymd');
             return $token = $token.$current_date;
         }

         public function school(){
            //  echo 'sch_'.$this->generateId();
           echo json_encode($user_id = school::get());

         }

         public function program_type($data){
          echo json_encode(program_type::where('school_type', $data['school_type'])->get());
         }
         public function  all_department($data){
          echo json_encode(department::where('school_id', $data['school_id'])->get());
         }
  
}


?>