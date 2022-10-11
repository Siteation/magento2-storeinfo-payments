<?php declare(strict_types=1);

namespace Siteation\StoreInfoPaymentLogos\ViewModel;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Payment\Model\Config;
use Magento\Store\Model\ScopeInterface;

class StoreInfoPaymentLogos implements ArgumentInterface
{
    protected ScopeConfigInterface $scopeConfig;
    protected Config $paymentModelConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig
     * @param Config $paymentModelConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        Config $paymentModelConfig
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->paymentModelConfig = $paymentModelConfig;
    }

    public function getActivePaymentMethods()
    {
        $payments = $this->paymentModelConfig->getActiveMethods();
        $methods = array();

        foreach ($payments as $paymentCode => $paymentModel) {
            $paymentTitle = $this->scopeConfig->getValue('payment/'.$paymentCode.'/title');

            $methods[$paymentCode] = array(
                'title' => $paymentTitle,
                'code' => $paymentCode
            );
        }

        return $methods;
    }

    /**
     * Gets the static selected values
     */
    public function selectedPaymentMethods()
    {
        $data = $this->scopeConfig->getValue('siteation_payment/payment/payment_icons', ScopeInterface::SCOPE_STORE);
        $options = $data ? explode(",", $data) : [];
        return $options;
    }

    /**
     * filter only names
     */
    public function getActivePaymentNames()
    {
        $payments = $this->getActivePaymentMethods();
        $methods = array();

        foreach ($payments as $values) {
            $methods[] = $values['title'];
        }

        return $methods;
    }

    /**
     * filter only codes
     */
    public function getActivePaymentCodes()
    {
        $payments = $this->getActivePaymentMethods();
        $methods = array();

        foreach ($payments as $values) {
            $methods[] = $values['code'];
        }

        return $methods;
    }

    /**
     * Filter based on both the ActivePaymentMethods and the selectedPaymentMethods
     */
    public function getPaymentMethods(): array
    {
        $paymentOptions = $this->selectedPaymentMethods();
        $paymentCodes = $this->getActivePaymentCodes();
        $methods = array();

        foreach ($paymentCodes as $paymentCode) {
            foreach ($paymentOptions as $paymentMethod) {
                if (str_contains($paymentCode, $paymentMethod)) {
                    $methods[] = $paymentMethod;
                }
            }
        }

        return array_unique($methods);
    }
}
