<?php
class Produto{
    private int $id;
    private string $description;
    private float $price;
    private string $image;

    public function __construct(int $id = 0, string $description = '', float $price = 0.00, string $image = '')
    {
        $this->id = $id;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;

    }

    public function getId(): int{
        return $this->id;
    }
    public function getDescription(): string{
        return $this->description;
    }
    public function getPrice(): string{
        return $this->price;#number_format($this->price,2,',','.');
    }
    public function getImage(): string{
        return $this->image;
    }

    public function setId(int $id){
        $this->id = $id;
    }
    public function setDescription(string $description){
        $this->$description = $description;
    }
    public function setPrice(int $price){
        $this->price = $price;
    }
    public function setImage(string $image){
        $this->image = $image;
    }

    #Alimentação dos dados enquanto não se tem banco de dados definido
    public function generateData(){
        return $produtos = [
            new Produto(1,"Notebook",1890.78,"lib/img/notebook.png"),
            new Produto(2,"Teclado",189.78,"lib/img/teclado.jpg"),
            new Produto(3,"Tablet",890.99,"lib/img/tablet.jpg"),
            new Produto(4,"Oculos",1500.00,"lib/img/oculos.png"),
            new Produto(5,"Phone",1890.78,"lib/img/fone.png")
        ];
    }

    public function getAllProducts(){
        return $this->generateData();
    }

    public function getProductByID(int $id){
        $produtos = $this->generateData();

        foreach($produtos as $prod){
            if($id == $prod->getId()){
                return $prod;
            }
        }

        return null;
    }



}
?>