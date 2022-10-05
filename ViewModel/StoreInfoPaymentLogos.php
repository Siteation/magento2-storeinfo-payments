<?php declare(strict_types=1);

namespace Siteation\StoreInfoPaymentLogos\ViewModel;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Payment\Model\Config;

class StoreInfoPaymentLogos implements ArgumentInterface
{
    protected $scopeConfig;
    protected $paymentModelConfig;
    // possiblePaymentMethods
    public const PPM = [
        "afterpay",
        "applepay",
        "bancontact",
        "banktransfer",
        "belfius",
        "creditcard",
        "sepa",
        "eps",
        "giftcard",
        "giropay",
        "ideal",
        "cbc",
        "in3",
        "klarnapaylater",
        "klarnapaynow",
        "klarnaslice",
        "mybank",
        "paypal",
        "paysafecard",
        "przelewy24",
        "sofort",
    ];

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
     * filter based on array
     */
    public function getPaymentMethods()
    {
        $paymentOptions = self::PPM;
        $paymentCodes = $this->getActivePaymentCodes();
        $methods = array();

        foreach ($paymentCodes as $paymentCode) {
            // TODO split foreach logic
            foreach ($paymentOptions as $paymentMethod) {
                if (str_contains($paymentCode, $paymentMethod)) {
                    $methods[] = $paymentMethod;
                }
            }
        }

        return array_unique($methods);
    }
}
