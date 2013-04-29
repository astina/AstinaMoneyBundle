Astina Money Bundle
===================

Symfony bundle for 99designs/money-php.

Adds exchange rate entity and a service for conversion.

## Installation

### Step 1: Add to composer.json

```json
"require":  {
    "astina/money-bundle":"dev-master",
}
```

### Step 2: Enable the bundle

Enable the bundle in the kernel:

```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Astina\Bundle\MoneyBundle\AstinaMoneyBundle(),
    );
}
```

##Usage

**Note***: CurrencyExchangeRate entities need to be created for the exchanges you need.

```php
$moneyChf = new Money\Money(190, 'CHF');

$moneyConverter = $container->get('astina_money.money_converter');
$moneyEur = $moneyConverter->convert($money, 'EUR');
```