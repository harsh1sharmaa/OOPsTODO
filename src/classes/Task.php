<?php
namespace App;
class Task{
      
    public String $name;
    /**
     * contructor of Task class
     *
     * @param String $name
     */
    public function __construct(String $name)
    {

        $this->name=$name;
        
    }
}
