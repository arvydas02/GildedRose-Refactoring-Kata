<?php


namespace App;

use App\Products\AgedBrieProduct;
use PHPUnit\Framework\TestCase;

class AgedBrieProjectTest extends TestCase
{
    public function itemProvider()
    {
        return [
            'Item Aged Brie Sell In Value Reduce and Quality Value Increase' =>
                [
                    new Item('Aged Brie', 2, 0),
                    [
                        'name' => 'Aged Brie',
                        'sellIn' => 1,
                        'quality' => 1,
                    ]
                ],
            'Item Aged Brie Sell In Value Reduce and Quality Value Increase With Sell In days Equal to zero' =>
                [
                    new Item('Aged Brie', 0, 10),
                    [
                        'name' => 'Aged Brie',
                        'sellIn' => -1,
                        'quality' => 12,
                    ]
                ],
            'Item Aged Brie Sell In Value Reduce and Quality Value Increase With Sell In days Lower than zero' =>
                [
                    new Item('Aged Brie', -1, 10),
                    [
                        'name' => 'Aged Brie',
                        'sellIn' => -2,
                        'quality' => 12,
                    ]
                ],
            'Item Aged Brie Sell In Value Reduce and Quality Value Increase With Quality Equal to zero' =>
                [
                    new Item('Aged Brie', -1, 0),
                    [
                        'name' => 'Aged Brie',
                        'sellIn' => -2,
                        'quality' => 2,
                    ]
                ],
            'Item Aged Brie Sell In Value Reduce and Quality Value Increase With Quality Max Value' =>
                [
                    new Item('Aged Brie', -1, 50),
                    [
                        'name' => 'Aged Brie',
                        'sellIn' => -2,
                        'quality' => 50,
                    ]
                ],
            'Item Aged Brie Sell In Value Reduce and Quality Value Increase With Quality and Sell In lower than zero' =>
                [
                    new Item('Aged Brie', -1, -1),
                    [
                        'name' => 'Aged Brie',
                        'sellIn' => -2,
                        'quality' => 1,
                    ]
                ],
            'Item Aged Brie Sell In Value Reduce and Quality Value Increase With Quality lower than zero' =>
                [
                    new Item('Aged Brie', 10, -5),
                    [
                        'name' => 'Aged Brie',
                        'sellIn' => 9,
                        'quality' => 0,
                    ]
                ],
            'Item Aged Brie Sell In Value Reduce and Quality Value Increase With Quality Over Max Value' =>
                [
                    new Item('Aged Brie', 5, 100),
                    [
                        'name' => 'Aged Brie',
                        'sellIn' => 4,
                        'quality' => 50,
                    ]
                ],
            ];
    }

    /**
     * @dataProvider itemProvider
     */
    public function testAgedBrieProduct($item, $results)
    {
        $product = new AgedBrieProduct($item);
        $product->update();

        $this->assertEquals($item->name, $results['name']);
        $this->assertEquals($item->sell_in, $results['sellIn']);
        $this->assertEquals($item->quality, $results['quality']);
    }
}
