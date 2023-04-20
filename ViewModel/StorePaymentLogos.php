<?php declare(strict_types=1);

/**
 * @author Siteation (https://siteation.dev/)
 * @copyright Copyright 2023 Siteation (https://siteation.dev/)
 * @license MIT
 */

namespace Siteation\StoreInfoPaymentLogos\ViewModel;

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
     * Get all enabled payment options,
     * and return them as array with the title and code
     *
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
     * Get the filtered payment options
     *
     * @return string[]
     */
    public function selectedPaymentMethods(): array
    {
        $data = $this->scopeConfig->getValue('siteation_payment/payment/payment_options_show', ScopeInterface::SCOPE_STORE);
        $options = $data ? explode(",", $data) : [];
        return $options;
    }

    /**
     * Get only the names from all active payment options
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
     * Get only the codes from all active payment options
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
     * Create an filterd array with only the payment options that are also in the filter options,
     * and return the filter names with no duplicates,
     * so it is easier to use them for the loop in the frontend logic
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

            if (str_contains($code, "_cbc")) {
                $payment = "_kbc";
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
                    $methods[] = $filter;
                }
            }
        }

        // Return the array without any duplicates
        return array_unique($methods);
    }
}
