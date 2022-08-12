<?php
namespace App;
class Product extends BaseModel {
    public function listProducts(){
        return 'List Products';
    }
    public function createProduct(){
        return "<h2> Create BaseModel from extends class ".$this->create()."</h2>";

    }
}