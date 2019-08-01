<?php

namespace App\Products;

/**
 * Class AgedBrieProduct
 * @package App\Products
 */
class AgedBrieProduct extends AbstractProduct
{
    /**
     *  Update Item quality and sell in values
     */
    public function update(): void
    {
        // Update quality
        $this->item->quality++;

        $this->checkAndUpdateQualityByRange();

        // Update Sell in
        $this->updateSellIn();

        if ($this->item->sell_in < 0) {
            $this->item->quality++;
        }
    }
}
