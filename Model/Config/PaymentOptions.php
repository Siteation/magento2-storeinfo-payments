<?php declare(strict_types=1);

/**
 * @author Siteation (https://siteation.dev/)
 * @copyright Copyright 2023 Siteation (https://siteation.dev/)
 * @license MIT
 */

namespace Siteation\StoreInfoPaymentLogos\Model\Config;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class PaymentOptions implements OptionSourceInterface
{
    protected ScopeConfigInterface $scopeConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @param string $path
     * @return mixed
     */
    public function getStoreConfig(string $path)
    {
        return $this->scopeConfig->getValue($path, 'store');
    }

    /**
     * @return array[]
     */
    public function toOptionArray(): array
    {
        $optionsJson = json_decode($this->getStoreConfig('siteation_payment/payment/payment_filter_options'));
        $options = array();

        foreach ($optionsJson as $key => $option) {
            $options[] = array(
                "label" => $key,
                "value" => $option
            );
        }

        return $options;
    }
}
