<?php



class Flower implements JsonSerializable
{
    public $id;
    public $name;
    public $price;

    public function get_price()
    {
        return '$' . $this->price;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price

        ];
    }
}
