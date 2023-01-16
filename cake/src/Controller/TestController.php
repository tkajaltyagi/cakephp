<?php

namespace App\Controller;
use App\Controller\AppController;
class TestController extends AppController {
   public function registration() {
      // $this->autoRender = false;
      // Action logic goes here.

      // echo "heloo";
      $this->set("name","kajal");
      $this->set("kt", "tyagi");
      $sam = array("email" => "kajaltyagi123@gmail.com");
      $this->set(compact("sam"));
   }
  
}


?>