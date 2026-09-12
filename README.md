# Siteation - Magento 2 StoreInfo Payments

[![Packagist Version](https://img.shields.io/packagist/v/siteation/magento2-storeinfo-payments?style=for-the-badge)](https://packagist.org/packages/siteation/magento2-storeinfo-payments)
![Supported Magento Versions](https://raw.githubusercontent.com/Siteation/.github/main/assets/badges/magento-2.4-support.png)
[![Hyvä Themes Supported](https://img.shields.io/badge/Hyva_Themes-Supported-3df0af.svg?longCache=true&style=for-the-badge)](https://hyva.io/)
[![Hyvä CMS Supported](https://img.shields.io/badge/Hyva_CMS-Supported-0a144b.svg?longCache=true&style=for-the-badge)](https://hyva.io/)
[![License](https://raw.githubusercontent.com/Siteation/.github/main/assets/badges/license.png)](https://github.com/Siteation/magento2-storeinfo-payments/blob/main/LICENSE)

The Siteation StoreInfo Payments module simplifies displaying configured payment methods on your store.

There is nothing to switch on. Whichever payment methods are active in your store show up automatically, above the footer and in the minicart by default.

It runs on **any** Magento 2 theme. Luma, Breeze, Hyvä, Nebula or a custom theme all
render out of the box, and a Hyvä store additionally gets the Hyvä CMS components.

## Installation

Install the package via:

```bash
composer require siteation/magento2-storeinfo-payments
bin/magento setup:upgrade
```

## How to use

Out of the box the module shows every active payment method as an icon, above the footer and in the minicart, without any configuration.

To exclude specific payment methods, navigate to **Stores → Configuration → Siteation → Payment Methods**.

To display payment methods in other areas, use the ViewModel provided by this module. It offers additional functions for greater flexibility in rendering configured payment methods.

### Icon Style

The default icon style is "default" (card with icon).

You can configure the style through the admin option found in **Stores → Configuration → Siteation → Payment Methods → Payment Method Style**.

### Locations

Three placements, each toggled under **Stores → Configuration → Siteation → Payment Methods → Payment Locations**:

| Option | Where it renders |
| ------ | ---------------- |
| Show Before Footer | Above the footer, as a scrolling marquee |
| Show In Footer | Inside the footer, as a plain row |
| Show In Minicart | In the minicart, as a plain row |

Every placement works on every theme. The blocks are declared in containers Magento core
provides and are moved into the matching Hyvä containers when a Hyvä theme is active.

### Styling

Styling ships per frontend, so the same markup looks right everywhere:

| Theme | Source |
| ----- | ------ |
| Luma and Luma based | `view/frontend/web/css/source/_module.less` |
| Breeze | `view/frontend/web/css/breeze/_default.less` |
| Hyvä | `view/frontend/tailwind/` |
| Anything else | The markup carries semantic class hooks, style them from your own theme |

The templates themselves carry no theme specific classes, so the hooks
(`payment-marquee`, `payment-title`, `payment-logos`, `marquee-section`, `marquee-row`)
are yours to style. Override the classes per block with the `css_classes` argument in
your own layout XML.

### Credit Card Method Unbundling

By default, the module bundles all Credit Card methods into a single icon.

You can disable this feature through the admin option found in **Stores → Configuration → Siteation → Payment Methods → Bundle Creditcard Methods**.

## Previews

| Footer       | Minicart     |
| ------------ | ------------ |
| ![preview-1] | ![preview-2] |

[preview-1]: ./assets/footer.webp "Preview of the Siteation StoreInfo Payments in footer"
[preview-2]: ./assets/minicart.webp "Preview of the Siteation StoreInfo Payments in minicart"

### Hyva CMS

| CMS          | Picker       |
| ------------ | ------------ |
| ![preview-4] | ![preview-5] |

[preview-4]: ./assets/cms.gif "Preview of Hyva CMS with Siteation StoreInfo Payments Components"
[preview-5]: ./assets/cms-picker.webp "Preview of Hyva CMS Picker with Siteation StoreInfo Payments Components"

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

> \*Bundled to one creditcard icon by default, can be disabled trough the [CreditCard method unbundling option](#credit-card-method-unbundling)

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
