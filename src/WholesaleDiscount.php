<?php

class WholesaleDiscount extends Discount {
    protected $minQuantity;

    function __construct($discountAmt, $minQuantity) {
        if ($minQuantity > 1 && $discountAmt > 0) {
            $this->amount = $discountAmt;
            $this->minQuantity = $minQuantity;
        }

    }

    public function getAmount($items) {
        $discountAmount = 0;
        if (is_array($items) && !empty($items)) {
            foreach ($items as $item) {
                if (!empty($item['quantity']) && $item['quantity'] > $this->minQuantity) {
                    return $this->amount;
                }
            }

        }

        return $discountAmount;

    }
}
