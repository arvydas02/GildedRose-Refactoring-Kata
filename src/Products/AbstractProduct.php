<?php

namespace App\Products;

use App\Item;

/**
 * Class AbstractProduct
 * @package App\Products
 */
abstract class AbstractProduct implements ProductInterface
{
    protected const QUALITY_MIN = 0;
    protected const QUALITY_MAX = 50;
    protected $item;

    /**
     * AbstractProduct constructor.
     * @param Item $item
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * Update Item quality and sell in values
     */
    abstract public function update(): void;

    /**
     * Make sure quality do not go out of range
     * @return void
     */
    protected function checkAndUpdateQualityByRange(): void
    {
        if ($this->item->quality > static::QUALITY_MAX) {
            $this->item->quality = static::QUALITY_MAX;
        }

        // The Quality of an item is never negative
        if ($this->item->quality < static::QUALITY_MIN) {
            $this->item->quality = static::QUALITY_MIN;
        }
    }

    /**
     * Make sure quality do not go out of range
     * @return void
     */
    protected function updateSellIn(): void
    {
        $this->item->sell_in--;
    }
}
