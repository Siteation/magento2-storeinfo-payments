<?php declare(strict_types=1);

namespace Siteation\StoreInfoPaymentLogos\Model\Config;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class PaymentOptions implements OptionSourceInterface
{
    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function getStoreConfig($value)
    {
        return $this->scopeConfig->getValue($value, 'store');
    }

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
