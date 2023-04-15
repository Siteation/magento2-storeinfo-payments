# Siteation - Magento 2 StorePaymentLogos

[![Packagist Version](https://img.shields.io/packagist/v/siteation/magento2-module-storeinfo-payment-logos?style=for-the-badge)](https://packagist.org/packages/siteation/magento2-module-storeinfo-payment-logos)
![Supported Magento Versions](https://img.shields.io/badge/magento-%202.3_|_2.4-brightgreen.svg?logo=magento&longCache=true&style=for-the-badge)
[![Hyvä Themes Supported](https://img.shields.io/badge/Hyva_Themes-Supported-3df0af.svg?longCache=true&style=for-the-badge)](https://hyva.io/)
![License](https://img.shields.io/github/license/Siteation/magento2-module-storeinfo-payment-logos?color=%23234&style=for-the-badge)

<!-- TODO: intro -->

## Installation

Install the package via;

```bash
composer require siteation/magento2-storepayment-logos
bin/magento module:enable Siteation_StorePaymentLogos
```

> This Module requires Magento 2.3 or higher!
> For more requirements see the `composer.json`.

## How to use

<!-- TODO: how to -->

### Generation svg sprite

<!-- TODO: how to -->

https://github.com/svg-sprite/svg-sprite/blob/main/docs/command-line.md

### Supported Payment options

<!-- TODO update filter -->
<!-- TODO create missing icons -->
<!-- TODO check payment codes for provider -->

| Options          | Mollie       | PayNL        | MultiSafePay | has icon |
| ---------------- | ------------ | ------------ | ------------ | -------- |
| afterpay/riverty |              | x            | x            | x        |
| alipay           |              | x            | x            |          |
| amazonpay        |              | x            | x            |          |
| american express | = Creditcard | = Creditcard | = Creditcard | -        |
| applepay         | x            | x            | x            | x        |
| bancontact       | x            | x            | x            | x        |
| banktransfer     | x            |              | x            | x        |
| belfius          | x            |              | x            | x        |
| biller           |              | x            | x            |          |
| creditcard       | x            |              | x            | x        |
| direct-debit     |              |              | x            |          |
| dotpay           |              |              | x            |          |
| eps              | x            | x            | x            | x        |
| giftcard         | x            | x            |              |          |
| cadeau           |              | = giftcard   |              |          |
| giropay          | x            | x            | x            | x        |
| googlepay        |              | x            | x            | x        |
| ideal            | x            | x            |              | x        |
| in3              | x            | x            | x            | x        |
| kbc/cbc          | x            |              | x            |          |
| klarna           | x            | x            |              | x        |
| maestro          | = Creditcard | = Creditcard | = Creditcard | x-       |
| mastercard       | = Creditcard | = Creditcard | = Creditcard | -        |
| mybank           | x            |              | x            |          |
| paypal           | x            | x            | x            | x        |
| paysafecard      | x            |              | x            |          |
| przelewy24       | x            | x            |              |          |
| visa             | = Creditcard | = Creditcard | = Creditcard | x-       |
| sepa             | x            |              |              | x        |
| sofort           | x            | x            |              | x        |
