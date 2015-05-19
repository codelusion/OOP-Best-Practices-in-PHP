<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DiscountSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(5.00);
        $this->shouldHaveType('Discount');
    }

    function it_should_always_have_a_positive_value() {
        $this->beConstructedWith(-8.00);
        $this->getAmount(array())->shouldReturn(8.00);
    }

    function it_should_fail_when_no_items_provided() {
        $this->beConstructedWith(-8.00);
        $this->shouldThrow('RuntimeException')->during('getAmount', array(''));
    }

}
