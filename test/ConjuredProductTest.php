<?php


namespace App;


use App\Products\ConjuredProduct;
use PHPUnit\Framework\TestCase;

class ConjuredProductTest extends TestCase
{
    public function itemProvider()
    {
        return [
            'Item Sell In and Quality Values Reduced With Sell in day more than One' =>
                [
                    new Item('Conjured Mana Cake', 10, 20),
                    [
                        'name' => 'Conjured Mana Cake',
                        'sellIn' => 9,
                        'quality' => 18,
                    ]
                ],
            'Item Sell In and Quality Values Reduced With Sell In Days Equal to zero' =>
                [
                    new Item('Conjured Mana Cake', 0, 20),
                    [
                        'name' => 'Conjured Mana Cake',
                        'sellIn' => -1,
                        'quality' => 16,
                    ]
                ],
            'Item Sell In and Quality Values Reduced With Sell In Days Lower than zero' =>
                [
                    new Item('Conjured Mana Cake', -1, 20),
                    [
                        'name' => 'Conjured Mana Cake',
                        'sellIn' => -2,
                        'quality' => 16,
                    ]
                ],
            'Item Sell In and Quality Values Reduced With Quality Max Value' =>
                [
                    new Item('Conjured Mana Cake', 10, 50),
                    [
                        'name' => 'Conjured Mana Cake',
                        'sellIn' => 9,
                        'quality' => 48,
                    ]
                ],
            'Item Sell In and Quality Values Reduced With Quality Over Max Value' =>
                [
                    new Item('Conjured Mana Cake', 10, 100),
                    [
                        'name' => 'Conjured Mana Cake',
                        'sellIn' => 9,
                        'quality' => 50,
                    ]
                ],
            'Item Sell In and Quality Values Reduced With Quality lower than zero' =>
                [
                    new Item('Conjured Mana Cake', 10, -5),
                    [
                        'name' => 'Conjured Mana Cake',
                        'sellIn' => 9,
                        'quality' => 0,
                    ]
                ],
        ];
    }

    /**
     * @dataProvider itemProvider
     */
    public function testConjuredProduct($item, $results)
    {
        $product = new ConjuredProduct($item);
        $product->update();

        $this->assertEquals($item->name, $results['name']);
        $this->assertEquals($item->sell_in, $results['sellIn']);
        $this->assertEquals($item->quality, $results['quality']);
    }
}
