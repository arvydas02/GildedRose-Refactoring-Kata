<?php

namespace App;

use App\Products;

/**
 * Class GildedRose
 * @package App
 */
final class GildedRose {

    protected const PRODUCTS = [
        'Aged Brie' => Products\AgedBrieProduct::class,
        'Backstage passes to a TAFKAL80ETC concert' => Products\BackstagePassesProduct::class,
        'Sulfuras, Hand of Ragnaros' => Products\SulfurasProduct::class,
        'Conjured Mana Cake' => Products\ConjuredProduct::class,
    ];

    private $items;

    /**
     * GildedRose constructor.
     * @param $items
     */
    public function __construct($items)
    {
        $this->items = $items;
    }

    /**
     * Main fuction that initiate items updates
     */
    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $this->processItem($item);
        }
    }

    /**
     * Process Item
     * @param Item $item
     */
    protected function processItem(Item $item): void
    {
        if (!empty(self::PRODUCTS[$item->name])) {
            $class = self::PRODUCTS[$item->name];
        } else {
            $class = Products\CommonProduct::class;
        }

        $product = new $class($item);
        $product->update();
    }
}
