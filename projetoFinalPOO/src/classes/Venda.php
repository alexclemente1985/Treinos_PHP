<?php
require_once "classes/Cliente.php";

class Venda{
    private int $id;
    private float $value;
    private Cliente $customer;
    private DateTime $saleData;

    public function __construct(int $id, float $value, Cliente $customer)
    {
        $this->id = $id;
        $this->value = $value;
        $this->customer = $customer;
        $this->saleData = new DateTime();

    }

    public function getId(): int{
        return $this->id;
    }
    public function getSaleData(): DateTime{
        return $this->saleData;
    }
    public function getValue(): float{
        return $this->value;
    }
    public function getCustomer(): Cliente{
        return $this->customer;
    }

    public function setId(int $id){
        $this->id = $id;
    }
    public function setValue(float $value){
        $this->value = $value;
    }
    public function setCustomer(Cliente $customer){
        $this->customer = $customer;
    }
    public function setSaleData(DateTime $saleData){
        $this->$saleData = $saleData;
    }
}
?>