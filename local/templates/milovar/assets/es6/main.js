(function ($) {

    function ourAddress(){
        var aderBlock = $(".adress");

        if(aderBlock.length > 0){

            $(document).on('click', ".adress", function(){
                $(this).toggleClass('is-open');
                $(".adress__list").slideToggle(300, "linear");
            })

            aderBlock.hover(function(){

            }, function(){
                $(this).removeClass('is-open');
                $(".adress__list").slideUp(300, "linear");
            });
        }
    }

    function catalogVid(){
        var selVid = $(".sort-view__link");

        if(selVid.length > 0){
            var catalogVidClass = {
                0: "",
                1: "catalog-goriz",
                2: "catalog-tabl"
            }
            var selClass = 'is-select';
            var localIndex = localStorage.getItem("vid_catalog_index");

            if(localIndex !== null){
                $('body').addClass(catalogVidClass[localIndex])
                selVid.removeClass(selClass);
                $(selVid[localIndex]).addClass(selClass);
            }

            $(document).on('click', ".sort-view__link", function(){
                var elem = $(this);
                var elemIndex = elem.index();

                selVid.removeClass(selClass);
                elem.addClass(selClass);

                $.each(catalogVidClass, function(index, value){
                    $('body').removeClass(value);
                })

                $("body").addClass(catalogVidClass[elemIndex]);

                localStorage.setItem("vid_catalog_index", elemIndex);
            })
        }
    }

    function catalogMenu(){

        if($('.catalog-category').length > 0){

            $(document).on('click', '.catalog-category__sub', function(){
                var papa = $(this).parents(".catalog-category__item");
                papa.toggleClass('is-open');
                papa.find('.deep-lev-1').slideToggle();
            })
        }
    }

    function catalogFilters(){
        var formFilter = $('#filter-form-catalog');

        if(formFilter.length > 0){
            var formGo = true;

            $(document).on('change', ".filter-block__checkbox-input", function(){
                var blocFilter = $(this).parents('.filter-block__container');
                var countCheck = 0;
                var nameFilter = [];

                $.each(blocFilter.find('.filter-block__checkbox-input'), function(){

                    if($(this).prop('checked')){
                        countCheck++;
                    }
                })

                $.each(formFilter.find('.filter-block__checkbox-input'), function(){
                    if($(this).prop('checked')) {
                        nameFilter.push($(this).next('.filter-block__checkbox-fufel').find('.filter-block__checkbox-name').text());
                    }
                })

                if(countCheck > 0){
                    countCheck = '(' + countCheck + ')';
                } else {
                    countCheck = "";
                }

                blocFilter.find('.filter-block__count').text(countCheck);

                var link = formFilter.attr('action') + "?";
                link += formFilter.serialize() + "&set_filter=1"

                if(formGo){
                    $.get(link, function(data){
                        var page = $(data);
                        $('.js-load-prod').empty().append(page.find('.catalog-product__item'));

                        var soob = "<span class='fil-res'>Найдено ";
                        var textFinal = page.find('.filter-block').attr('data-count') * 1;
                        var textFinalCol = endingsForm(textFinal, "товар", "товара", "товаров");

                        soob += textFinal + " " + textFinalCol + " по фильтрам:<span>";
                        soob += " " + nameFilter.join(", ");

                        soob = nameFilter.length > 0 ? soob : "";

                        $('.filter-itog__text').html(soob);
                    })
                }
            })

            $(document).on('click', ".js-filter-res", function(){
                formGo = false;

                $.each(formFilter.find('.filter-block__checkbox-input'), function(){

                    if($(this).prop('checked')){
                        $(this).trigger('click');
                    }
                })
                formGo = true;
                var link = formFilter.attr('action') + "?del_filter=1";

                $.get(link, function(data){
                    var page = $(data);
                    $('.js-load-prod').empty().append(page.find('.catalog-product__item'));
                    $('.filter-itog__text').empty();
                })
            })
        }
    }

    function endingsForm(n, form1, form2, form5) {
        var n = Math.abs(n) % 100;
        var n1 = n % 10;
        if (n > 10 && n < 20) return form5;
        if (n1 > 1 && n1 < 5) return form2;
        if (n1 == 1) return form1;
        return form5;
    }

    function addBascet(){
        $(document).on('input', '.js-card-count', function(){
            var inpU = $(this);
            var prodBlock = inpU.parents('.js-prod-item');
            var count = inpU.val() * 1;

            if(count <= 0){
                count = 1;
                inpU.val(count);
            }

            var price = prodBlock.find('.js-add-basket').attr('data-link');
            price = $.parseJSON(price).price;
            price = parseFloat(price) * count;
            price = number_format(price, 2, '.', ' ') + "р";
            prodBlock.find('.js-cart-price').text(price);
        })

        $(document).on('click', ".js-sel-product", function(){
            var buttData = $(this);
            var blockData = buttData.parents('.js-prod-item');
            var bigData = buttData.attr('data-big-data');

            blockData.find('.js-sel-product').removeClass('is-chek');
            buttData.addClass('is-chek');

            var priceAll = $.parseJSON(bigData).price;
            priceAll = parseFloat(priceAll) * (blockData.find('.js-card-count').val() * 1)
            priceAll = number_format(priceAll, 2, '.', ' ') + "р";
            blockData.find('.js-cart-price').text(priceAll);

            blockData.find('.js-add-basket').attr('data-link', bigData);
            blockData.find('.price-show').text(new Intl.NumberFormat('ru-RU').format(bigData.price));
        })

        $(document).on('click', '.js-offers-toggle', function(){
            var blockData = $(this).parents('.js-prod-item');
            blockData.find('.js-offers-hid').slideToggle();
            blockData.find('.js-variation').toggleClass('is-show');
        })

        $(document).on('click', ".js-add-basket", function(){
            var parBlock = $(this).parents('.js-prod-item');
            var linkAdd = $(this).attr('data-link');
            linkAdd = $.parseJSON(linkAdd).basket_link;
            linkAdd += "&quantity=" + parBlock.find('.js-card-count').val();

            window.location.href = linkAdd;
        })

        $(document).on('click', ".js-card-plus, .js-card-minus", function(){
            var cartBlock = $(this).parents('.js-cart-counter');
            var count = cartBlock.find('.js-card-count').val();

            if($(this).hasClass('js-card-plus')){
                count++;

            } else if($(this).hasClass('js-card-minus')) {
                count--;
                count = count <= 0 ? 1 : count;
            }

            var priceAll = $.parseJSON(cartBlock.find('.js-add-basket').attr('data-link'));
            priceAll = parseFloat(priceAll.price) * count;
            priceAll = number_format(priceAll, 2, '.', ' ') + "р";
            cartBlock.find('.js-cart-price').text(priceAll);

            cartBlock.find('.js-card-count').val(count);
        })

        $(document).on('change', ".js-card-count", function(){

            if($(this).val() <= 0){
                $(this).val('1');
            }
        })
    }

    function modalCart(){
        $(document).on('click', '.js-modal-coupon', function(){
            $('.market-cart').addClass('coupon-show');
            return false;
        })
        
        $(document).on('click', ".coupon-modal__close", function(){
            $('.market-cart').removeClass('coupon-show');
        })
    }

    function selectInit(){
        $('.arh-sel-city').selectPlug({
            class: "order-city-sel",
            changeSelect: {
                '#select-region-origin': {
                    value: ""
                },
                '#recent-delivery-value': {
                    value: ""
                },
                '#select-region-order': {
                    value: ""
                }
            }
        });
    }

    function sliderInit(){
        $('.product-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            arrows: true,
            fade: true,
            asNavFor: '.product-slider-mini',
            prevArrow: '<button type="button" class="slick-prev"></button>',
            nextArrow: '<button type="button" class="slick-next"></button>',
        });

        $('.product-slider-mini').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: true,
            focusOnSelect:true,
            asNavFor: '.product-slider',
            dots: false,
            arrows: false
        });
    }

    function lightBoxInit(){
        $('.prod-light-box').fancybox();
    }

    function mobileMenu(){
        $(document).on('click', '.nav-burger', function(){
            $(this).toggleClass('open');
            $('.header-mobile-menu').toggleClass('open');
        })
    }

    function orderSelectregion(){

        function selSity(serchText) {
            var countryOrder = $('#order-country').val()
            var arrCity = window.order_city[countryOrder];
            var itog = "";
            var itogCount = 0;

            if(serchText.length > 1){
                itog += '<div class="gorod-text__list">';

                $.each(arrCity, function(index, value){
                    var miniVal = value.toLowerCase();
                    var miniSearch = serchText.toLowerCase()

                    if(miniVal.indexOf(miniSearch) > -1){
                        itog += '<span class="gorod-text__item" data-code="' + index + '">' + value + '</span>'
                        itogCount++;
                    }
                })

                itog += '<div>';
            }

            $('.gorod-text__list').remove();
            $('#select-region-origin, #recent-delivery-value').val('');

            if(itogCount > 0){
                $('.gorod-text').append(itog);
            }
        }

        $(document).on('input', "#select-region-order", function(e){
            $(this).removeClass('error')
            selSity($(this).val());
        })

        $(document).on('click', ".gorod-text__item", function(){
            $('#select-region-order').val($(this).text()).removeClass('error');
            $("#select-region-origin, #recent-delivery-value").val($(this).attr('data-code'));
            $('.gorod-text__list').remove();
            BX.Sale.OrderAjaxComponent.sendRequest();
        })

        $(document).on('input', "#select-region-order", function(){

            if($(this).val() == ""){
                BX.Sale.OrderAjaxComponent.sendRequest();
            }
        })
    }

    window.order_step = {
        city: false,
        deliver: false,
        payment: false
    }

    function validateOrder(){

        if(!window.order_step.city){
            var top = $('#bx-soa-order-form').offset().top;
            $('body,html').animate({scrollTop: top}, 500);
            $('#select-region-order').addClass('error');
            return false;
        }

        return true;
    }

    function orderCalculate(){
        $(document).on('change', ".order-row__delivery-input", function(){

            // if(validateOrder()){
            //     $('.order-row__delivery-desc').slideUp();
            //     $(this).parents('.order-row__delivery-row').find('.order-row__delivery-desc').slideDown();
            //     BX.Sale.OrderAjaxComponent.sendRequest();
            //
            //     window.order_step.deliver = true;
            // } else {
            //     $(this).prop('checked', false);
            // }


            // $('.order-row__delivery-desc').slideUp();
            // $(this).parents('.order-row__delivery-row').find('.order-row__delivery-desc').slideDown();

            // $(this).prop('checked', false)
            // if(){
            //
            // }
            // BX.Sale.OrderAjaxComponent.sendRequest();
        })

        $(document).on('change', ".order-row__payment-input", function () {
            $('.order-row__payment-desc').slideUp();
            $(this).parents('.order-row__payment-row').find('.order-row__payment-desc').slideDown();
            BX.Sale.OrderAjaxComponent.sendRequest();
        })

        $(document).on('change', "#kolhoz-text-chek-input", function(){

            if($(this).prop('checked')){
                $('.order-buyer-gorod, .order-buyer-dom').removeAttr('style');
                $('#select-region-origin, #select-region-order, #recent-delivery-value').val('');
                $('#select-region-order').css({"opacity": .3, "pointer-events": "none"}).removeClass('error')
                window.order_step.city = true;

            } else {
                $('.order-buyer-gorod, .order-buyer-dom').css('display', "none");
                $('#select-region-order').removeAttr('style');
                window.order_step.city = false;
            }
        })

        $(document).on('click', ".save-order-arh", function(){
            BX.Sale.OrderAjaxComponent.sendRequest('saveOrderAjax');
        })
    }


    // if(value.CODE == 'LOCATION'){
    //
    //     if(value.VALUE[0] == ""){
    //         var top = $('#bx-soa-order-form').offset().top;
    //         $('body,html').animate({scrollTop: top}, 500);
    //         $('#select-region-order').addClass('error');
    //
    //     } else if(value.VALUE[0] !== '0000073738'){
    //         $('#DELIVERY_ID_31, #DELIVERY_ID_32').parents('.order-row__delivery-item').css('display', 'none');
    //
    //     } else {
    //         $('#DELIVERY_ID_31, #DELIVERY_ID_32').parents('.order-row__delivery-item').removeAttr('style');
    //     }

    function number_format(number, decimals, dec_point, thousands_sep) {
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + (Math.round(n * k) / k)
                    .toFixed(prec);
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
            .split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '')
            .length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1)
                .join('0');
        }
        return s.join(dec);
    }

    $(function(){
        ourAddress(); // показать адреса в шапке
        catalogVid(); // переключение вида каталога
        catalogMenu(); // анимация меню каталога
        catalogFilters(); // фильтры каталога
        addBascet(); // добавляем товар в корзину
        modalCart(); //
        selectInit();
        sliderInit();
        lightBoxInit();
        mobileMenu();
        orderSelectregion();
        orderCalculate();
    })

})(jQuery)