(function ($) {

    function mobileSearch() {
        $(document).on('click', '.search-form-ico-mobile', function () {
            $('#serch-form').addClass('full-width');
        })
        $('#serch-form').click(function () {
            $(this).addClass('full-width');
        })

        $(document).on('click', '.search-form-close', function () {
            $('#serch-form').removeClass('full-width');
        })

        $(document).on('click', '.mobi-par-cart__door-open', function () {
            var parBlock = $(this).parents('.mobi-par-cart');
            var parId = parBlock.attr('data-blick');

            $(this).css('display', "none");
            parBlock.find('.mobi-par-cart__door-close').css('display', "inline-block");
            parBlock.find('.mobi-par-cart__info').slideDown();

            BX.arh_obj_block_open[parId] = true;
        })

        $(document).on('click', '.mobi-par-cart__door-close', function () {
            var parBlock = $(this).parents('.mobi-par-cart');
            var parId = parBlock.attr('data-blick');

            $(this).css('display', "none");
            parBlock.find('.mobi-par-cart__door-open').css('display', "inline-block");
            parBlock.find('.mobi-par-cart__info').slideUp();

            BX.arh_obj_block_open[parId] = false;
        })
    }

    function ourAddress() {
        var aderBlock = $(".adress");

        if (aderBlock.length > 0) {

            $(document).on('click', ".adress", function () {
                $(this).toggleClass('is-open');
                $(".adress__list").slideToggle(300, "linear");
            })

            aderBlock.hover(function () {

            }, function () {
                $(this).removeClass('is-open');
                $(".adress__list").slideUp(300, "linear");
            });
        }
    }

    function catalogVid() {
        var selVid = $(".sort-view__link");

        if (selVid.length > 0) {
            var catalogVidClass = {
                0: "",
                1: "catalog-goriz",
                2: "catalog-tabl"
            }
            var selClass = 'is-select';
            var localIndex = localStorage.getItem("vid_catalog_index");

            if (localIndex !== null) {
                $('body').addClass(catalogVidClass[localIndex])
                selVid.removeClass(selClass);
                $(selVid[localIndex]).addClass(selClass);
            }

            $(document).on('click', ".sort-view__link", function () {
                var elem = $(this);
                var elemIndex = elem.index();

                selVid.removeClass(selClass);
                elem.addClass(selClass);

                $.each(catalogVidClass, function (index, value) {
                    $('body').removeClass(value);
                })

                $("body").addClass(catalogVidClass[elemIndex]);

                localStorage.setItem("vid_catalog_index", elemIndex);
            })
        }
    }

    function catalogMenu() {

        if ($('.catalog-category').length > 0) {

            $(document).on('click', '.catalog-category__sub', function () {
                var papa = $(this).parents(".catalog-category__item");
                papa.toggleClass('is-open');
                papa.find('.deep-lev-1').slideToggle();
            })
        }

        $(document).on('click', '.mobile-button', function () {
            $(this).parent('.catalog-category').toggleClass('opened');
        })
    }

    function catalogFilters() {
        var formFilter = $('#filter-form-catalog');

        if (formFilter.length > 0) {
            var formGo = true;

            $(document).on('change', ".filter-block__checkbox-input", function () {
                var blocFilter = $(this).parents('.filter-block__container');
                var countCheck = 0;
                var nameFilter = [];

                $.each(blocFilter.find('.filter-block__checkbox-input'), function () {

                    if ($(this).prop('checked')) {
                        countCheck++;
                    }
                })

                $.each(formFilter.find('.filter-block__checkbox-input'), function () {
                    if ($(this).prop('checked')) {
                        nameFilter.push($(this).next('.filter-block__checkbox-fufel').find('.filter-block__checkbox-name').text());
                    }
                })

                if (countCheck > 0) {
                    countCheck = '(' + countCheck + ')';
                } else {
                    countCheck = "";
                }

                blocFilter.find('.filter-block__count').text(countCheck);

                var link = formFilter.attr('action') + "?";
                link += formFilter.serialize() + "&set_filter=1"

                if (formGo) {
                    $.get(link, function (data) {
                        var page = $(data);
                        $('.js-load-prod').empty().append(page.find('.catalog-product__item'));
                        $('.js-load-paging').empty().append(page.find('.js-load-paging .paging-block'))

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

            $(document).on('click', ".js-load-paging a", function () {
                var link = $(this).attr('href');

                $.get(link, function (data) {
                    var page = $(data);
                    $('.js-load-prod').empty().append(page.find('.catalog-product__item'));
                    $('.js-load-paging').empty().append(page.find('.js-load-paging .paging-block'))
                })

                return false;
            })

            $(document).on('click', ".js-filter-res", function () {
                formGo = false;

                $.each(formFilter.find('.filter-block__checkbox-input'), function () {

                    if ($(this).prop('checked')) {
                        $(this).trigger('click');
                    }
                })
                formGo = true;
                var link = formFilter.attr('action') + "?del_filter=1";

                $.get(link, function (data) {
                    var page = $(data);
                    $('.js-load-prod').empty().append(page.find('.catalog-product__item'));
                    $('.js-load-paging').empty().append(page.find('.js-load-paging .paging-block'))

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

    function addBascet() {
        $(document).on('input', '.js-card-count', function () {
            var inpU = $(this);
            var prodBlock = inpU.parents('.js-prod-item');
            var count = inpU.val() * 1;

            if (count <= 0) {
                count = 1;
                inpU.val(count);
            }

            var price = prodBlock.find('.js-add-basket').attr('data-link');
            price = $.parseJSON(price).price;
            price = parseFloat(price) * count;
            price = number_format(price, 0, ' ', ' ') + " Р";
            prodBlock.find('.js-cart-price').text(price);
        })

        $(document).on('click', ".js-sel-product", function () {
            var buttData = $(this);
            var blockData = buttData.parents('.js-prod-item');
            var bigData = buttData.attr('data-big-data');

            blockData.find('.js-sel-product').removeClass('is-chek');
            buttData.addClass('is-chek');

            var priceAll = $.parseJSON(bigData).price;
            priceAll = parseFloat(priceAll) * (blockData.find('.js-card-count').val() * 1);
            priceAll = number_format(priceAll, 0, ' ', ' ') + " Р";

            blockData.find('.js-cart-price').text(priceAll);
            blockData.find('.js-add-basket').attr('data-link', bigData);
        })

        $(document).on('click', '.js-offers-toggle', function () {
            var blockData = $(this).parents('.js-prod-item');
            blockData.find('.js-offers-hid').slideToggle();
            blockData.find('.js-variation').toggleClass('is-show');
        })

        $(document).on('click', ".js-add-basket", function () {
            var parBlock = $(this).parents('.js-prod-item');
            var linkAdd = $(this).attr('data-link');
            linkAdd = $.parseJSON(linkAdd).basket_link;
            linkAdd += "&quantity=" + parBlock.find('.js-card-count').val();

            // console.log(linkAdd);

            window.location.href = linkAdd;
        })

        $(document).on('click', ".js-card-plus, .js-card-minus", function () {
            var cartBlock = $(this).parents('.js-cart-counter');
            var count = cartBlock.find('.js-card-count').val();

            if ($(this).hasClass('js-card-plus')) {
                count++;

            } else if ($(this).hasClass('js-card-minus')) {
                count--;
                count = count <= 0 ? 1 : count;
            }

            var priceAll = $.parseJSON(cartBlock.find('.js-add-basket').attr('data-link'));
            priceAll = parseFloat(priceAll.price) * count;
            priceAll = number_format(priceAll, 0, ' ', ' ') + " Р";
            cartBlock.find('.js-cart-price').text(priceAll);

            cartBlock.find('.js-card-count').val(count);
        })

        $(document).on('change', ".js-card-count", function () {

            if ($(this).val() <= 0) {
                $(this).val('1');
            }
        })
    }

    function modalCart() {
        $(document).on('click', '.js-modal-coupon', function () {
            $('.market-cart').addClass('coupon-show');
            return false;
        })

        $(document).on('click', ".coupon-modal__close", function () {
            $('.market-cart').removeClass('coupon-show');
        })
    }

    function selectInit() {
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

    function sliderInit() {
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
            focusOnSelect: true,
            asNavFor: '.product-slider',
            dots: false,
            arrows: false
        });
    }

    function lightBoxInit() {
        $('.prod-light-box').fancybox();
    }

    function mobileMenu() {
        $(document).on('click', '.nav-burger', function () {
            $(this).toggleClass('open');
            $('.header-mobile-menu').toggleClass('open');
        })
    }

    function orderSelectregion() {

        function selSity(serchText) {
            var countryOrder = $('#order-country').val()
            var arrCity = window.order_city[countryOrder];
            var itog = "";
            var itogCount = 0;

            if (serchText.length > 1) {
                itog += '<div class="gorod-text__list">';

                $.each(arrCity, function (index, value) {
                    var miniVal = value.toLowerCase();
                    var miniSearch = serchText.toLowerCase()

                    if (miniVal.indexOf(miniSearch) > -1) {
                        itog += '<span class="gorod-text__item" data-code="' + index + '">' + value + '</span>'
                        itogCount++;
                    }
                })

                itog += '<div>';
            }

            $('.gorod-text__list').remove();
            $('#select-region-origin, #recent-delivery-value').val('');

            if (itogCount > 0) {
                $('.gorod-text').append(itog);
            }
        }

        $(document).on('input', "#select-region-order", function (e) {
            $(this).removeClass('error')
            selSity($(this).val());
        })

        $(document).on('click', ".gorod-text__item", function () {
            $('#select-region-order').val($(this).text()).removeClass('error');
            $("#select-region-origin, #recent-delivery-value").val($(this).attr('data-code'));
            $('.gorod-text__list').remove();
            BX.Sale.OrderAjaxComponent.sendRequest();
        })

        $(document).on('input', "#select-region-order", function () {

            if ($(this).val() == "") {
                BX.Sale.OrderAjaxComponent.sendRequest();
            }
        })
    }

    window.order_step = {
        city: false,
        deliver: false,
        payment: false
    }

    function validateOrder() {

        if (!window.order_step.city) {
            var top = $('#bx-soa-order-form').offset().top;
            $('body,html').animate({ scrollTop: top }, 500);
            $('#select-region-order').addClass('error');
            return false;
        }

        return true;
    }

    function orderCalculate() {

        $(document).on('change', ".order-row__payment-input", function () {
            $('.order-row__payment-desc').slideUp();
            $(this).parents('.order-row__payment-row').find('.order-row__payment-desc').slideDown();
            $('.order-row__payment-row').removeClass('error');
            BX.Sale.OrderAjaxComponent.sendRequest();
        })

        $(document).on('change', ".order-row__delivery-input", function () {
            $('.order-row__delivery-desc').slideUp();
            $(this).parents('.order-row__delivery-row').find('.order-row__delivery-desc').slideDown();
            $('.order-row__delivery-row').removeClass('error');
            BX.Sale.OrderAjaxComponent.sendRequest();
        })

        $(document).on('change', "#kolhoz-text-chek-input", function () {

            if ($(this).prop('checked')) {
                $('.order-buyer-gorod, .order-buyer-dom').removeAttr('style');
                $('#select-region-origin, #select-region-order, #recent-delivery-value').val('');
                $('#select-region-order').css({ "opacity": .3, "pointer-events": "none" }).removeClass('error')
                $('#alt-local').val(1);

            } else {
                $('.order-buyer-gorod, .order-buyer-dom').css('display', "none");
                $('#select-region-order').removeAttr('style');
                $('#alt-local').val(0);
            }
        })

        $(document).on('click', ".save-order-arh", function () {
            var vihod = true;
            var scrollElem = null;
            var classError = "";

            if ($('#select-region-origin').val() == "" && !$('#kolhoz-text-chek-input').prop('checked')) {

                classError = '#select-region-order'
                scrollElem = '#err-city'
                vihod = false;
            }

            if (vihod) {

                $.each($('.order-row__delivery-input'), function () {

                    if ($(this).prop('checked')) {
                        vihod = true;

                        return false;
                    } else {
                        classError = '.order-row__delivery-row'
                        scrollElem = '#err-del'
                        vihod = false;
                    }
                })
            }

            if (vihod) {

                $.each($('.order-row__payment-input'), function () {

                    if ($(this).prop('checked')) {
                        vihod = true;

                        return false;
                    } else {
                        classError = '.order-row__payment-row'
                        scrollElem = '#err-pay'
                        vihod = false;
                    }
                })
            }

            if (vihod) {
                classError = [];

                if ($('.order-buyer-name input').val() == "") {
                    classError.push('.order-buyer-name .order-buyer__field');

                    vihod = false;
                }

                if ($('.order-buyer-famil input').val() == "") {
                    classError.push('.order-buyer-famil .order-buyer__field');

                    vihod = false;
                }

                if ($('.order-buyer-phone input').val() == "") {
                    classError.push('.order-buyer-phone .order-buyer__field');

                    vihod = false;
                }

                if ($('.order-buyer-index input').val() == "") {
                    classError.push('.order-buyer-index .order-buyer__field');

                    vihod = false;
                }

                if ($('.order-buyer-email input').val() == "" || $('.order-buyer-email input').val().indexOf("@") == -1) {
                    classError.push('.order-buyer-email .order-buyer__field');

                    vihod = false;
                }

                if ($('#kolhoz-text-chek-input').prop('checked')) {

                    if ($('.order-buyer-gorod input').val() == "") {
                        classError.push('.order-buyer-gorod .order-buyer__field');

                        vihod = false;
                    }

                    if ($('.order-buyer-dom input').val() == "") {
                        classError.push('.order-buyer-dom .order-buyer__field');

                        vihod = false;
                    }
                }

                scrollElem = '#err-buyer';
                classError = classError.join(", ");
            }

            if (vihod) {
                classError = [];

                if (!$('#valid-one').prop('checked')) {
                    classError.push('.valid-order:first-child');
                    vihod = false;
                }

                if (!$('#valid-two').prop('checked')) {
                    classError.push('.valid-order:last-child');
                    vihod = false;
                }

                scrollElem = '#err-side';
                classError = classError.join(", ");
            }

            if (!vihod) {
                $(classError).addClass('error');

                $("html, body").animate({
                    scrollTop: $(scrollElem).offset().top - 180 + "px"
                }, {
                    duration: 1000,
                    easing: "swing"
                });

                return false;
            }

            BX.Sale.OrderAjaxComponent.sendRequest('saveOrderAjax');
        })


    }

    function number_format(number, decimals, dec_point, thousands_sep) {
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
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

    $(function () {
        mobileSearch();
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


    // Скрипты FoxDev


    // Фон фиксированного header

    $(window).scroll(function (e) {
        let scroll = $(window).scrollTop();

        if (scroll > 10) {
            $('.header__bottom').css({
                'background-color': '#f2f5f9'
            });
        } else if (scroll == 0) {
            $('.header__bottom').css({
                'background-color': 'transparent'
            });
        }
    });

    // Слайдер акций на главной

    $('.slider-sales').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        arrows: true,
        prevArrow: '<div class="custom-slick-arrow custom-slick-arrow--prev"><span></span></div>',
        nextArrow: '<div class="custom-slick-arrow custom-slick-arrow--next"><span></span></div>',
        responsive: [
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 481,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: true
                }
            }
        ]
    });

})(jQuery)