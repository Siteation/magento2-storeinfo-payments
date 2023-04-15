# Siteation - Magento 2 StorePaymentLogos

[![Packagist Version](https://img.shields.io/packagist/v/siteation/magento2-module-storeinfo-payment-logos?style=for-the-badge)](https://packagist.org/packages/siteation/magento2-module-storeinfo-payment-logos)
![Supported Magento Versions](https://img.shields.io/badge/magento-%202.4-brightgreen.svg?logo=magento&longCache=true&style=for-the-badge)
[![Hyvä Themes Supported](https://img.shields.io/badge/Hyva_Themes-Supported-3df0af.svg?longCache=true&style=for-the-badge)](https://hyva.io/)
![License](https://img.shields.io/github/license/Siteation/magento2-module-storeinfo-payment-logos?color=%23234&style=for-the-badge)

The Siteation StorePaymentLogos module simplifies the process of displaying your configured payment methods on your online store.

All you need to do is enable your payment methods as you would for the checkout payment options.

This module will then display the same options as payment icons in your footer or anywhere else you choose.

## Installation

Install the package via;

```bash
composer require siteation/magento2-storepayment-logos
bin/magento module:enable Siteation_StorePaymentLogos
```

> This Module requires Magento 2.4 or higher!
> For more requirements see the `composer.json`.

## How to use

By default, this Magento module displays all enabled payment methods as icons in your theme's footer and requires no configuration.

If you want to exclude specific payment icons,
simply go to Stores → Configuration → Sales → Sales → Payment Icons.

If you'd like to display payment icons in other areas of your site,
you can use the convenient options offered by the viewModel from our Storeinfo Payment module.

This feature also provides additional functions for more flexibility in showing your configured payment methods to be displayed on your store.

## Generate your own svg sprite

To customize the payment icons, you can copy the sprite assets into your own theme or module.

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

|                  |   [Mollie]   |   [PayNL]    | [MultiSafePay] | Has icon |
| ---------------- | :----------: | :----------: | :------------: | :------: |
| afterpay/riverty |              |      x       |       x        |    x     |
| alipay           |              |      x       |       x        |          |
| amazonpay        |              |      x       |       x        |          |
| american express | = creditcard | = creditcard |  = creditcard  |    +     |
| applepay         |      x       |      x       |       x        |    x     |
| bancontact       |      x       |      x       |       x        |    x     |
| banktransfer     |      x       |              |       x        |    x     |
| belfius          |      x       |              |       x        |    x     |
| biller           |              |      x       |       x        |          |
| creditcard       |      x       |              |       x        |    x     |
| direct-debit     |              |              |       x        |          |
| dotpay           |              |              |       x        |          |
| eps              |      x       |      x       |       x        |    x     |
| giftcard         |      x       |      x       |                |          |
| cadeau           |              |  = giftcard  |                |          |
| giropay          |      x       |      x       |       x        |    x     |
| googlepay        |              |      x       |       x        |    x     |
| ideal            |      x       |      x       |                |    x     |
| in3              |      x       |      x       |       x        |    x     |
| kbc/cbc          |      x       |              |       x        |          |
| klarna           |      x       |      x       |                |    x     |
| maestro          | = creditcard | = creditcard |  = creditcard  |    +     |
| mastercard       | = creditcard | = creditcard |  = creditcard  |    +     |
| mybank           |      x       |              |       x        |          |
| paypal           |      x       |      x       |       x        |    x     |
| paysafecard      |      x       |              |       x        |          |
| przelewy24       |      x       |      x       |                |          |
| visa             | = creditcard | = creditcard |  = creditcard  |    +     |
| sepa             |      x       |              |                |    x     |
| sofort           |      x       |      x       |                |    x     |

_Icons with `+` are only avaible in our icon pack,_
_but are excludes from the sprite file,_
_since the payment icon is aliased to another method_

[Mollie]: https://github.com/mollie/magento2
[PayNL]: https://github.com/paynl/magento2-plugin
[MultiSafePay]: https://github.com/MultiSafepay/magento2
