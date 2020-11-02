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

    $(function(){
        ourAddress();
    })
})(jQuery)