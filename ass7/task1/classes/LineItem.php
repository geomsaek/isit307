<?php

class LineItem{
    private $order_number;
    private $quantity;
    private $discount;
    private $stockedItem;


    public function init($row)
    {
        $this->order_number = $row['order_number'];
        $this->quantity = $row['quantity'];
        $this->discount = $row['discount'];
        $this->stockedItem = new StockedItem();
        $this->stockedItem->init($row);
    }

    public function getOrderNumber(){
        return $this->order_number;
    }

    public function setOrderNumber($order_number){
        $this->order_number = $order_number;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }

    public function getDiscount(){
        return $this->discount;
    }

    public function setDiscount($discount){
        $this->discount = $discount;
    }
	
	public function getStockedItem(){
        return $this->stockedItem;
    }

    public function setStockedItem($stockedItem){
        $this->stockedItem = $stockedItem;
    }



}