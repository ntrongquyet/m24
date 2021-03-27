define([
    'jquery',
    'mage/utils/wrapper',
    'Magento_Checkout/js/model/quote'

], function ($, wrapper, quote) {
    'use strict';

    return function (setShippingInformationAction) {

        return wrapper.wrap(setShippingInformationAction, function (originalAction) {
            let result = confirm("Are you sure for confirmation ???");
            if (result) {
                return originalAction();
            }
        });
    };
});
