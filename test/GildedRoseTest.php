<?php

namespace App;

use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase {

    public function itemProvider()
    {
        return [
            // Common Item tests
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
            // Specified Item Tests - Aged Brie
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
            // Specified Item Tests - Sulfuras, Hand of Ragnaros
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
            // Specified Item Tests - Backstage passes to a TAFKAL80ETC concert
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
        ];
    }

    /**
     * @dataProvider itemProvider
     */
    public function testItemValues($item, $results)
    {
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateQuality();
        $this->assertEquals($item->name, $results['name']);
        $this->assertEquals($item->sell_in, $results['sellIn']);
        $this->assertEquals($item->quality, $results['quality']);
    }

}
