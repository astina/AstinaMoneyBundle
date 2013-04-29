<?php

namespace Astina\Bundle\MoneyBundle\Converter;

use Astina\Bundle\MoneyBundle\Entity\CurrencyExchangeRate;
use Doctrine\Common\Persistence\ObjectRepository;
use Money\Currency;
use Money\Money;

class MoneyConverter
{
    /**
     * @var ObjectRepository
     */
    private $repo;

    function __construct(ObjectRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param Money $base
     * @param Currency $targetCurrency
     * @return Money
     * @throws \Exception
     */
    public function convert(Money $base, Currency $targetCurrency)
    {
        $exchangeRate = $this->findExchangeRate($base->currency(), $targetCurrency);
        if (null == $exchangeRate) {
            throw new \Exception(sprintf("Unknown exchange rate: %s => %s", $base->currency(), $targetCurrency));
        }

        $amount = $base->cents() / $exchangeRate->getRate();

        return new Money($amount, $targetCurrency);
    }

    /**
     * @param $baseCurrency
     * @param $targetCurrency
     * @return CurrencyExchangeRate
     */
    private function findExchangeRate($baseCurrency, $targetCurrency)
    {
        return $this->repo->findOneBy(array('base' => $baseCurrency, 'target' => $targetCurrency));
    }
}
