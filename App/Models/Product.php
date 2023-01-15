<?php

namespace ProductFeeder\App\Models;

class Product
{
    private int $id;
    private string $name;
    private float $price;
    private string $category;

    public function __construct($product)
    {
        $this->setId($product['id']);
        $this->setName($product['name']);
        $this->setPrice($product['price']);
        $this->setCategory($product['category']);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = intval($id);
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = number_format($price, 2);
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }

}