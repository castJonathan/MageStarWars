<?php
namespace JCastillo\StarWars\Model;


/**
 * Pay In Store payment method model
 */
class StarWarsPaymetMethod extends \Magento\Payment\Model\Method\AbstractMethod
{

    /**
     * Payment code
     *
     * @var string
     */
    protected $_code = 'StarWars';

    /**
     * Availability option
     *
     * @var bool
     */
    protected $_isOffline = true;
    /**
     * Authorizes specified amount.
     *
     * @param InfoInterface $payment
     * @param float         $amount
     *
     * @return $this
     *
     * @throws LocalizedException
     */
    public function authorize( \Magento\Payment\Model\InfoInterface $payment, $amount )
    {
        return $this;
    }

}
