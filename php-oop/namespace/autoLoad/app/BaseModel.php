<?php
namespace App;
class BaseModel{
    public function create(){
        return 'Create Base Model';
    }
    public function createFormBaseModel(){
        return "<h2> Create BaseModel from inside ".$this->create()."</h2>";
    }
}