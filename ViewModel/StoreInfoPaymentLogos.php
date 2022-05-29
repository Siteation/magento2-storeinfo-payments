<?php declare(strict_types=1);

namespace Siteation\StoreInfoPaymentLogos\ViewModel;

use Hyva\Theme\ViewModel\SvgIcons;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Store\Model\ScopeInterface;

class StoreInfoPaymentLogos implements ArgumentInterface
{
    protected $scopeConfig;
    protected $svgIcons;

    public function __construct(
        ScopeConfigInterface $scopeConfig,
        SvgIcons $svgIcons
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->svgIcons = $svgIcons;
    }

    /**
     * Get store information
     *
     * @param string $attribute
     * @return mixed
     */
    public function getStoreInfoPaymentLogos(string $attribute)
    {
        $path = sprintf('general/store_information_extra/payment_logos/%s', $attribute);
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
    }

    public function getPaymentLogosArrayNames()
    {
        $names = [];

        for ($i = 0; $i < 9; $i++) {
            if ($name = $this->getStoreInfoPaymentLogos('option_' . $i)) {
                $names[] = $name;
            }
        }

        return $names;
    }

    public function getSvg(
        string $path,
        string $icon,
        string $classNames = '',
        ?int $width = 48,
        ?int $height = 32,
        array $attributes = []
    ) {
        $safeIconName = strtolower(preg_replace('#[ -]+#', '-', $icon));
        $iconPath = $path . $safeIconName;

        return $this->svgIcons->renderHtml($iconPath, $classNames, $width, $height, $attributes);
    }
}
