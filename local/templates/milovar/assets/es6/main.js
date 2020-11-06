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

    $(function(){
        ourAddress(); //показать адреса в шапке
        catalogVid(); //переключение вида каталога
        catalogMenu(); //анимация меню каталога
    })
})(jQuery)