<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CartSpec extends ObjectBehavior {
    function it_is_initializable() {
        $this->shouldHaveType('Cart');
    }

    function it_should_add_line_items() {
        $p = new \ProductLineItem(9000, 44.95);
        $this->addLineItem($p->setQuantity(3))->shouldReturn(1);
    }

    function it_should_allow_setting_discount() {
        $this->setDiscount(new \Discount(5.00))->getDiscount()->shouldReturn(5.00);
    }

    function it_should_calculate_total() {
        $p = new \ProductLineItem(9000, 44.95);
        $this->addLineItem($p->setQuantity(1));
        $this->setDiscount(new \Discount(5.00));
        $this->setTaxContext(new \StateTaxContext('MN'));
        $this->getTotal()->shouldReturn("42.75");
    }

}
