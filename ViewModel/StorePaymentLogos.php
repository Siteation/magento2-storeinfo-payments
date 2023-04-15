<?php declare(strict_types=1);

namespace Siteation\StorePaymentLogos\ViewModel;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Payment\Model\Config;
use Magento\Store\Model\ScopeInterface;

class StorePaymentLogos implements ArgumentInterface
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

    /**
     * @return array[]
     */
    public function getActivePaymentMethods(): array
    {
        $payments = $this->paymentModelConfig->getActiveMethods();
        $methods = array();

        foreach ($payments as $paymentCode => $paymentModel) {
            $paymentTitle = $this->scopeConfig->getValue('payment/' . $paymentCode . '/title');

            $methods[$paymentCode] = array(
                'title' => $paymentTitle,
                'code' => $paymentCode
            );
        }

        return $methods;
    }

    /**
     * Gets the static selected values
     *
     * @return string[]
     */
    public function selectedPaymentMethods(): array
    {
        $data = $this->scopeConfig->getValue('siteation_payment/payment/payment_icons', ScopeInterface::SCOPE_STORE);
        $options = $data ? explode(",", $data) : [];
        return $options;
    }

    /**
     * filter only names
     *
     * @return string[]
     */
    public function getActivePaymentNames(): array
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
     *
     * @return string[]
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
     *
     * @return string[]
     */
    public function getPaymentMethods(): array
    {
        $filters = $this->selectedPaymentMethods();
        $codes = $this->getActivePaymentCodes();
        $methods = array();

        foreach ($codes as $code) {
            $payment = $code;

            // Filter aliases
            if (str_contains($code, "_afterpay")) {
                $payment = "riverty";
            }

            if (str_contains($code, "_kbc")) {
                $payment = "_cbc";
            }

            if (str_contains($code, "cadeau")) {
                $payment = "giftcard";
            }

            if (
                str_contains($code, "_visa") ||
                str_contains($code, "_maestro") ||
                str_contains($code, "_amex") ||
                str_contains($code, "_mastercard")
            ) {
                $payment = "creditcard";
            }

            // Iterate through the available payment methods and apply a filter to obtain the active ones
            foreach ($filters as $filter) {
                if (str_contains($payment, $filter)) {
                    $methods[] = $payment;
                }
            }
        }

        // Return the array without any duplicates
        return array_unique($methods);
    }
}
