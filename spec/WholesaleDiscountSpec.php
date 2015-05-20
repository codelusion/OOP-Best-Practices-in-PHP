<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WholesaleDiscountSpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith(100, 100);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType('WholesaleDiscount');
    }

    function it_should_give_discount_when_quantity_greater_than_minimum() {
        $this->beConstructedWith(100, 100);
        $this->getAmount(array(array('id' =>999, 'price' =>19.99, 'quantity'=>1000)))->shouldReturn(100);
    }

    function it_should_not_give_discount_when_quantity_less_than_minimum() {
        $this->beConstructedWith(100, 100);
        $this->getAmount(array(array('id' =>999, 'price' =>19.99, 'quantity'=>10)))->shouldReturn(0);
    }
}
