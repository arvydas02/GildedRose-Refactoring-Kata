<?php


namespace App;

use App\Products\SulfurasProduct;
use PHPUnit\Framework\TestCase;

class SulfurasProductTest extends TestCase
{
    public function itemProvider()
    {
        return [
            'Item Sulfuras Sell In Value Do not Change and Quality Value always 80' =>
                [
                    new Item('Sulfuras, Hand of Ragnaros', 2, 20),
                    [
                        'name' => 'Sulfuras, Hand of Ragnaros',
                        'sellIn' => 2,
                        'quality' => 80,
                    ]
                ],
            'Item Sulfuras Sell In Value Do not Change and Quality Value always 80 With Sell In days Equal to zero' =>
                [
                    new Item('Sulfuras, Hand of Ragnaros', 0, 1),
                    [
                        'name' => 'Sulfuras, Hand of Ragnaros',
                        'sellIn' => 0,
                        'quality' => 80,
                    ]
                ],
            'Item Sulfuras Sell In Value Do not Change and Quality Value always 80 With Sell In days Lower than zero' =>
                [
                    new Item('Sulfuras, Hand of Ragnaros', -1, 100),
                    [
                        'name' => 'Sulfuras, Hand of Ragnaros',
                        'sellIn' => -1,
                        'quality' => 80,
                    ]
                ],
            'Item Sulfuras Sell In Value Do not Change and Quality Value always 80 With Quality days Lower than zero' =>
                [
                    new Item('Sulfuras, Hand of Ragnaros', 10, -10),
                    [
                        'name' => 'Sulfuras, Hand of Ragnaros',
                        'sellIn' => 10,
                        'quality' => 80,
                    ]
                ],
            ];
    }

    /**
     * @dataProvider itemProvider
     */
    public function testSulfurasProduct($item, $results)
    {
        $product = new SulfurasProduct($item);
        $product->update();

        $this->assertEquals($item->name, $results['name']);
        $this->assertEquals($item->sell_in, $results['sellIn']);
        $this->assertEquals($item->quality, $results['quality']);
    }
}
