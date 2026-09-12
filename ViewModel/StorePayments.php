<?php declare(strict_types=1);

/**
 * @author Siteation (https://siteation.dev/)
 * @copyright Copyright 2023 Siteation (https://siteation.dev/)
 * @license MIT
 */

namespace Siteation\StoreInfoPayments\ViewModel;

use Siteation\StoreInfoPaymentsCore\ViewModel\StorePayments as CoreStorePayments;

/**
 * @deprecated 2.2.0 Moved to siteation/magento2-storeinfo-payments-core, which has no
 *             theme dependency. Kept so templates and blocks written against the old
 *             class keep working.
 * @see CoreStorePayments
 */
class StorePayments extends CoreStorePayments
{
}
