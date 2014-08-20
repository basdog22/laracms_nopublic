{{ HTML::script('layouts/backend/plugins/slimScroll/jquery.slimscroll.min.js') }}
<script>
    $(document).ready(function(){
        $(document).on('click', '.popup-link', function (e) {
            e.preventDefault();
            var me = $(this);

            $.get($(this).attr('href'),function(data){

                me.data('content',data);
                me.popover({
                    html: true,
                    template: '<div class="popover popover-bigger" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
                });
                me.popover('show');
                $("#tabs").tabs();
            });

            return false;
        });

        $(document).on('change', '.auto-update-sort', function (e) {
            e.preventDefault();
            $.post('/backend/menuitemsort',{itemid: $(this).attr('id'),newsort: $(this).val()},function(data){
                notifyJs(data);
            })
            return false;

        });

        $(document).on('click', '.close-popup', function (e) {
            e.preventDefault();
            $("input[name='"+$(this).data('appendto')+"']").val($(this).data('href'));
            if($("input[name='link_text']").length){
                $("input[name='link_text']").val($(this).html());
            }

            $(this).parent().parent().parent().parent().parent().parent().parent().remove();
            return false;

        });

        $(".popup-link").popover();

        $(".ttips").tooltip();

        if(jQuery(".scrollbars").length){
            jQuery(".scrollbars").each(function(){
                jQuery(this).slimScroll({
                    height: jQuery(this).data('height')
                });
            });
        }




    });

</script>