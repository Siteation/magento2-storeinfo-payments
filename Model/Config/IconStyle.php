<?php declare(strict_types=1);

/**
 * @author Siteation (https://siteation.dev/)
 * @copyright Copyright 2023 Siteation (https://siteation.dev/)
 * @license MIT
 */

namespace Siteation\StoreInfoPayments\Model\Config;

use Magento\Framework\Data\OptionSourceInterface;

class IconStyle implements OptionSourceInterface
{
    /**
     * @return array[]
     */
    public function toOptionArray(): array
    {
        return [
            ['label' => __('Default'), 'value' => 'default'],
            ['label' => __('Mono'), 'value' => 'mono'],
            ['label' => __('Flat'), 'value' => 'flat']
        ];
    }
}
