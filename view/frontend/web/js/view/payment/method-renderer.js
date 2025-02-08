define(
                [
            'uiComponent',
            'Magento_Checkout/js/model/payment/renderer-list'
        ],
        function (
            Component,
            rendererList
        ) {
            'use strict';
            rendererList.push(
                {
                    type: 'StarWars',
                    component: 'JCastillo_StarWars/js/view/payment/method-renderer/starwarspayment'
                }
            );
            return Component.extend({});
        }
    );
