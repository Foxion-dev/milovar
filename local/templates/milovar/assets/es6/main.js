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
        $(document).on('click', ".js-sel-product", function(){
            var buttData = $(this);
            var blockData = buttData.parents('.js-prod-item');
            var bigData = JSON.parse(buttData.attr('data-big-data'));

            blockData.find('.js-sel-product').removeClass('is-chek');
            buttData.addClass('is-chek');

            blockData.find('.js-add-basket').attr('data-link', bigData.basket_link)
            blockData.find('.price-show').text(new Intl.NumberFormat('ru-RU').format(bigData.price));
        })

        $(document).on('click', '.js-offers-toggle', function(){
            var blockData = $(this).parents('.js-prod-item');
            blockData.find('.js-offers-hid').slideToggle();
            blockData.find('.js-variation').toggleClass('is-show');
        })

        $(document).on('click', ".js-add-basket", function(){
            window.location.href = atob($(this).attr('data-link')).replace(/&amp;/gi, "&");
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
            class: "order-city-sel"
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
    })
})(jQuery)