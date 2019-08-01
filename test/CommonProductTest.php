<?php


namespace App;

use App\Products\CommonProduct;
use PHPUnit\Framework\TestCase;

class CommonProductTest extends TestCase
{
    public function itemProvider()
    {
        return [
            'Item Sell In and Quality Values Reduced With Sell in day more than One' =>
                [
                    new Item('+5 Dexterity Vest', 10, 20),
                    [
                        'name' => '+5 Dexterity Vest',
                        'sellIn' => 9,
                        'quality' => 19,
                    ]
                ],
            'Item Sell In and Quality Values Reduced With Sell In Days Equal to zero' =>
                [
                    new Item('+5 Dexterity Vest', 0, 20),
                    [
                        'name' => '+5 Dexterity Vest',
                        'sellIn' => -1,
                        'quality' => 18,
                    ]
                ],
            'Item Sell In and Quality Values Reduced With Sell In Days Lower than zero' =>
                [
                    new Item('+5 Dexterity Vest', -1, 20),
                    [
                        'name' => '+5 Dexterity Vest',
                        'sellIn' => -2,
                        'quality' => 18,
                    ]
                ]
            ,
            'Item Sell In and Quality Values Reduced With Quality Max Value' =>
                [
                    new Item('Elixir of the Mongoose', 10, 50),
                    [
                        'name' => 'Elixir of the Mongoose',
                        'sellIn' => 9,
                        'quality' => 49,
                    ]
                ],
            'Item Sell In and Quality Values Reduced With Quality Over Max Value' =>
                [
                    new Item('Elixir of the Mongoose', 10, 100),
                    [
                        'name' => 'Elixir of the Mongoose',
                        'sellIn' => 9,
                        'quality' => 50,
                    ]
                ],
            'Item Sell In and Quality Values Reduced With Quality lower than zero' =>
                [
                    new Item('Elixir of the Mongoose', 10, -1),
                    [
                        'name' => 'Elixir of the Mongoose',
                        'sellIn' => 9,
                        'quality' => 0,
                    ]
                ],
            ];
    }

    /**
     * @dataProvider itemProvider
     */
    public function testCommonProduct($item, $results)
    {
        $product = new CommonProduct($item);
        $product->update();

        $this->assertEquals($item->name, $results['name']);
        $this->assertEquals($item->sell_in, $results['sellIn']);
        $this->assertEquals($item->quality, $results['quality']);
    }
}
