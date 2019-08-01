<?php


namespace App\Products;

/**
 * Class ConjuredProduct
 * @package App\Products
 */
class ConjuredProduct extends AbstractProduct
{
    /**
     *  Update Item quality and sell in values
     */
    public function update(): void
    {
        // Update quality
        $this->item->quality -= 2;

        // Update Sell in
        $this->updateSellIn();

        if ($this->item->sell_in < 0) {
            $this->item->quality -= 2;
        }

        $this->checkAndUpdateQualityByRange();
    }
}