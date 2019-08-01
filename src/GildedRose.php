<?php

namespace App;

final class GildedRose {

    protected const QUALITY_MAX = 50;

    private $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            if ($item->name !== 'Aged Brie' && $item->name !== 'Backstage passes to a TAFKAL80ETC concert') {
                if ($item->quality > 0) {
                    if ($item->name !== 'Sulfuras, Hand of Ragnaros') {
                        $item->quality--;
                    } else {
                        $item->quality = 80;
                    }
                }
            } else if ($item->quality < self::QUALITY_MAX) {
                $item->quality++;
                if ($item->name === 'Backstage passes to a TAFKAL80ETC concert'
                    && $item->sell_in < 11
                    && $item->quality < self::QUALITY_MAX) {
                    $item->quality++;

                    if ($item->sell_in < 6 && $item->quality < self::QUALITY_MAX) {
                        $item->quality++;
                    }
                }
            }

            if ($item->name !== 'Sulfuras, Hand of Ragnaros') {
                $item->sell_in--;
            }
            
            if ($item->sell_in < 0) {
                if ($item->name !== 'Aged Brie') {
                    if ($item->name !== 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->quality > 0 && $item->name !== 'Sulfuras, Hand of Ragnaros') {
                            $item->quality--;
                        }
                    } else {
                        // Should be 0 because "The Quality of an item is never negative"
                        $item->quality = 0;
                    }
                } else if ($item->quality < self::QUALITY_MAX) {
                    $item->quality++;
                }
            }
        }
    }
}

