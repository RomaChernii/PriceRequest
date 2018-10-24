/**
 * PriceRequest Catalog ajax price request form submit
 */
require([
    'jquery',
    'mage/url',
    'Magento_Ui/js/modal/modal',
    'mage/translate'
    ], function (
        $,
        urlBuilder,
        modal,
        mage
    ) {
    'use strict';

        var $form = $('#request_price'),
            options = {
                type: 'popup',
                responsive: true,
                title: $.mage.__('Price request'),
                buttons: [{
                    text: $.mage.__('Save'),
                    class: '',
                    click: function () {
                        ajaxSubmit($form)
                    }
                }]
            };

        $('#price_request_button').on('click', function () {
            modal(options, $('#price-request-popup-modal'));
            $('#price-request-popup-modal').modal('openModal');
        });

        /**
         * Ajax form submit
         *
         * @returns void
         */
        function ajaxSubmit($form) {
            if ($form.valid()) {
                $.ajax({
                    url: $form.attr('action'),
                    data: $form.serialize(),
                    type: 'POST',
                    success: function() {
                        $form[0].reset();
                        $('#price-request-popup-modal').modal('closeModal');

                    }
                });
            }
        }
    }
);
