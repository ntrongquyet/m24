define([
    'jquery',
    'Magento_Ui/js/form/element/date',
], function ($, date) {
    'use strict';

    return date.extend({
        defaults: {
            options: {
                beforeShowDay: function (date) {
                    if(date.getDate()>=8 && date.getDate()<=12 ){
                        return [true];
                    }
                    else{
                        return  [false];
                    }
                }
            },
        },
    });
});
