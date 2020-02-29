<?php
  class Roles{
    private $_roleId;
    private $_name;

      public function getId(){
        return $this->_roleId;
      }

      public function getName(){
        return $this->_name;
      }

      public function __construct($n){
            $this->_name = $n;
      }

      public function setName($new_name){
        $this->_name = $new_name;
      }



  }

 ?>
