<?php

class Order
{
    private $order_number;
    private $customer_number;
    private $to_street;
    private $to_city;
    private $to_state;
    private $to_zip_code;
    private $order_date;
    private $ship_date;

    public function init($row){
        $this->order_number = $row["order_number"];
        $this->to_street = $row["to_street"];
        $this->customer_number = $row["customer_number"];
        $this->to_state = $row["to_state"];
        $this->to_city = $row["to_city"];
        $this->to_zip_code = $row["to_zip_code"];
        $this->order_number = $row["order_number"];
        $this->order_date = $row["order_date"];
        $this->ship_date = $row["ship_date"];
    }

    public function getOrderNumber(){
        return $this->order_number;
    }

    public function setOrderNumber($order_number){
        $this->order_number = $order_number;
    }

    public function getCustomerNumber(){
        return $this->customer_number;
    }

    public function setCustomerNumber($customer_number){
        $this->customer_number = $customer_number;
    }

    public function getToStreet(){
        return $this->to_street;
    }

    public function setToStreet($to_street){
        $this->to_street = $to_street;
    }

    public function getToCity(){
        return $this->to_city;
    }

    public function setToCity($to_city){
        $this->to_city = $to_city;
    }

    public function getToState(){
        return $this->to_state;
    }

    public function setToState($to_state){
        $this->to_state = $to_state;
    }

    public function getToZipCode(){
        return $this->to_zip_code;
    }

    public function setToZipCode($to_zip_code){
        $this->to_zip_code = $to_zip_code;
    }

    public function getOrderDate(){
        return $this->order_date;
    }


    public function setOrderDate($order_date){
        $this->order_date = $order_date;
    }

    public function getShipDate(){
        return $this->ship_date;
    }

    public function setShipDate($ship_date){
        $this->ship_date = $ship_date;
    }


}

