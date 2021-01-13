jQuery.fn.selectPlug = function (params) {
    var _ = this;

    _.options = {
        class: "",
        animate: false,
        speedAnimate: 300,
        changeSelect: "_none"
    }

    $.extend(_.options, params);

    $.each(this, function(index, value){
        var element = $(value);
        element.css('display', 'none');

        var elId = element.attr("id");
        elId = undefined !== elId ? "copy-" + elId : "sel-plug-" + index;

        var classMain = _.options.class != "" ? " " + _.options.class : "";
        var styleAnimate = _.options.animate ? ' style="transition: all ' + _.options.speedAnimate / 1000 + 's"' : "";

        var optionAll = element.find('option');
        var blockOption = '<span class="sel-plag__option"' + styleAnimate + '>';
        var znachenie = "";

        $.each(optionAll, function(index, value){
            var optionItem = $(value);
            var optClass = "";

            if(optionItem.prop('selected')){
                znachenie = optionItem.text();
            }

            if(optionItem.prop('disabled')){
                optClass = ' dis-item';
            }

            blockOption += '<span class="sel-plag__option-item' + optClass + '" data-value="' + optionItem.val() + '">' + optionItem.text() + '</span>';
        })
        blockOption += '</span>';

        var blockCont = '<span class="sel-plag__cont">';
        blockCont += '<span class="sel-plag__cont-val">' + znachenie + '</span>';
        blockCont += '<span class="sel-plag__cont-triangl"' + styleAnimate + '></span>';
        blockCont += '</span>';

        var blockMain = '<span id="' + elId + '" class="sel-plag__main' + classMain + '">';
        blockMain += blockCont;
        blockMain += blockOption;
        blockMain += '</span>';

        element.after(blockMain);
    })

    $(document).on('click', '.sel-plag__cont', function(){
        $(this).parent().toggleClass('is-open');
    })

    $('.sel-plag__main').hover(null, function(){
        $(this).removeClass('is-open');
    })

    $(document).on('click', '.sel-plag__option-item', function(){
        var papka = $(this).parents('.sel-plag__main');

        papka.prev('select').val($(this).attr('data-value'))

        if(_.options.changeSelect != "_none"){

            $.each(_.options.changeSelect, function(index, value){
                var domElem = $(index);
                var elemAttr = value;

                $.each(elemAttr, function(index, value){

                    if(index == "value"){
                        domElem.val(value);
                    }
                })
            })
        }

        papka.find('.sel-plag__cont-val').text($(this).text());
        papka.removeClass('is-open');
    })
};
