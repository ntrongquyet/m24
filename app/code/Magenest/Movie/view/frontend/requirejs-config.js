var config = {
    map: {
        '*': {
            hello: 'Magenest_Movie/js/hello',
            CarViewModel: 'Magenest_Movie/js/hihi'
        }
    },
    config: {
        mixins: {
            'Magento_Checkout/js/action/set-shipping-information': {
                'Magenest_Movie/js/action/set-shipping-information-mixin': true
            },
            'Magento_Checkout/js/model/step-navigator': {
                'Magenest_Movie/js/model/step-navigator-mixin': true

            }
        }
    }

};
