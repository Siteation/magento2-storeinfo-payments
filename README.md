# Siteation - Magento 2 StoreInfo Payments

[![Packagist Version](https://img.shields.io/packagist/v/siteation/magento2-agento2-storeinfo-payments?style=for-the-badge)](https://packagist.org/packages/siteation/magento2-agento2-storeinfo-payments)
![Supported Magento Versions](https://raw.githubusercontent.com/Siteation/.github/main/assets/badges/magento-2.4-support.png)
[![Hyvä Themes Module](https://raw.githubusercontent.com/Siteation/.github/main/assets/badges/hyva-module.png)](https://hyva.io/)
[![License](https://raw.githubusercontent.com/Siteation/.github/main/assets/badges/license.png)](https://github.com/Siteation/magento2-storeinfo-payments/blob/main/LICENSE)

The Siteation StoreInfo Payments module simplifies the process of displaying your configured payment methods on your store.

All you need to do is enable your payment methods as you would for the checkout payment options.

This module will then display the same options as payment methods in your footer or anywhere else you choose.

## Installation

Install the package via;

```bash
composer require siteation/magento2-storeinfo-payments
bin/magento module:enable Siteation_StoreInfoPayments
bin/magento setup:upgrade
```

## How to use

By default, this Magento module displays all enabled payment methods as icons in your theme's footer and requires no configuration.

If you want to exclude specific payment methods,
simply go to Stores → Configuration → Sales → Sales → Payment methods.

If you'd like to display payment methods in other areas of your site,
you can use the convenient options offered by the viewModel from our Storeinfo Payment module.

This feature also provides additional functions for more flexibility in showing your configured payment methods to be displayed on your store.

## Supported Payment options

|                  |   [Mollie]   |   [PayNL]    | [MultiSafePay] |
| ---------------- | :----------: | :----------: | :------------: |
| afterpay/riverty |              |      x       |       x        |
| alipay           |              |      x       |       x        |
| amazonpay        |              |      x       |       x        |
| american express | = creditcard | = creditcard |  = creditcard  |
| applepay         |      x       |      x       |       x        |
| bancontact       |      x       |      x       |       x        |
| banktransfer     |      x       |              |       x        |
| belfius          |      x       |              |       x        |
| biller           |              |      x       |       x        |
| creditcard       |      x       |              |       x        |
| direct-debit     |              |              |       x        |
| eps              |      x       |      x       |       x        |
| giftcard         |      x       |      x       |                |
| giropay          |      x       |      x       |       x        |
| googlepay        |              |      x       |       x        |
| ideal            |      x       |      x       |                |
| in3              |      x       |      x       |       x        |
| kbc/cbc          |      x       |              |       x        |
| klarna           |      x       |      x       |                |
| maestro          | = creditcard | = creditcard |  = creditcard  |
| mastercard       | = creditcard | = creditcard |  = creditcard  |
| mybank           |      x       |              |       x        |
| paypal           |      x       |      x       |       x        |
| paysafecard      |      x       |              |       x        |
| przelewy24       |      x       |      x       |                |
| visa             | = creditcard | = creditcard |  = creditcard  |
| sepa             |      x       |              |                |
| sofort           |      x       |      x       |                |

> **Info**: Any payment option with `cadeau` in its name will also show the giftcard method

[Mollie]: https://github.com/mollie/magento2
[PayNL]: https://github.com/paynl/magento2-plugin
[MultiSafePay]: https://github.com/MultiSafepay/magento2
