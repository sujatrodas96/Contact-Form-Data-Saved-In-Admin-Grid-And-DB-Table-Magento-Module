define([
    'jquery',
    'mage/validation'
], function ($) {
    'use strict';

    $.validator.addMethod(
        'validate-custom-domain',
        function (value) {
            // Define your custom domain validation logic here
            var regex = /^(https?:\/\/)?(www\.)?[a-zA-Z0-9-]+(\.[a-zA-Z]{2,}[a-zA-Z0-9]{2,})+$/i;
            return regex.test(value);
        },
        $.mage.__('Please enter a valid domain.')
    );
});
