<?php

interface ISaleable {
    public function getPrice();
    public function getQuantity();
    public function getId();
}