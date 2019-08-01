<?php

namespace App\Products;

/**
 * Class BackstagePassesProduct
 * @package App\Products
 */
class BackstagePassesProduct extends AbstractProduct
{
    /**
     *  Update Item quality and sell in values
     */
    public function update(): void
    {
        // Update quality
        if ($this->item->sell_in > 10) {
            $this->item->quality++;
        }

        if ($this->item->sell_in <= 10 && $this->item->sell_in > 5) {
            $this->item->quality += 2;
        }

        if ($this->item->sell_in <= 5 && $this->item->sell_in > 0) {
            $this->item->quality += 3;
        }

        // Update Sell in
        $this->updateSellIn();

        if ($this->item->sell_in < 0) {
            $this->item->quality = 0;
        }

        $this->checkAndUpdateQualityByRange();
    }
}
