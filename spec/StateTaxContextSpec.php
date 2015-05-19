<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StateTaxContextSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('MN');
        $this->shouldHaveType('StateTaxContext');
    }

    function it_should_reject_invalid_state_abbreviations()
    {
        $this->shouldThrow('RuntimeException')->during('__construct', array('XY'));
    }

    function it_should_provide_positive_tax_amount()
    {
        $this->beConstructedWith('MN');
        $this->getTax(0)->shouldReturn(.07);
    }
}
