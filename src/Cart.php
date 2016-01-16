<?php

include_once('Discount.php');
include_once('WholesaleDiscount.php');
include_once('StateTaxContext.php');
include_once('ProductLineItem.php');

class Cart {
    protected $lineItems = array();
    protected $discount = 0;
    protected $total = 0.0;
    protected $taxContext;

    /**
     * Cart constructor.
     * with explicit dependencies
     * @param ITaxContext $taxContext
     */
    public function __construct(ITaxContext $taxContext) {
        $this->taxContext = $taxContext;
    }

    public function addLineItem(ISaleable $item) {
        $this->lineItems[] = array(
            'id' => $item->getId(),
            'price' => $item->getPrice(),
            'quantity' => $item->getQuantity());
        return count($this->lineItems);
    }

    public function getTotal() {
        $this->total = 0;
        $this->calculateItemTotal();
        $this->applyDiscounts();
        $this->applyTax();

        return number_format($this->total, 2);
    }

    //Type hinting using interfaces prevents
    //unexpected runtime behavior
    public function setTaxContext(ITaxContext $taxContext) {
        $this->taxContext = $taxContext;
        return $this;
    }

    public function setDiscount(Discount $discount) {
        $this->discount = $discount->getAmount($this->lineItems);
        return $this;
    }

    public function getDiscount() {
        return $this->discount;
    }

    public function getLineItemCount() {
        return count($this->lineItems);
    }

    protected function calculateItemTotal() {
        foreach ($this->lineItems as $item) {
            $this->total += ($item['price'] * $item['quantity']);
        }

    }

    protected function applyDiscounts() {
        $this->total -= $this->discount;
    }

    protected function applyTax() {
        $this->total += $this->taxContext->getTax($this->total);
    }

}
