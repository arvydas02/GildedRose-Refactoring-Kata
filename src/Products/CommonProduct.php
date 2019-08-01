<?php

namespace App\Products;

/**
 * Class CommonProduct
 * @package App\Products
 */
class CommonProduct extends AbstractProduct
{
    /**
     *  Update Item quality and sell in values
     */
    public function update(): void
    {
        // Update quality
        $this->item->quality--;

        // Update Sell in
        $this->updateSellIn();

        // Check if we need to decrease quality again
        if ($this->item->sell_in < 0) {
            $this->item->quality--;
        }

        $this->checkAndUpdateQualityByRange();
    }
}
