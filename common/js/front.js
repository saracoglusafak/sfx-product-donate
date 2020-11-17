(function ($) {
    // console.log(sfxdonate_plugin_url);
    // console.log(sfxdonate_process_admin_url);
    console.log("front");

    var _body = $("body");



    _body.on('change', 'select#donate', function (e) {
        e.preventDefault();

        var _this = $(this);
        var _value = _this.val();


        // console.log(_value);
        $.post(sfxdonate_process_front_url + 'sfx_save_session', {
            name: "donate",
            value: _value
        }, function (reply) {
            console.log(reply);

        });


    });


    if ($('select#donate').length)
        $('select#donate').trigger("change");





    _body.on('change', '[id^="quantity_"]', function (e) {

        var _this = $(this);
        var _value = _this.val();
        var _button = $('#' + sfxdonate_plugin_id + 'add-button');
        var _href = _button.attr("href");

        // console.log(_value);
        // console.log(_href);
        // console.log(_href.replace(/quantity=([0-9]+)/g, 'quantity=' + _value));

        _button.attr("href", _href.replace(/quantity=([0-9]+)/g, 'quantity=' + _value));


    });



    _body.on('click', '[data-sfxmodal]', function (e) {
        e.preventDefault();

        var _this = $(this);
        var _modal = _this.attr("data-sfxmodal");
        // console.log(_modal);
        // var _quantity = $('[id^="quantity_"]').val();

        // console.log(_quantity);


        $(_modal).show();



    });





    _body.on('click', '.sfxmodal-wrap', function (e) {
        e.preventDefault();

        var _this = $(this);
        var _modal = _this.attr("data-sfxmodalclose");

        $(_modal).hide();



    });















})(jQuery);