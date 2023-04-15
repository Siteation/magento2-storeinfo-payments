# Siteation - Magento 2 StorePaymentLogos

[![Packagist Version](https://img.shields.io/packagist/v/siteation/magento2-module-storeinfo-payment-logos?style=for-the-badge)](https://packagist.org/packages/siteation/magento2-module-storeinfo-payment-logos)
![Supported Magento Versions](https://img.shields.io/badge/magento-%202.4-brightgreen.svg?logo=magento&longCache=true&style=for-the-badge)
[![Hyvä Themes Supported](https://img.shields.io/badge/Hyva_Themes-Supported-3df0af.svg?longCache=true&style=for-the-badge)](https://hyva.io/)
![License](https://img.shields.io/github/license/Siteation/magento2-module-storeinfo-payment-logos?color=%23234&style=for-the-badge)

<!-- TODO: intro -->

## Installation

Install the package via;

```bash
composer require siteation/magento2-storepayment-logos
bin/magento module:enable Siteation_StorePaymentLogos
```

> This Module requires Magento 2.4 or higher!
> For more requirements see the `composer.json`.

## How to use

<!-- TODO: how to -->

## Customization options

### Generate your own svg sprite

We use the npm package [Svg sprite](sprite) using the [CLI options](sprite-cli).

If you want to create your own payment icons or just customize this version you need to copy the sprites in the assets to your own theme or module.

In your theme or module install with npm [Svg sprite](sprite)

[sprite]: https://www.npmjs.com/package/svg-sprite
[sprite-cli]: https://github.com/svg-sprite/svg-sprite/blob/main/docs/command-line.md

### Supported Payment options

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
