<?php
class Category
{
    private $category_number;
    private $description;
    private $title;


    public function init($row){
        $this->category_number = $row['category_number'];
        $this->description = $row['description'];
        $this->title = $row['title'];
    }

    public function getCategoryNumber(){
        return $this->category_number;
    }

    public function setCategoryNumber($category_number){
        $this->category_number = $category_number;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }


}