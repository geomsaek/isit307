<?php

class StockedItem
{
    private $item_number;
    private $price;
    private $description;
    private $title;
    private $category_number;
    private $image;

    public function init($row)
    {
        $this->description = $row['description'];
        $this->price = $row['price'];
        $this->item_number = $row['item_number'];
        $this->title = $row['title'];
        $this->image = $row['img'];
        $this->category_number = $row['category_number'];
    }

    public function getItemNumber(){
        return $this->item_number;
    }

    public function setItemNumber($item_number){
        $this->item_number = $item_number;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setPrice($price){
        $this->price = $price;
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

    public function getCategory(){
        return $this->category_number;
    }

    public function setCategory($category_number){
        $this->category_number = $category_number;
    }

    public function getImage(){
        return $this->image;
    }

    public function setImage($image){
        $this->image = $image;
    }

}

