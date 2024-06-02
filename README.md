# Siteation - Magento 2 StoreInfo Payments

[![Packagist Version](https://img.shields.io/packagist/v/siteation/magento2-storeinfo-payments?style=for-the-badge)](https://packagist.org/packages/siteation/magento2-storeinfo-payments)
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
simply go to Stores → Configuration → Siteation → Payment methods.

If you'd like to display payment methods in other areas of your site,
you can use the convenient options offered by the viewModel from our Storeinfo Payment module.

This feature also provides additional functions for more flexibility in showing your configured payment methods to be displayed on your store.

### CreditCard method unbundling

By default Siteation StoreInfo Payments module will bundle all CreditCard methods.

You can disable this feature trough the admin option found in Stores → Configuration → Siteation → Payment methods.

## Supported Payment options as Icon

> [!NOTE]
> While we haven't specifically tested Siteation Magento 2 StoreInfo Payments with every payment module,
> it should still work with many of them.
>
> This list only reflects the modules we've confirmed compatibility with so far.

|                    | [Mollie] | [PayNL] | [MultiSafePay] | [Buckaroo] |
| ------------------ | :------: | :-----: | :------------: | :--------: |
| afterpay/riverty   |          |   ✅    |       ✅       |     ✅     |
| alipay             |          |   ✅    |       ✅       |     ✅     |
| amazonpay          |          |   ✅    |       ✅       |            |
| american express   |   _#1_   |  _#1_   |      _#1_      |    _#2_    |
| applepay           |    ✅    |   ✅    |       ✅       |     ✅     |
| bancontact         |    ✅    |   ✅    |       ✅       |     ✅     |
| banktransfer       |    ✅    |         |       ✅       |     ✅     |
| belfius            |    ✅    |         |       ✅       |     ✅     |
| biller             |          |   ✅    |       ✅       |            |
| creditcard         |    ✅    |         |       ✅       |     ✅     |
| direct-debit       |          |         |       ✅       |            |
| eps                |    ✅    |   ✅    |       ✅       |     ✅     |
| giftcard           |    ✅    |   ✅    |                |     ✅     |
| giropay            |    ✅    |   ✅    |       ✅       |     ✅     |
| googlepay          |          |   ✅    |       ✅       |            |
| ideal              |    ✅    |   ✅    |                |     ✅     |
| in3                |    ✅    |   ✅    |       ✅       |     ✅     |
| kbc/cbc            |    ✅    |         |       ✅       |     ✅     |
| klarna             |    ✅    |   ✅    |                |            |
| maestro            |   _#1_   |  _#1_   |      _#1_      |    _#2_    |
| mastercard         |   _#1_   |  _#1_   |      _#1_      |    _#2_    |
| mbway / multibanco |          |   ✅    |       ✅       |     ✅     |
| mybank             |    ✅    |         |       ✅       |            |
| payconiq           |          |   ✅    |                |     ✅     |
| paypal             |    ✅    |   ✅    |       ✅       |     ✅     |
| paysafecard        |    ✅    |         |       ✅       |            |
| przelewy24         |    ✅    |   ✅    |                |     ✅     |
| sepa               |    ✅    |         |                |     ✅     |
| sofort             |    ✅    |   ✅    |                |     ✅     |
| trustly            |    ✅    |   ✅    |       ✅       |            |
| visa               |   _#1_   |  _#1_   |      _#1_      |    _#2_    |
| wechatpay          |          |   ✅    |       ✅       |     ✅     |

> _#1_ Available as option but always shown as one creditcard icon, by default

> _#2_ Only available trough the creditcard options, not directly

> **Info**: Any payment option with `cadeau` in its name will also show as the giftcard

[Mollie]: https://github.com/mollie/magento2
[PayNL]: https://github.com/paynl/magento2-plugin
[MultiSafePay]: https://github.com/MultiSafepay/magento2
[Buckaroo]: https://github.com/buckaroo-it/Magento2
