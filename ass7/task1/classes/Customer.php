<?php
class Customer
{
    private $customer_number;
    private $name;
    private $street;
    private $city;
    private $state;
    private $zipcode;
    private $phone;

    public function init($row){
        $this->customer_number = $row['customer_number'];
        $this->name = $row['name'];
        $this->street = $row['street'];
        $this->city = $row['city'];
        $this->state = $row['state'];
        $this->zipcode = $row['zipcode'];
        $this->phone = $row['phone'];
    }

    public function getCustomerNumber(){
        return $this->customer_number;
    }

    public function setCustomerNumber($customer_number){
        $this->customer_number = $customer_number;
    }

    public function getName(){
        return $this->name;
    }
    
    public function setName($name){
        $this->name = $name;
    }

    public function getStreet(){
        return $this->street;
    }

    public function setStreet($street){
        $this->street = $street;
    }

    public function getCity(){
        return $this->city;
    }

    public function setCity($city){
        $this->city = $city;
    }

    public function getState(){
        return $this->state;
    }

    public function setState($state){
        $this->state = $state;
    }

    public function getZipcode(){
        return $this->zipcode;
    }

    public function setZipcode($zipcode){
        $this->zipcode = $zipcode;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function setPhone($phone){
        $this->phone = $phone;
    }


}