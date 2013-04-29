<?php

namespace Astina\Bundle\MoneyBundle\Entity;

class CurrencyExchangeRate
{
    private $id;

    private $base;

    private $target;

    private $rate;

    public function getId()
    {
        return $this->id;
    }

    public function setBase($base)
    {
        $this->base = $base;
    }

    public function getBase()
    {
        return $this->base;
    }

    public function setTarget($target)
    {
        $this->target = $target;
    }

    public function getTarget()
    {
        return $this->target;
    }

    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    public function getRate()
    {
        return $this->rate;
    }
}
