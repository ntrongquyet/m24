define(function () {
    'use strict';

    return function (target) { // target == Result that 'Magento_Checkout/js/model/step-navigator' returns.
        console.log(target);
        // modify target
        var navigateTo = target.navigateTo;
        target.navigateTo = function (code, scrollToElementId) {
            if (code == "shipping") { // before  method
                let rs = confirm("Are you sure to back Shipping ???");
                if (rs) {
                    var result = navigateTo.apply(this, arguments);
                    //after method call
                    return result;
                }
            }

        };
        return target
    };
});
