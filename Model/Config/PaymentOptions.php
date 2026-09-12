<?php declare(strict_types=1);

/**
 * @author Siteation (https://siteation.dev/)
 * @copyright Copyright 2023 Siteation (https://siteation.dev/)
 * @license MIT
 */

namespace Siteation\StoreInfoPayments\Model\Config;

use Siteation\StoreInfoPaymentsCore\Model\Config\PaymentOptions as CorePaymentOptions;

/**
 * @deprecated 2.2.0 Moved to siteation/magento2-storeinfo-payments-core, which has no
 *             theme dependency. Kept so a system.xml override naming the old class
 *             keeps working.
 * @see CorePaymentOptions
 */
class PaymentOptions extends CorePaymentOptions
{
}
