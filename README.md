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

|                              | [Mollie] | [PayNL] | [MultiSafePay] | [Buckaroo] | [PayOne] |
| ---------------------------- | :------: | :-----: | :------------: | :--------: | :------: |
| afterpay / riverty           |          |    ✓    |       ✓        |     ✓      |          |
| alipay                       |          |    ✓    |       ✓        |     ✓      |    ✓     |
| amazonpay                    |          |    ✓    |       ✓        |            |    ✓     |
| american express *           |    ✓     |    ✓    |       ✓        |            |          |
| applepay                     |    ✓     |    ✓    |       ✓        |     ✓      |    ✓     |
| bancontact                   |    ✓     |    ✓    |       ✓        |     ✓      |    ✓     |
| belfius                      |    ✓     |         |       ✓        |     ✓      |          |
| biller                       |          |    ✓    |       ✓        |            |          |
| billie                       |    ✓     |         |                |            |          |
| cash-on-delivery / pay-after |          |         |       ✓        |            |    ✓     |
| creditcard                   |    ✓     |         |       ✓        |     ✓      |    ✓     |
| direct-debit                 |          |         |       ✓        |            |    ✓     |
| eps                          |    ✓     |    ✓    |       ✓        |     ✓      |    ✓     |
| giftcard                     |    ✓     |    ✓    |                |     ✓      |          |
| giropay                      |    ✓     |    ✓    |       ✓        |     ✓      |    ✓     |
| googlepay                    |          |    ✓    |       ✓        |            |          |
| ideal                        |    ✓     |    ✓    |                |     ✓      |    ✓     |
| in3                          |    ✓     |    ✓    |       ✓        |     ✓      |          |
| kbc/cbc                      |    ✓     |         |       ✓        |     ✓      |          |
| klarna                       |    ✓     |    ✓    |                |            |    ✓     |
| maestro *                    |    ✓     |    ✓    |       ✓        |            |          |
| mastercard *                 |    ✓     |    ✓    |       ✓        |            |          |
| mbway / multibanco           |          |    ✓    |       ✓        |     ✓      |          |
| mybank                       |    ✓     |         |       ✓        |            |          |
| payconiq                     |          |    ✓    |                |     ✓      |          |
| paypal                       |    ✓     |    ✓    |       ✓        |     ✓      |    ✓     |
| paysafecard                  |    ✓     |         |       ✓        |            |          |
| przelewy24                   |    ✓     |    ✓    |                |     ✓      |    ✓     |
| sepa                         |    ✓     |         |                |     ✓      |    ✓     |
| sofort                       |    ✓     |    ✓    |                |     ✓      |    ✓     |
| trustly                      |    ✓     |    ✓    |       ✓        |            |    ✓     |
| visa *                       |    ✓     |    ✓    |       ✓        |            |          |
| vpay                         |          |    ✓    |       ✓        |            |          |
| wechatpay                    |          |    ✓    |       ✓        |     ✓      |    ✓     |

> \*Bundled to one creditcard icon by default, can be disabled trough the [CreditCard method unbundling option](#creditcard-method-unbundling)

> [!NOTE]
> [Stripe] is also supported trough the [Adobe Marketplace](https://commercemarketplace.adobe.com/stripe-stripe-payments.html)

> [!NOTE]
> Any payment option with `gift` or `cadeau` in its name will also be shown as the `giftcard`

> [!IMPORTANT]
> This list only reflects the modules we've confirmed compatibility with so far.
>
> While we haven't specifically tested this module with every payment module,
> it should work with many of them out of the box,
> as long the payment methods listed are offered by this payment module.

[Mollie]: https://github.com/mollie/magento2
[PayNL]: https://github.com/paynl/magento2-plugin
[MultiSafePay]: https://github.com/MultiSafepay/magento2
[Buckaroo]: https://github.com/buckaroo-it/Magento2
[PayOne]: https://github.com/PAYONE-GmbH/magento-2
[Stripe]: https://commercemarketplace.adobe.com/stripe-stripe-payments.html
