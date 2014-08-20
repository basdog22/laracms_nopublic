<script>
    $(document).ready(function() {
        $("#tabs").tabs();
        $('.drg').draggable({
            cursor: 'move',          // sets the cursor apperance
            revert: 'valid',
            revertDuration: 200,
            opacity: 0.5
        });

        // sets droppable
        $('.drop').droppable({
            hoverClass: 'droppable',

            drop: function(event, ui) {
                // after the draggable is droped, hides it with a hide() effect
                ui.draggable.appendTo(this);
                var theid = $(this).parent().attr('id').split('-')[1];
                saveBlockPosition(theid,ui.draggable.attr('id'));
            }
        });
    });
    function saveBlockPosition(gridid,blockid){
        $.post("/backend/moveblock", {grid:gridid,block:blockid},function(data) {
            notifyJs(data);
        });
    }
</script>