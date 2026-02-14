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

    public function __construct(
        ScopeConfigInterface $scopeConfig,
        Config $paymentModelConfig
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->paymentModelConfig = $paymentModelConfig;
    }

    public function getStoreInfo(string $attribute): mixed
    {
        $path = sprintf('siteation_storeinfo_payment/payment/%s', $attribute);
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
    }

    public function getIconStyle() {
        return $this->getStoreInfo('icon_style');
    }

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

    public function selectedPaymentMethods(): array
    {
        $data = $this->scopeConfig->getValue(
            'siteation_storeinfo_payment/payment/payment_options_show',
            ScopeInterface::SCOPE_STORE
        );
        $options = $data ? explode(",", $data) : [];

        return $options;
    }

    public function showCreditCardMethodsBundled(): bool
    {
        return (bool) $this->scopeConfig->getValue(
            'siteation_storeinfo_payment/payment/payment_options_bundle_credit_methods',
            ScopeInterface::SCOPE_STORE
        );
    }

    public function displayIdealWero(): bool
    {
        return (bool) $this->scopeConfig->getValue(
            'siteation_storeinfo_payment/payment/payment_options_display_ideal_wero',
            ScopeInterface::SCOPE_STORE
        );
    }

    public function getActivePaymentNames(): array
    {
        $payments = $this->getActivePaymentMethods();
        $methods = array();

        foreach ($payments as $values) {
            $methods[] = $values['title'];
        }

        return $methods;
    }

    public function getActivePaymentCodes()
    {
        $payments = $this->getActivePaymentMethods();
        $methods = array();

        foreach ($payments as $values) {
            $methods[] = $values['code'];
        }

        return $methods;
    }

    private function filterPaymentMethods($method, $bundle_creditcards = true, $display_ideal_wero = true): string
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

        if (str_contains($method, "payone_paydirekt")) {
            return "giropay";
        }

        if ($display_ideal_wero && str_contains($method, "_ideal")) {
            return "ideal-wero";
        }

        if (str_contains($method, "_idealprocessing")) {
            return "ideal";
        }

        if (str_contains($method, "_mrcash")) {
            return "bancontact";
        }

        if (str_contains($method, "_mbway")) {
            return "multibanco";
        }

        if (
            str_contains($method, "_direct-debit") ||
            str_contains($method, "_directdebit") ||
            str_contains($method, "_sepadirectdebit") ||
            str_contains($method, "payone_debit")
        ) {
            return "sepa";
        }

        if (str_contains($method, "_sofortbanking")) {
            return "sofort";
        }

        if (str_contains($method, "buckaroo_magento2_transfer")) {
            return "banktransfer";
        }

        if (str_contains($method, "_creditcards")) {
            return "creditcard";
        }

        if (
            str_contains($method, "_cash_on_delivery") ||
            str_contains($method, "_payafter")
        ) {
            return "cash-on-delivery";
        }

        if (
            $bundle_creditcards && (
                str_contains($method, "_americanexpress") ||
                str_contains($method, "_american_express")
            )
        ) {
            return "amex";
        }

        if (
            $bundle_creditcards && (
                str_contains($method, "_visa") ||
                str_contains($method, "_maestro") ||
                str_contains($method, "_mastercard")
            )
        ) {
            return "creditcard";
        }

        return $method;
    }

    /**
     * Create an filtered array with only the payment options that are also in the filter options,
     * and return the filter names with no duplicates,
     * so it is easier to use them for the loop in the frontend logic
     */
    public function getPaymentMethods($sort = true): array
    {
        $bundle_creditcards = $this->showCreditCardMethodsBundled();
        $display_ideal_wero = $this->displayIdealWero();
        $filters = $this->selectedPaymentMethods();
        $codes = $this->getActivePaymentCodes();
        $methods = array();

        foreach ($codes as $code) {
            $payment = $this->filterPaymentMethods($code, $bundle_creditcards, $display_ideal_wero);

            foreach ($filters as $filter) {
                if (str_contains($payment, $filter)) {
                    $methods[] = $filter;
                }
            }
        }

        if ($sort) {
            sort($methods);
        }

        return array_unique($methods);
    }
}
