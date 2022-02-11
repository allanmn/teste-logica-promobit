<?php
namespace App;

class ProductStructure
{
    const products = [
        "preto-PP",
        "preto-M",
        "preto-G",
        "preto-GG",
        "preto-GG",
        "branco-PP",
        "branco-G",
        "vermelho-M",
        "azul-XG",
        "azul-XG",
        "azul-XG",
        "azul-P"
    ];

    public function make(): array
    {
        $formated_products = [];

        foreach (ProductStructure::products as $product) {
            $product = explode('-', $product);
            if (count($formated_products) == 0) {
                $formated_products[$product[0]] = [$product[1] => 1];
            } else {
                if (array_key_exists($product[0], $formated_products)) {
                    foreach ($formated_products as $key => $formated_product) {
                        if ($key == $product[0]) {
                            if (array_key_exists($product[1], $formated_product)) {
                                $formated_product[$product[1]]++;
                            } else {
                                $formated_product[$product[1]] = 1;
                            }
                        }
            
                        $formated_products[$key] = $formated_product;
                    }
                } else {
                    $formated_products[$product[0]] = [$product[1] => 1];
                }
            }
        }
        
        return $formated_products;
    }
}