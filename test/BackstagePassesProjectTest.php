<?php


namespace App;

use App\Products\BackstagePassesProduct;
use PHPUnit\Framework\TestCase;

class BackstagePassesProjectTest extends TestCase
{
    public function itemProvider()
    {
        return [
            'Item Backstage passes Sell In Value Reduce and Quality Value Increase' =>
                [
                    new Item('Backstage passes to a TAFKAL80ETC concert', 20, 0),
                    [
                        'name' => 'Backstage passes to a TAFKAL80ETC concert',
                        'sellIn' => 19,
                        'quality' => 1,
                    ]
                ],
            'Item Backstage passes Sell In Value Reduce and Quality Value Increase by 2 With Sell In days lower than 10 days' =>
                [
                    new Item('Backstage passes to a TAFKAL80ETC concert', 9, 0),
                    [
                        'name' => 'Backstage passes to a TAFKAL80ETC concert',
                        'sellIn' => 8,
                        'quality' => 2,
                    ]
                ],
            'Item Backstage passes Sell In Value Reduce and Quality Value Increase by 3 With Sell In days Lower than 5' =>
                [
                    new Item('Backstage passes to a TAFKAL80ETC concert', 2, 0),
                    [
                        'name' => 'Backstage passes to a TAFKAL80ETC concert',
                        'sellIn' => 1,
                        'quality' => 3,
                    ]
                ],
            'Item Backstage passes Sell In Value Reduce and Quality Value Equal to zero With Sell In days Equal to zero' =>
                [
                    new Item('Backstage passes to a TAFKAL80ETC concert', 0, 50),
                    [
                        'name' => 'Backstage passes to a TAFKAL80ETC concert',
                        'sellIn' => -1,
                        'quality' => 0,
                    ]
                ],
            'Item Backstage passes Sell In Value Reduce and Quality Value Equal to zero With Quality lower than zero' =>
                [
                    new Item('Backstage passes to a TAFKAL80ETC concert', 10, -5),
                    [
                        'name' => 'Backstage passes to a TAFKAL80ETC concert',
                        'sellIn' => 9,
                        'quality' => 0,
                    ]
                ],
            'Item Backstage passes Sell In Value Reduce and Quality Value Equal to zero With Quality More than max' =>
                [
                    new Item('Backstage passes to a TAFKAL80ETC concert', 10, 100),
                    [
                        'name' => 'Backstage passes to a TAFKAL80ETC concert',
                        'sellIn' => 9,
                        'quality' => 50,
                    ]
                ],
        ];
    }

    /**
     * @dataProvider itemProvider
     */
    public function testBackstagePassesProduct($item, $results)
    {
        $product = new BackstagePassesProduct($item);
        $product->update();

        $this->assertEquals($item->name, $results['name']);
        $this->assertEquals($item->sell_in, $results['sellIn']);
        $this->assertEquals($item->quality, $results['quality']);
    }
}
