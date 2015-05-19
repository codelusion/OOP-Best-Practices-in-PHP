<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductLineItemSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(111, 200.00);
        $this->shouldHaveType('ProductLineItem');
    }

    function it_should_have_price()
    {
        $this->beConstructedWith(111, 200.00);
        $this->getPrice()->shouldReturn(200.00);
    }

    function it_should_reject_negative_price()
    {
        $this->shouldThrow('RuntimeException')->during('__construct',array(111, -200.00));
    }

    function it_should_reject_invalid_id()
    {
        $this->shouldThrow('RuntimeException')->during('__construct',array('this', 200.00));
    }

    function it_should_allow_setting_quantity()
    {
        $this->beConstructedWith(111, 200.00);
        $this->setQuantity(3);
        $this->getQuantity()->shouldReturn(3);
    }

    function it_should_reject_invalid_quantity()
    {
        $this->beConstructedWith(111, 200.00);
        $this->shouldThrow('RuntimeException')->during('setQuantity', array(-3));
    }
}
