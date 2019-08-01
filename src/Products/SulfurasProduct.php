<?php


namespace App\Products;

/**
 * Class SulfurasProduct
 * @package App\Products
 */
class SulfurasProduct extends AbstractProduct
{
    protected const QUALITY_MAX = 80;

    /**
     *  Update Item quality and sell in values
     */
    public function update(): void
    {
        // Update quality
        $this->item->quality = self::QUALITY_MAX;
    }
}
