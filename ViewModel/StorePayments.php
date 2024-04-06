<?php declare(strict_types=1);

/**
 * @author Siteation (https://siteation.dev/)
 * @copyright Copyright 2023 Siteation (https://siteation.dev/)
 * @license MIT
 */

namespace Siteation\StoreInfoPayments\ViewModel;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Payment\Model\Config;
use Magento\Store\Model\ScopeInterface;

class StorePayments implements ArgumentInterface
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
        $data = $this->scopeConfig->getValue(
            'siteation_storeinfo_payment/payment/payment_options_show',
            ScopeInterface::SCOPE_STORE
        );
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
     * Filtered any payment methods that have changed in name or are a duplicate of another name
     *
     * @param string $method
     * @return string
     */
    private function filterPaymentMethods($method): string
    {
        if (
            str_contains($method, "_afterpay") ||
            str_contains($method, "_afterpay2") ||
            str_contains($method, "_afterpay20")
        ) {
            return "riverty";
        }

        if (str_contains($method, "_cbc")) {
            return "_kbc";
        }

        if (
            str_contains($method, "cadeau") ||
            str_contains($method, "_giftcards")
        ) {
            return "giftcard";
        }

        if (str_contains($method, "_idealprocessing")) {
            return "ideal";
        }

        if (str_contains($method, "_mrcash")) {
            return "bancontact";
        }

        if (
            str_contains($method, "_direct-debit") ||
            str_contains($method, "_directdebit") ||
            str_contains($method, "_sepadirectdebit")
        ) {
            return "sepa";
        }

        if (str_contains($method, "_sofortbanking")) {
            return "sofort";
        }

        if (str_contains($method, "buckaroo_magento2_transfer")) {
            return "banktransfer";
        }

        if (
            str_contains($method, "_visa") ||
            str_contains($method, "_maestro") ||
            str_contains($method, "_amex") ||
            str_contains($method, "_mastercard") ||
            str_contains($method, "_creditcards")
        ) {
            return "creditcard";
        }

        return $method;
    }

    /**
     * Create an filtered array with only the payment options that are also in the filter options,
     * and return the filter names with no duplicates,
     * so it is easier to use them for the loop in the frontend logic
     *
     * @param bool $sort
     * @return string[]
     */
    public function getPaymentMethods($sort = true): array
    {
        $filters = $this->selectedPaymentMethods();
        $codes = $this->getActivePaymentCodes();
        $methods = array();

        foreach ($codes as $code) {
            $payment = $this->filterPaymentMethods($code);

            // Iterate through the available payment methods,
            // and apply a filter to obtain the active ones
            foreach ($filters as $filter) {
                if (str_contains($payment, $filter)) {
                    $methods[] = $filter;
                }
            }
        }

        if ($sort) {
            sort($methods);
        }

        // Return the array without any duplicates
        return array_unique($methods);
    }
}
