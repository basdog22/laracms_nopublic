$(document).ready(function () {
    $(document).on('click', '.modal-link', function (e) {
        e.preventDefault();
        $("#laraModal .modal-body").load($(this).attr('href'),function(){
            LoadSelect2Script(doSelects);
        });
        $("#laraModal").modal();
        return false;
    });

    $('#laraModal').on('show.bs.modal', function () {
        var modalBody = $(this).find('.modal-body');
        var modalDialog = $(this).find('.modal-dialog');
        $(this).find('.modal-dialog').css('width', 700);

    });

    $('#laraModal').on('hidden.bs.modal', function () {
        $('#laraModal .modal-body').html('');
    });

    $(document).on('click','.delbtn',function(e){

        var a = window.confirm('Delete?');
        if(a){
            return true;
        }
        e.preventDefault();
        return false;
    });

    $('.show-sidebar').on('click', function (e) {
        e.preventDefault();
        $('div#main').toggleClass('sidebar-show');
    });

    $('.main-menu').on('click', 'a', function (e) {
        var parents = $(this).parents('li');
        var li = $(this).closest('li.dropdown');
        var another_items = $('.main-menu li').not(parents);
        another_items.find('a').removeClass('active');
        another_items.find('a').removeClass('active-parent');
        if ($(this).hasClass('dropdown-toggle') || $(this).closest('li').find('ul').length == 0) {
            $(this).addClass('active-parent');
            var current = $(this).next();
            if (current.is(':visible')) {
                li.find("ul.dropdown-menu").slideUp('fast');
                li.find("ul.dropdown-menu a").removeClass('active')
            }
            else {
                another_items.find("ul.dropdown-menu").slideUp('fast');
                current.slideDown('fast');
            }
        }
        else {
            if (li.find('a.dropdown-toggle').hasClass('active-parent')) {
                var pre = $(this).closest('ul.dropdown-menu');
                pre.find("li.dropdown").not($(this).closest('li')).find('ul.dropdown-menu').slideUp('fast');
            }
        }
        if ($(this).hasClass('active') == false) {
            $(this).parents("ul.dropdown-menu").find('a').removeClass('active');
            $(this).addClass('active')
        }
    });
    $('.ScreenSaver').on('click', function (e) {
        e.preventDefault();
        $('div#main').toggleClass('sidebar-show');
    });
    $('#locked-screen').on('click', function (e) {
        e.preventDefault();
        $('body').addClass('body-screensaver');
        $('#screensaver').addClass("show");
        $.cookie('locked',1,{ expires: 7,path:'/'});
        ScreenSaver();
    });
    $('#screen_unlock').on('click', function(){

        OpenModalBox();
    });

    if($.cookie('locked')==1){
        $("#locked-screen").trigger('click');
    }

    var screensaverTimer = setTimeout(function(){
        $("#locked-screen").trigger('click');
    },lara.auto_settings.backend.laracms.screensaver * 1);

    $(document).on('mousemove','body',function(){
       clearTimeout(screensaverTimer);
        screensaverTimer = setTimeout(function(){
            $("#locked-screen").trigger('click');
        },lara.auto_settings.backend.laracms.screensaver * 1);
    });
    LoadSelect2Script(doSelects);

    $('.main-menu li a').each(function(){
        if($($(this))[0].href==String(window.location))
            $(this).addClass('active-parent active')
            $(this).parent().addClass('active');
            $(this).parent().parent().parent().addClass('active');
    });


    $( ".sortable" ).sortable({
        revert: true,
        cursor: "move",
        forceHelperSize: true,
        forcePlaceholderSize: true,
        handle: ".handle",
        opacity: 0.8,
        zIndex: 9999,
        update:function(event,ui){
            //line below gives the ids of elements, you can make ajax call here to save it to the database
            //console.log($(this).sortable('toArray'));
            var order = $(this).sortable("toArray").join(',');
            $.cookie("widgets_order",order, {expires: 365, path: window.location.pathname});
        }
    });
    $( ".sortable" ).disableSelection();

    reorder($.cookie("widgets_order").split(","),$(".sortable"));
    //assign hotkeys
    Mousetrap.bind(['command+l', 'ctrl+l'], function(e) {
        if($.cookie('locked')==1){
            $('#screen_unlock').trigger('click');
        }else{
            $("#locked-screen").trigger('click');
        }

        return false;
    });

    Mousetrap.bind(['command+m', 'ctrl+m'], function(e) {
        $('.show-sidebar').trigger('click');
        return false;
    });

    Mousetrap.bind(['command+u', 'ctrl+alt+u'], function(e) {
        document.location = $('#userslink').attr('href');
        return false;
    });

    Mousetrap.bind(['command+t', 'ctrl+alt+t'], function(e) {
        document.location = $('#themeslink').attr('href');
        return false;
    });
    Mousetrap.bind(['command+u', 'ctrl+alt+a'], function(e) {
        document.location = $('#addonslink').attr('href');
        return false;
    });
});

function reorder(orderArray, elementContainer){
    $.each(orderArray, function(key, val){
        elementContainer.append($("#"+val));
    });
}

function lockScreen(){

}
function OpenModalBox(){
    var who = window.prompt("Who are you?");
    if(who=='laracms'){
        $.cookie('locked',0,{ expires: 7, path:'/' });
        $('body').removeClass('body-screensaver');
        $('#screensaver').removeClass("show");
        var screensaverTimer = setTimeout(function(){
            $("#locked-screen").trigger('click');
        },lara.auto_settings.backend.laracms.screensaver * 1);
        return false;
    }
    if(who){
        alert('No access...');
    }

}
function ScreenSaver(){
    var canvas = document.getElementById("canvas");
    var ctx = canvas.getContext("2d");
    // Size of canvas set to fullscreen of browser
    var W = window.innerWidth;
    var H = window.innerHeight;
    canvas.width = W;
    canvas.height = H;
    // Create array of particles for screensaver
    var particles = [];
    for (var i = 0; i < 25; i++) {
        particles.push(new Particle());
    }
    function Particle(){
        // location on the canvas
        this.location = {x: Math.random()*W, y: Math.random()*H};
        // radius - lets make this 0
        this.radius = 0;
        // speed
        this.speed = 3;
        // random angle in degrees range = 0 to 360
        this.angle = Math.random()*360;
        // colors
        var r = Math.round(Math.random()*255);
        var g = Math.round(Math.random()*255);
        var b = Math.round(Math.random()*255);
        var a = Math.random();
        this.rgba = "rgba("+r+", "+g+", "+b+", "+a+")";
    }
    // Draw the particles
    function draw() {
        // re-paint the BG
        // Lets fill the canvas black
        // reduce opacity of bg fill.
        // blending time
        ctx.globalCompositeOperation = "source-over";
        ctx.fillStyle = "rgba(0, 0, 0, 0.02)";
        ctx.fillRect(0, 0, W, H);
        ctx.globalCompositeOperation = "lighter";
        for(var i = 0; i < particles.length; i++){
            var p = particles[i];
            ctx.fillStyle = "white";
            ctx.fillRect(p.location.x, p.location.y, p.radius, p.radius);
            // Lets move the particles
            // So we basically created a set of particles moving in random direction
            // at the same speed
            // Time to add ribbon effect
            for(var n = 0; n < particles.length; n++){
                var p2 = particles[n];
                // calculating distance of particle with all other particles
                var yd = p2.location.y - p.location.y;
                var xd = p2.location.x - p.location.x;
                var distance = Math.sqrt(xd*xd + yd*yd);
                // draw a line between both particles if they are in 200px range
                if(distance < 200){
                    ctx.beginPath();
                    ctx.lineWidth = 1;
                    ctx.moveTo(p.location.x, p.location.y);
                    ctx.lineTo(p2.location.x, p2.location.y);
                    ctx.strokeStyle = p.rgba;
                    ctx.stroke();
                    //The ribbons appear now.
                }
            }
            // We are using simple vectors here
            // New x = old x + speed * cos(angle)
            p.location.x = p.location.x + p.speed*Math.cos(p.angle*Math.PI/180);
            // New y = old y + speed * sin(angle)
            p.location.y = p.location.y + p.speed*Math.sin(p.angle*Math.PI/180);
            // You can read about vectors here:
            // http://physics.about.com/od/mathematics/a/VectorMath.htm
            if(p.location.x < 0) p.location.x = W;
            if(p.location.x > W) p.location.x = 0;
            if(p.location.y < 0) p.location.y = H;
            if(p.location.y > H) p.location.y = 0;
        }
    }
    setInterval(draw, 30);
}

function FileUploadAddons(){
    $('#bootstrapped-fine-uploader').fineUploader({
        template: 'qq-template-bootstrap',
        classes: {
            success: 'alert alert-success',
            fail: 'alert alert-error'
        },
        thumbnails: {
            placeholders: {
                waitingPath: "assets/waiting-generic.png",
                notAvailablePath: "assets/not_available-generic.png"
            }
        },
        request: {
            endpoint: '/uploads/handleaddons'
        },
        validation: {
            allowedExtensions: ['zip']
        }
    });
}

function FileUploadThemes(){
    $('#bootstrapped-fine-uploader').fineUploader({
        template: 'qq-template-bootstrap',
        classes: {
            success: 'alert alert-success',
            fail: 'alert alert-error'
        },
        thumbnails: {
            placeholders: {
                waitingPath: "assets/waiting-generic.png",
                notAvailablePath: "assets/not_available-generic.png"
            }
        },
        request: {
            endpoint: '/uploads/handlethemes'
        },
        validation: {
            allowedExtensions: ['zip']
        }
    });
}

function LoadFineUploader(callback){
    if (!$.fn.fineuploader){
        $.getScript('/layouts/backend/plugins/fineuploader/jquery.fineuploader-5.0.1.min.js', callback);
    }
    else {
        if (callback && typeof(callback) === "function") {
            callback();
        }
    }
}

function LoadSelect2Script(callback){
    if (!$.fn.select2){
        $.getScript('/layouts/backend/plugins/select2/select2.min.js', callback);
    }
    else {
        if (callback && typeof(callback) === "function") {
            callback();
        }
    }
}

function doSelects(){
    $("select:not(.no-select2)").select2();
}

function TinyMCEStart(elem, mode){
    var plugins = [];
    if (mode == 'extreme'){
        plugins = [ "advlist anchor autolink autoresize autosave bbcode charmap code contextmenu directionality ",
            "emoticons fullpage fullscreen hr image insertdatetime layer legacyoutput",
            "link lists media nonbreaking noneditable pagebreak paste preview print save searchreplace",
            "tabfocus table template textcolor visualblocks visualchars wordcount"]
    }
    tinymce.init({selector: elem,
        theme: "modern",
        plugins: plugins,
        //content_css: "css/style.css",
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
        style_formats: [
            {title: 'Header 2', block: 'h2', classes: 'page-header'},
            {title: 'Header 3', block: 'h3', classes: 'page-header'},
            {title: 'Header 4', block: 'h4', classes: 'page-header'},
            {title: 'Header 5', block: 'h5', classes: 'page-header'},
            {title: 'Header 6', block: 'h6', classes: 'page-header'},
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ]
    });
}

function SetMinBlockHeight(elem){
    elem.css('min-height', window.innerHeight - 50)
}

function notifyJs(data){
    $('<div class="alert alert-'+data.type+' alert-dismissible " role="alert"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'+data.text+'</div>').appendTo('#notifications-container');
}