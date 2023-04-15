# Siteation - Magento 2 StoreInfo Payment Logos

[![Packagist Version](https://img.shields.io/packagist/v/siteation/magento2-agento2-storeinfo-payment-logos?style=for-the-badge)](https://packagist.org/packages/siteation/magento2-agento2-storeinfo-payment-logos)
![Supported Magento Versions](https://img.shields.io/badge/magento-%202.4-brightgreen.svg?logo=magento&longCache=true&style=for-the-badge)
[![Hyvä Themes Module](https://img.shields.io/badge/Hyva_Themes-Module-3df0af.svg?longCache=true&style=for-the-badge)](https://hyva.io/)
[![License](https://img.shields.io/packagist/l/siteation/magento2-share.png?style=for-the-badge&color=%23234)](./LICENSE)

The Siteation StoreInfo Payment Logos module simplifies the process of displaying your configured payment methods on your store.

All you need to do is enable your payment methods as you would for the checkout payment options.

This module will then display the same options as payment logo in your footer or anywhere else you choose.

## Installation

Install the package via;

```bash
composer require siteation/magento2-storeinfo-payment-logos
bin/magento module:enable Siteation_StoreInfoPaymentLogos
bin/magento setup:upgrade
```

## How to use

By default, this Magento module displays all enabled payment methods as logos in your theme's footer and requires no configuration.

If you want to exclude specific payment logos,
simply go to Stores → Configuration → Sales → Sales → Payment logos.

If you'd like to display payment logos in other areas of your site,
you can use the convenient options offered by the viewModel from our Storeinfo Payment module.

This feature also provides additional functions for more flexibility in showing your configured payment methods to be displayed on your store.

## Generate your own svg sprite

To customize the payment logos, you can copy the sprite assets into your own theme or module.

After that, you can install the [Svg sprite] package using npm in your theme or module to manage and generate the sprite.

To do this, follow the steps below:

1. Copy the sprite assets from the original source to your own theme or module.
2. Navigate to your theme or module's root directory and install the [Svg sprite] package using the following command:

```bash
npm install svg-sprite
```

3. After installation, you can use the [Svg sprite CLI](https://github.com/svg-sprite/svg-sprite/blob/main/docs/command-line.md) options to generate the sprite in your desired format. Refer to the package documentation for more details on the available CLI options.
4. Once the sprite is generated, you can use it in your application or website as needed.

[Svg sprite]: https://www.npmjs.com/package/svg-sprite

## Supported Payment options

<!-- TODO update filter -->
<!-- TODO create missing icons -->
<!-- TODO check payment codes for provider -->

|                  |   [Mollie]   |   [PayNL]    | [MultiSafePay] | Has logos |
| ---------------- | :----------: | :----------: | :------------: | :-------: |
| afterpay/riverty |              |      x       |       x        |     x     |
| alipay           |              |      x       |       x        |           |
| amazonpay        |              |      x       |       x        |           |
| american express | = creditcard | = creditcard |  = creditcard  |     +     |
| applepay         |      x       |      x       |       x        |     x     |
| bancontact       |      x       |      x       |       x        |     x     |
| banktransfer     |      x       |              |       x        |     x     |
| belfius          |      x       |              |       x        |     x     |
| biller           |              |      x       |       x        |           |
| creditcard       |      x       |              |       x        |     x     |
| direct-debit     |              |              |       x        |           |
| dotpay           |              |              |       x        |           |
| eps              |      x       |      x       |       x        |     x     |
| giftcard         |      x       |      x       |                |           |
| giropay          |      x       |      x       |       x        |     x     |
| googlepay        |              |      x       |       x        |     x     |
| ideal            |      x       |      x       |                |     x     |
| in3              |      x       |      x       |       x        |     x     |
| kbc/cbc          |      x       |              |       x        |           |
| klarna           |      x       |      x       |                |     x     |
| maestro          | = creditcard | = creditcard |  = creditcard  |     +     |
| mastercard       | = creditcard | = creditcard |  = creditcard  |     +     |
| mybank           |      x       |              |       x        |           |
| paypal           |      x       |      x       |       x        |     x     |
| paysafecard      |      x       |              |       x        |           |
| przelewy24       |      x       |      x       |                |           |
| visa             | = creditcard | = creditcard |  = creditcard  |     +     |
| sepa             |      x       |              |                |     x     |
| sofort           |      x       |      x       |                |     x     |

> **Info**: Any gift option with `cadeau` in the name will also show the giftcard logo

> **Info**: logos with `+` are only avaible in our icon pack,
> but are excludes from the sprite file,
> since the payment logos is aliased to another method

[Mollie]: https://github.com/mollie/magento2
[PayNL]: https://github.com/paynl/magento2-plugin
[MultiSafePay]: https://github.com/MultiSafepay/magento2
