# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

[Unreleased]: https://github.com/Siteation/magento2-storeinfo-payments/compare/2.2.0...main

## [2.2.0] - 2026-09-12

[2.2.0]: https://github.com/Siteation/magento2-storeinfo-payments/compare/2.1.0...2.2.0

### Changed

- Hyvä is no longer required. `hyva-themes/magento2-theme-module` and
  `siteation/magento2-hyva-icons-payment` are out of `require`; the icons now come from
  `siteation/magento2-icons-payment`, which needs nothing but `magento/framework`. A
  Hyvä store keeps the Hyvä look and the Hyvä CMS components.
- The templates render theme neutral markup. Luma styles it through
  `web/css/source/_module.less`, Breeze through `web/css/breeze/_default.less` and Hyvä
  through `view/frontend/tailwind/`, with the utility classes passed as block arguments
  from the `hyva_default` layout handle.

## [2.1.0] - 2026-02-14

[2.1.0]: https://github.com/Siteation/magento2-storeinfo-payments/compare/2.0.0...2.1.0

### Added

- Support for changing the iDeal logo to the new iDeal - Wero Logo
- Tailwind 4 support for Hyvä.

### Fixed

- Creditcard Bundeling option with AmericanExpress

## [2.0.0] - 2025-12-28

[2.0.0]: https://github.com/Siteation/magento2-storeinfo-payments/compare/1.2.0...2.0.0

### Added

- Added Hyvä CMS support, allowing the templates to be used as components.
- Added Icon Style option for Default, Mono and Flat styles.
- Added support for Location display conditions.
- Added Footer Payment Icons to before footer as a default in marquee style.

### Changed

- Reworked templates to be more modular and easier to customize.

## [1.2.0] - 2024-12-29

[1.2.0]: https://github.com/Siteation/magento2-storeinfo-payments/compare/1.1.0...1.2.0

### Added

- Support for more payment options, see readme for what is supported
- PayOne to the support chart

## [1.1.0] - 2024-06-02

[1.1.0]: https://github.com/Siteation/magento2-storeinfo-payments/compare/1.0.0...1.1.0

### Added

- Option to show each Creditcard icon separate, instead of the bundled creditcard icon
- Support for more payment options, see readme for what is supported
- Buckaroo to the support chart

## 1.0.2 - 2024-04-06

### Changed

- Update dependencies

## 1.0.1 - 2023-08-18

### Fixed

- Missing column style for default Hyva theme
- SVG icon path issue

## 1.0.0 - 2023-04-28

Initial release 🎉
