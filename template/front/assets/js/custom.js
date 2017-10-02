/* ----------------- includes_bottom.php -----------------*/
    function set_loggers(){
        var state = check_login_stat('state');
        var name = check_login_stat('username');
        state.success(function (data) {
            if(data == 'hypass'){
                name.success(function (data) {
                    document.getElementById('loginsets').innerHTML = ''
                    +'    <li><a href="'+base_url+'index.php/home/profile/">'+data+'</a></li>'
                    +'    <li><a href="'+base_url+'index.php/home/logout/">'+xlat_logout+'</a></li>'
                    +'';
                });
                if($('body').find('.shopping-cart').length){
                    set_cart_form();
                }
            } else {
                /* removed sell button */
                document.getElementById('loginsets').innerHTML = ''
                +'    <li><a data-toggle="modal" data-target="#login" class="point">'+xlat_login+'</a></li>'
                +'    <li><a data-toggle="modal" data-target="#registration" class="point">'+xlat_registration+'</a></li>'
                +'';
            }
        });  
        //onclick="ajax_load('+"'<?php echo base_url(); ?>index.php/home/login_set/login','login')"+';"
        var cart = '';
        if($('body').find('.shopping-cart').length){
            cart = 'cart';
        }
        ajax_load(base_url+'index.php/home/login_set/registration/'+cart,'ajlup');
        ajax_load(base_url+'index.php/home/login_set/login/'+cart,'ajlin'); 
    }

    function check_login_stat(thing){
        return $.ajax({
            url: base_url+'index.php/home/check_login/'+thing
        });
    }

    function set_cart_form(){
        check_login_stat('langlat').success(function (data) { $('#langlat').val(data); });
        check_login_stat('username').success(function (data) { $('#name').val(data); });
        check_login_stat('email').success(function (data) { $('#email').val(data); });
        check_login_stat('surname').success(function (data) { $('#surname').val(data); });
        check_login_stat('phone').success(function (data) { $('#phone').val(data); });
        check_login_stat('address1').success(function (data) { $('#address_1').val(data); });
        /*check_login_stat('address2').success(function (data) { $('#address_2').val(data); });*/
        check_login_stat('city').success(function (data) { $('#city').val(data); });
        check_login_stat('zip').success(function (data) { $('#zip').val(data); });
    }
	
    function register(){
        setTimeout( function(){ 
            $('#regiss').click();
        }
        , 400 );
    }

    function signin(){
        setTimeout( function(){ 
            $('#loginss').click();
        }
        , 400 );
    }


/* ----------------- ajax_method.js -----------------*/
   function ajax_load_ext(url,id){//base_url+'index.php/home/cart/added_list/','added_list'
        if(id == "added_list"){
            if($('#counter').html() > 0){
                $('#cart_ul').mCustomScrollbar({theme:"minimal-dark"});
                //$('#cart_ul').mCustomScrollbar("update");
                update_calc();
            } else {//update_calc_ext()
                //$('#cart_ul').mCustomScrollbar("destroy");
                $('.badge-open').remove();
            }
        }
    }

	function ajax_load(url,id){
		var list = $('#'+id);
		$.ajax({
			url: url,
			beforeSend: function() {
				list.html('...'); // change submit button text
			},
			success: function(data) {
				list.html('');
				list.html(data).fadeIn();
				ajax_load_ext(url,id);
			},
			error: function(e) {
				console.log(e)
			}
		});
	}

	function notify(message,type,from,align){		
		$.notify({
			// options
			message: message 
		},{
			// settings
			type: type,
			placement: {
				from: from,
				align: align
		  	}
		});
		
	}

    function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
    }

    function form_validation(here){
                var valid = true;
                if(here.val() == ''){
                    if(!here.is('select')) here.css({borderColor: 'red'});
                    else if(here.is('select')) here.closest('div').find('.chosen-single').css({borderColor: 'red'});
                    here.closest('.input').find('.require_alert').remove();
                    here.closest('.input').append('<div class="require_alert" >*'+required+'</div>');
                    valid = false;
                }else {
                    if(!here.is('select')){
                        here.css({borderColor: 'green'});
                        here.closest('.input').find('.require_alert').remove();

                        if (here.attr('type') == 'email'){
                            if(!isValidEmailAddress(here.val())){
                                here.css({borderColor: 'red'});
                                here.closest('.input').find('.require_alert').remove();
                                here.closest('.input').append('<div class="require_alert" >'+mbe+'</div>');
                                valid = false;
                            }
                        }
                    }else if(here.is('select')){
                        here.closest('div').find('.chosen-single').css({borderColor: 'green'});
                        here.closest('.input').find('.require_alert').remove();
                     }
                }
                return valid;
    }

    $(document).ready(function() {

        $(".quick_view").fancybox({
            maxWidth    : 800,
            maxHeight   : 600,
            fitToView   : false,
            width       : '70%',
            height      : '70%',
            autoSize    : false,
            closeClick  : false,
            openEffect  : 'none',
            closeEffect : 'none'
        });
/*
        $('#quick_view').modal({
            show: false,
            remote: ''
        });
    
        $(".product_quick").on('click', function () {
            var link = $(this).data("href");
            $('#quick_view').removeData('bs.modal');
            $('#quick_view').modal({remote: link });
            $('#quick_view').modal('show');
        });
*/

        $('body').on('click', '.add_to_cart', function(){    
            var product = $(this).data('pid');
            var elm_type = $(this).data('type');
            var button = $(this);
            var alread = button.html();
            var type = 'pp';
            if(button.closest('.margin-bottom-40').find('.cart_quantity').length){/*not_used*/
                quantity = button.closest('.margin-bottom-40').find('.cart_quantity').val();
            }
            
            if($('#pnopoi').length){
                type = 'pp';
                var form = button.closest('form');
                var formdata = false;
                if (window.FormData){
                    formdata = new FormData(form[0]);
                }
                var option = formdata ? formdata : form.serialize();
            } else {/*not_used*/
                type = 'other';
                var form = $('#cart_form_singl');
                var formdata = false;
                if (window.FormData){
                    formdata = new FormData(form[0]);
                }
                var option = formdata ? formdata : form.serialize();
            }
            
            $.ajax({
                url         : base_url+'index.php/home/cart/add/'+product+'/'+type,
                type        : 'POST', // form submit method get/post
                dataType    : 'html', // request type html/json/xml
                data        : option, // serialize form data 
                cache       : false,
                contentType : false,
                processData : false,
                beforeSend: function() {
                    if(elm_type == 'text'){
                        button.html(xlat_adding_to_cart); // change submit button text
                    }
                },
                success: function(data) {
                    if(data == 'added'){    
                        //$('.add_to_cart').each(function(index, element) {
                            //if( $('body .add_to_cart').length ){
                                $('body .add_to_cart').each(function() {
                                    var h = $(this);
                                    if(h.data('pid') == product){
                                        if(h.data('type') == 'text'){
                                            h.removeClass("add_to_cart").addClass("added_to_cart"); 
                                            h.html('<i class="fa fa-shopping-cart"></i>'+xlat_added_to_cart).fadeIn();           
                                        } else if(h.data('type') == 'icon'){
                                            h.removeClass("add_to_cart").addClass("added_to_cart"); 
                                            h.html('<i class="fa fa-shopping-cart"></i>').fadeIn(); 
                                            h.attr('data-original-title', xlat_added_to_cart);  
                                        }
                                    }
                                });
                            //}
                        //});
                        /*if (button.hasClass("btn_cart")) {
                            button.removeClass("btn_cart");
                            button.addClass("btn_carted");
                        }*/
                        ajax_load(base_url+'index.php/home/cart/added_list/','added_list');
                        notify(product_added,'success','bottom','right');
                    } else if (data == 'shortage'){
                        button.html(alread);
                        notify(quantity_exceeds,'warning','bottom','right');
                    } else if (data == 'already'){
                        button.html(alread);
                        notify(product_already,'warning','bottom','right');
                    }
                },
                error: function(e) {
                    console.log(e)
                }
            });
        });

        $('body').on('click', '.wish_it', function(){
            var state = check_login_stat('state');
            var product = $(this).data('pid');
            var elm_type = $(this).data('type');
            var button = $(this);
            
            state.success(function (data) {
                if(data == 'hypass'){
                    $.ajax({
                        url: base_url+'index.php/home/wishlist/add/'+product,
                        beforeSend: function() {
                            if(elm_type == 'text'){
                                button.html(xlat_adding_to_wishlist ); // change submit button text
                            }
                        },
                        success: function(data) {
                            $('body .wish_it').each(function() {
                                var h = $(this);
                                if(h.data('pid') == product){
                                    if(h.data('type') == 'text'){
                                        h.removeClass("wish_it").addClass("wished_it");
                                        h.html('<i class="fa fa-heart"></i>'+xlat_added_to_wishlist).fadeIn();           
                                    } else if(h.data('type') == 'icon'){
                                        h.removeClass("wish_it").addClass("wished_it");
                                        h.html('<i class="fa fa-heart"></i>').fadeIn();  
                                        h.attr('data-original-title', xlat_added_to_wishlist); 
                                    }
                                }
                            });
                            notify(wishlist_add,'info','bottom','right');
                        },
                        error: function(e) {
                            console.log(e)
                        }
                    });
                } else {
                    signin();
                }
            });
        });

        /*
        $('body').on('click', '.btn_wish', function(){
            var state = check_login_stat('state');
            var product = $(this).data('pid');
            var button = $(this);
            state.success(function (data) {
                if(data == 'hypass'){
                    $.ajax({
                        url: base_url+'index.php/home/wishlist/add/'+product,
                        beforeSend: function() {
                            button.html(wishlist_adding); // change submit button text
                        },
                        success: function(data) {
                            button.removeClass("btn_wish");
                            button.addClass("btn_wished");
                            button.html(wishlist_add1);
                            notify(wishlist_add,'info','bottom','right');
                        },
                        error: function(e) {
                            console.log(e)
                        }
                    });
                } else {
                    signin();
                }
            });
        });*/

        $('body').on('click', '.remove_from_wish', function(){
            var product = $(this).data('pid');
            var button = $(this);
            $.ajax({
                url: base_url+'index.php/home/wishlist/remove/'+product,
                beforeSend: function() {
                    button.parent().parent().hide('fast');
                },
                success: function(data) {
                    ajax_load(base_url+'index.php/home/wishlist/num/','wishlist_num');
                    button.parent().parent().remove();
                    notify(wishlist_remove,'info','bottom','right');
                },
                error: function(e) {
                    console.log(e)
                }
            });
        });

        $('body').on('click', '#rate_it_btn', function(){
            var state = check_login_stat('state');
            state.success(function (data) {
                if(data == 'hypass'){
                    $('#product_rating li').each(function() {
                        $(this).hide('fast');
                    });
                    $('#star_rating').show('slow');
                } else {
                    signin();
                }
            });
        });
      
        $('body').on('click', '.rate_it', function(){
            var state = check_login_stat('state');
            var product = $(this).closest('.stars-ratings').data('pid');
            var rating = $(this).data('rate');
            var button = $(this);
            
            state.success(function (data) {
                if(data == 'hypass'){
                    $.ajax({
                        url: base_url+'index.php/home/rating/'+product+'/'+rating,
                        beforeSend: function() {
                        },
                        success: function(data) {
                            if(data == 'success'){
                                notify(rated_success,'info','bottom','right');
                            } else if(data == 'failure'){
                                notify(rated_fail,'alert','bottom','right');
                            } else if(data == 'already'){
                                notify(rated_already,'info','bottom','right');
                            }
                        },
                        error: function(e) {
                            console.log(e)
                        }
                    });
                } else {
                    signin();
                }
            });
        });
        
        $('body').on('click', '.subscriber', function(){
            var here = $(this); // alert div for show alert message
            var text = here.html(); // alert div for show alert message
            var form = here.closest('form');
            var email = form.find('#subscr').val();
            if(isValidEmailAddress(email)){
                //var form = $(this);
                var formdata = false;
                if (window.FormData){
                    formdata = new FormData(form[0]);
                }
                $.ajax({
                    url: form.attr('action'), // form action url
                    type: 'POST', // form submit method get/post
                    dataType: 'html', // request type html/json/xml
                    data: formdata ? formdata : form.serialize(), // serialize form data 
                    cache       : false,
                    contentType : false,
                    processData : false,
                    beforeSend: function() {
                        here.addClass('disabled');
                        here.html(working); // change submit button text
                    },
                    success: function(data) {
                        here.fadeIn();
                        here.html(text);
                        here.removeClass('disabled');
                        if(data == 'done'){
                            notify(subscribe_success,'info','bottom','right');
                        } else if(data == 'already'){
                            notify(subscribe_already,'warning','bottom','right');
                        } else if(data == 'already_session'){
                            notify(subscribe_sess,'warning','bottom','right');
                        } else {
                            notify(data,'warning','bottom','right');
                        }
                    },
                    error: function(e) {
                        console.log(e)
                    }
                });
            } else {
                notify(mbe,'warning','bottom','right');
            }
        });
        
        $('body').on('click','.login_btn',function(){
            var here = $(this); // alert div for show alert message
            var text = here.html(); // alert div for show alert message
            var form = here.closest('form');
            var can = true;

            //var form = $(this);
            var formdata = false;
            if (window.FormData){
                formdata = new FormData(form[0]);
            }

            form.find(".required").each(function(){
                var here = $(this);
                can = form_validation(here);
                if(can == false){
                    return false;
                }
            });

            if(can){
                $.ajax({
                    url: form.attr('action'), // form action url
                    type: 'POST', // form submit method get/post
                    dataType: 'html', // request type html/json/xml
                    data: formdata ? formdata : form.serialize(), // serialize form data 
                    cache       : false,
                    contentType : false,
                    processData : false,
                    beforeSend: function() {
                        here.addClass('disabled');
                        here.html(logging); // change submit button text
                    },
                    success: function(data) {
                        here.fadeIn();
                        here.html(text);
                        here.removeClass('disabled');
                        if(data == 'done'){
                            notify(login_success,'info','bottom','right');
                            here.closest('.modal-content').find('#close_log_modal').click();
                            set_loggers();
                        } else if(data == 'failed'){
                            here.closest('.modal-content').find('#close_log_modal').click();
                            notify(login_fail,'warning','bottom','right');
                        } else {
                            notify(data,'warning','bottom','right');
                        }
                    },
                    error: function(e) {
                        console.log(e)
                    }
                });
            } else {
                return false;
            }
        });

        $("body").on('change','#login_form .required',function(){
            var here = $(this);
            form_validation(here);
        });

       /* 
        $('body').on('click','.logup_btn', function(){

            //alert('vdv');
            var here = $(this); // alert div for show alert message
            var form = here.closest('form');
            var can = '';
            var ing = here.data('ing');
            var msg = here.data('msg');
            var prv = here.html();
            
            
            form.find('.summernotes').each(function() {
                var now = $(this);
                now.closest('div').find('.val').val(now.code());
            });
            
            var form = $(this);
            var formdata = false;
            if (window.FormData){
                formdata = new FormData(form[0]);
            }

            var a = 0;
            var take = '';
            form.find(".required").each(function(){
                var txt = '*'+required;
                a++;
                if(a == 1){
                    take = 'scroll';
                }
                var here = $(this);
                if(here.val() == ''){
                    if(!here.is('select')){
                        here.css({borderColor: 'red'});
                        if(here.attr('type') == 'number'){
                            txt = '*'+mbn;
                        }
                        
                        if(here.closest('.input').find('.require_alert').length){

                        } else {
                            here.closest('.input').append('<div id="'+take+'" class="require_alert" >'+txt+'</div>');
                            //here.closest('.input').append('<div class="require_alert" >'+txt+'</div>');
                        }
                    } else if(here.is('select')){
                        here.closest('div').find('.chosen-single').css({borderColor: 'red'});
                        if(here.closest('.input').find('.require_alert').length){

                        } else {
                            here.closest('.input').append(''
                                +'  <div id="'+take+'" class="require_alert" >'
                                +'      '+txt
                                +'  </span>'
                            );
                        }

                    }

                    var scroll_top = $("#scroll").offset().top - 100;
                    $('html, body').animate({scrollTop: scroll_top}, '500');
                    can = 'no';
                }

                if (here.attr('type') == 'email'){
                    if(!isValidEmailAddress(here.val())){
                        here.css({borderColor: 'red'});
                        if(here.closest('.input').find('.require_alert').length){
                            
                        } else {
                            here.closest('.input').append('<div id="'+take+'" class="require_alert" >'+mbe+'</div>');
                        }
                        can = 'no';
                    }
                }
                take = '';
            });

            if(can !== 'no'){
                $.ajax({
                    url: form.attr('action'), // form action url
                    type: 'POST', // form submit method get/post
                    dataType: 'html', // request type html/json/xml
                    data: formdata ? formdata : form.serialize(), // serialize form data 
                    cache       : false,
                    contentType : false,
                    processData : false,
                    beforeSend: function() {
                        here.html(ing); // change submit button text
                    },
                    success: function(data) {
                        here.fadeIn();
                        here.html(prv);
                        if(data == 'done'){
                            here.closest('.modal-content').find('#close_logup_modal').click();
                            notify(logup_success,'success','bottom','right');          
                        } else {
                            here.closest('.modal-content').find('#close_logup_modal').click();
                            notify(logup_fail+'<br>'+data,'warning','bottom','right');
                        }
                    },
                    error: function(e) {
                        console.log(e)
                    }
                });
            } else {
                return false;
            }
        });*/


        $('body').on('click','.logup_btn', function(){
            var here = $(this); // alert div for show alert message
            var form = here.closest('form');
            var can = true;
            var pw = true;
            var ing = here.data('ing');
            var msg = here.data('msg');
            var prv = here.html();

            var formdata = false;
            if (window.FormData){
                formdata = new FormData(form[0]);
            }

            form.find(".required").each(function(){
                var here = $(this);
                can = form_validation(here);
                if(can == false){
                    return false;
                }
                /*
                if(here.val() == ''){
                    if(!here.is('select')) here.css({borderColor: 'red'});
                    else if(here.is('select')) here.closest('div').find('.chosen-single').css({borderColor: 'red'});
                    here.closest('.input').find('.require_alert').remove();
                    here.closest('.input').append('<div class="require_alert" >*'+required+'</div>');
                    can = 'no';
                }else {
                    if (here.attr('type') == 'email'){
                        if(!isValidEmailAddress(here.val())){
                            here.css({borderColor: 'red'});
                            here.closest('.input').find('.require_alert').remove();
                            here.closest('.input').append('<div class="require_alert" >'+mbe+'</div>');
                            can = 'no';
                        }
                    }
                }*/
            });

            pw = pw_validation();

            if(can){
                if(pw){
                    $.ajax({
                        url: form.attr('action'), // form action url
                        type: 'POST', // form submit method get/post
                        dataType: 'html', // request type html/json/xml
                        data: formdata ? formdata : form.serialize(), // serialize form data 
                        cache       : false,
                        contentType : false,
                        processData : false,
                        beforeSend: function() {
                            here.html(ing); // change submit button text
                        },
                        success: function(data) {
                            here.fadeIn();
                            here.html(prv);
                            if(data == 'done'){
                                here.closest('.modal-content').find('#close_logup_modal').click();
                                notify(logup_success,'success','bottom','right');          
                            } else {
                                here.closest('.modal-content').find('#close_logup_modal').click();
                                notify(logup_fail+'<br>'+data,'warning','bottom','right');
                            }
                        },
                        error: function(e) {
                            console.log(e)
                        }
                    });
                } else {
                    return false;
                }
            } else {
                return false;
            }
        });
                     
        $("body").on('change','#logup_form .required',function(){
            var here = $(this);
            form_validation(here);
        });

        $("body").on('click','.forget_btn',function(){
            var here = $(this); // alert div for show alert message
            var text = here.html(); // alert div for show alert message
            var form = here.closest('form');
            var can = true;

            //var form = $(this);
            var formdata = false;
            if (window.FormData){
                formdata = new FormData(form[0]);
            }

            form.find(".required").each(function(){
                var here = $(this);
                can = form_validation(here);
                if(can == false){
                    return false;
                }
            });

            if(can){
                $.ajax({
                    url: form.attr('action'), // form action url
                    type: 'POST', // form submit method get/post
                    dataType: 'html', // request type html/json/xml
                    data: formdata ? formdata : form.serialize(), // serialize form data 
                    cache       : false,
                    contentType : false,
                    processData : false,
                    beforeSend: function() {
                        here.addClass('disabled');
                        here.html(submitting); // change submit button text
                    },
                    success: function(data) {
                        here.fadeIn();
                        here.html(text);
                        here.removeClass('disabled');
                        if(data == 'email_sent'){
                            here.closest('.modal-content').find('#close_log_modal').click();
                            notify(email_sent,'info','bottom','right');
                        } else if(data == 'email_nay'){
                            here.closest('.modal-content').find('#close_log_modal').click();
                            notify(email_noex,'info','bottom','right');
                        } else if(data == 'email_not_sent'){
                            here.closest('.modal-content').find('#close_log_modal').click();
                            notify(email_fail,'info','bottom','right');
                        } else {
                            notify(data,'warning','bottom','right');
                        }
                    },
                    error: function(e) {
                        console.log(e)
                    }
                });
            }else {
                return false;
            }
        });

        $("body").on('change','#forget_form .required',function(){
            var here = $(this);
            form_validation(here);
        });

    });






/* ----------------- added_list.js -----------------*/
    function remove_from_cart(rowid){
        return $.ajax({
            url: base_url+'index.php/home/cart/remove_one/'+rowid
        });
    }

    function update_calc(){
        
        var url = base_url+'index.php/home/cart/calcs/full';
        var total = $('#scroll_total');
        var ship = $('#scroll_ship');
        var tax = $('#scroll_tax');
        var grand = $('#scroll_grand');
        var count = $('#counter');

        $.ajax({
            url: url,
            beforeSend: function() {
                total.html('...'); 
                ship.html('...'); 
                tax.html('...'); 
                grand.html('...'); 
                count.html('...');
            },
            success: function(data) {
                var res = data.split('-');
                total.html(res[0]).fadeIn(); 
                ship.html(res[1]).fadeIn(); 
                tax.html(res[2]).fadeIn(); 
                grand.html(res[3]).fadeIn(); 
                count.html(res[4]).fadeIn();
                update_calc_ext();
            },
            error: function(e) {
                console.log(e)
            }
        });
    }

    function update_calc_ext(){
        if($('#counter').html() == '0'){
            //$('#cart_ul').mCustomScrollbar("destroy");
            $('.badge-open').remove();
        }
    }

/*
    jQuery(document).ready(function ($) {
        "use strict";
        $('#cart_ul').mCustomScrollbar({
                theme:"minimal-dark"
            });
        update_calc();
    });*/

    $(document).ready(function() {
        $('#added_list').on('click', '#empty', function(){
            ajax_load(base_url+'index.php/home/cart/empty/','cart_ul');
            $('#counter').html('0');
            if( $('.cart_list').length ){
                $('.cart_list').find('tbody').html('');
                $('#total').html('...');
                $('#grand').html('...');
            }
            if( $('body .added_to_cart').length ){
                $('body .added_to_cart').each(function() {
                    var h = $(this);
                    if(h.data('type') == 'text'){
                        h.removeClass("added_to_cart").addClass("add_to_cart"); 
                        h.html('<i class="fa fa-cart-plus"></i>'+xlat_add_to_cart).fadeIn();                 
                    } else if(h.data('type') == 'icon'){
                        h.removeClass("added_to_cart").addClass("add_to_cart"); 
                        h.html('<i class="fa fa-cart-plus"></i>').fadeIn();     
                        h.attr('data-original-title', xlat_add_to_cart);            
                    }
                });
            }
            update_calc_ext();
            notify(cart_emptied,'success','bottom','right');
        });

        $('#added_list').on('click', '.remove_from_cart', function(){
            var here = $(this);
            var rowid = here.data('rowid');
            var pid = here.data('pid');
            here.closest('li').hide('fast');
            var removal = remove_from_cart(rowid);
            removal.success(function (data) {
                //$(".table").find("[data-rowid='" + rowid + "']").closest('tr').hide('fast');

                if( $('body .added_to_cart').length ){
                    $('body .added_to_cart').each(function() {
                        var h = $(this);
                        if(h.data('pid') == pid){
                            if(h.data('type') == 'text'){
                                h.removeClass("added_to_cart").addClass("add_to_cart"); 
                                h.html('<i class="fa fa-cart-plus"></i>'+xlat_add_to_cart).fadeIn();                
                            } else if(h.data('type') == 'icon'){
                                h.removeClass("added_to_cart").addClass("add_to_cart"); 
                                h.html('<i class="fa fa-cart-plus"></i>').fadeIn();   
                                h.attr('data-original-title', xlat_add_to_cart);  
                            }
                        }
                    });
                }

                update_calc();
                notify(cart_product_removed,'success','bottom','right');
            });
        });

    });


/* ----------------- login.php -----------------*/

    function set_html(hide,show){
        $('.'+show).show('fast');
        $('.'+hide).hide('fast');
    }

/* ----------------- logup.php -----------------*/
    $(document).ready(function() {
  
    });


/* ----------------- product_view.php -----------------*/
    function load_share(){
        $('#share').share({
            networks: ['facebook','googleplus','twitter','linkedin','tumblr','in1','stumbleupon','digg'],
            theme: 'square'
        });
    }

/* ----------------- featured_list.php -----------------*/  
    
/* ----------------- product_list.js -----------------*/
    function toggle_subs(cat){
        $('.sub_cat').hide('fast');
        $("#subs_"+cat).show('fast');
    }
    
    function sub_clear(){
        $(".check_sub_category").each(function(){
             this.checked = false;
        });
    }

    function avs(category, sub_category, min, max, text){
        var range_script = $('#range_script');
        $.ajax({
            url: base_url+'index.php/home/others/get_range_by_cat/'+category+'/'+min+'/'+max,
            beforeSend: function() {
                range_script.html('...');
            },
            success: function(data) {
                //window.now = now;
                range_script.html(data);

                //if(now == 'first'){
                    filter('click',category,sub_category,'0');
                //} else {
                //    filter('click','none','none','0');
                //}
            },
            error: function(e) {
                console.log(e)
            }
        });
    }

    $(document).ready(function() {   

        $('body').on('click', '.srch', function(){
            filter('click','none','none','0');
        });

        $('body').on('click', '.check_category', function(){    
            var category_set = [];
            $(".check_category:checked").each(function(){
                 if(this.checked == true){
                    category_set.push(this.value);
                 }
            });
            var category = category_set.toString();
            var sub_category = '';
            if(category != 0){
                sub_category = 'none';
            }
            avs(category, sub_category,'','','');
        });

        $('body').on('click', '.viewers', function(){
            $("#viewtype").val($(this).data('typ'));
            filter('click','none','none','0');
        });

        $('body').on('click', '.check_vendor', function(){
            var category_set = [];
            $(".check_category:checked").each(function(){
                 if(this.checked == true){
                    category_set.push(this.value);
                 }
            });
            var category = category_set.toString();
            var sub_category = '';
            if(category != 0){
                sub_category = 'none';
            }
            avs(category, sub_category,'','','');
        });
    });
    
    function filter(set,cat,subcat,page){
        var height = $( window ).height();
        var results = $('#list'); 
        var form = $('#plistform');
        var type = $("#viewtype").val();
        var fload = $("#fload").val();   

        var category_set = [];
        var sub_category_set = [];
        var vendor_set = [];

        var category = '';
        var sub_category = '';
        var vendor = '';
        
        if(cat !== 'none'){
            category = cat;
        } else{
            $(".check_category:checked").each(function(){
                 if(this.checked == true){
                    category_set.push(this.value);
                 }
            });
            category = category_set.toString();
        }

        if(subcat !== 'none'){
            sub_category = subcat;
        } else{
            $(".check_sub_category:checked").each(function(){
                if(this.checked == true){
                    sub_category_set.push(this.value);
                 }
            });
            sub_category = sub_category_set.toString();
        }

        if($('.check_vendor').length){
            $(".check_vendor:checked").each(function(){
                 if(this.checked == true){
                    vendor_set.push(this.value);
                 }
            });
            vendor = vendor_set.toString();
        }

        /*
        $(".check_category").each(function(){
            if(this.checked == false){
                $("#subs_"+this.value+" li input:radio").removeAttr("checked");
                $("#subs_"+this.value).hide('fast');
             }
        });*/
        
        var range_min = $('#range_min').html();
        var range_max = $('#range_max').html();
        var trxt = $('#txtr').val();   
        var featured = $('#featuredaa').val();

        $('#categoryaa').val(category);
        $('#sub_categoryaa').val(sub_category);
        $('#range_minaa').val(range_min);
        $('#range_maxaa').val(range_max);
        $('#search_text').val(trxt);
        $('#featuredaa').val(featured);
        if($('.check_vendor').length){
            $('#vendoraa').val(vendor);
        }

        //var form = $(this);
        var formdata = false;
        if (window.FormData){
            formdata = new FormData(form[0]);
        }
                
        $.ajax({
            url: form.attr('action')+set+'/'+page+'/'+type,
            type: 'POST',
            dataType: 'html',
            data: formdata ? formdata : form.serialize(),
            cache       : false,
            contentType : false,
            processData : false,
            beforeSend: function() {
                results.html(''
                +'<div style="height:'+height+'px; width:100%;">'
                +'  <img style="top:'+(height/3)+'px; left:45%; position:relative;"' 
                +'      src="'+base_url+'uploads/others/loader.gif" />'
                +'<div>');
            },
            success: function(data) {
                results.html(data);
                if(fload == 'done'){
                    //history.pushState('data', '', base_url+'index.php/home/category/'+category);
                }
                $("#fload").val('done');
                $(".pagination li a").attr("href", "#")

            },
            error: function(e) {
                console.log(e)
            }
        });
        
    }
    
                
/* ----------------- cart.js -----------------*/
                    function update_calc_cart(){
                        var url = base_url+'index.php/home/cart/calcs/full';
                        var total = $('#total');
                        var ship = $('#shipping');
                        var tax = $('#tax');
                        var grand = $('#grand');

                        $.ajax({
                            url: url,
                            beforeSend: function() {
                                total.html('...'); 
                                ship.html('...'); 
                                tax.html('...'); 
                                grand.html('...'); 
                            },
                            success: function(data) {
                                var res = data.split('-');
                                total.html(res[0]).fadeIn(); 
                                ship.html(res[1]).fadeIn(); 
                                tax.html(res[2]).fadeIn(); 
                                grand.html(res[3]).fadeIn(); 
                                //other_action();
                            },
                            error: function(e) {
                                console.log(e)
                            }
                        });
                    }

                    function check_ok(element){
                        var here = $(element);
                        here.closest('td').find('.minus').click();
                        here.closest('td').find('.plus').click();
                    }

                    function cart_submission(){
                        //var payment_type = $('#ab').val();
                        var payment_type = '';
                        var state = check_login_stat('state');
                        state.success(function (data) {
                            if(data == 'hypass'){
                                 var form = $('#cart_form');
                                 form.submit();
                            } else {
                                //$('#loginss').click();
                                signin();
                                //$('#login_form').attr('action',base_url+'index.php/home/login/do_login/nlog');
                                //$('#logup_form').attr('action',base_url+'index.php/home/registration/add_info/nlog');
                            }
                        });
                    }

                    function update_prices(){
                        var url = base_url+'index.php/home/cart/calcs/prices';
                        $.ajax({
                            url: url,
                            dataType: 'json', 
                            beforeSend: function() {

                            },
                            success: function(data) {
                                $.each(data, function(key, item) {
                                    var elem = $("table").find("[data-rowid='" + item.id + "']");
                                    elem.find('.sub_total').html(item.subtotal);
                                    elem.find('.pric').html(item.price);
                                });
                            },
                            error: function(e) {
                                console.log(e)
                            }
                        });
                    }

                    function set_cart_map(){
                        //$('#maps').animate({ height: '400px' }, 'easeInOutCubic', function(){});
                        initialize();
                        var address = [];
                        //$('#pos').show('fast');
                        //$('#lnlat').show('fast');
                        $('.address').each(function(index, value){
                            if(this.value !== ''){
                                address.push(this.value);
                            }
                        });
                        address = address.toString();
                        deleteMarkers();
                        geocoder.geocode( { 'address': address}, function(results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                if($('#langlat').val().indexOf(',')  == -1 || $('#first').val() == 'no'){
                                    deleteMarkers();
                                    var location = results[0].geometry.location; 
                                    var marker = addMarker(location);
                                    map.setCenter(location);
                                    $('#langlat').val(location);
                                } else if($('#langlat').val().indexOf(',')  >= 0){
                                    deleteMarkers();
                                    var loca = $('#langlat').val();
                                    loca = loca.split(',');
                                    var lat = loca[0].replace('(','');
                                    var lon = loca[1].replace(')','');
                                    var marker = addMarker(new google.maps.LatLng(lat, lon));
                                    map.setCenter(new google.maps.LatLng(lat, lon));
                                }
                                if($('#first').val() == 'yes'){
                                    $('#first').val('no');
                                }
                                // Add dragging event listeners.
                                google.maps.event.addListener(marker, 'drag', function() {
                                    $('#langlat').val(marker.getPosition());
                                });
                            }
                        }); 
                    }

                    function initialize() {
                        geocoder = new google.maps.Geocoder();
                        var latlng = new google.maps.LatLng(-34.397, 150.644);
                        var mapOptions = {
                            zoom: 14,
                            center: latlng
                        }
                        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                        google.maps.event.addListener(map, 'click', function(event) {
                            deleteMarkers();
                            var marker = addMarker(event.latLng);
                            $('#langlat').val(event.latLng);    
                            // Add dragging event listeners.
                            google.maps.event.addListener(marker, 'drag', function() {
                                $('#langlat').val(marker.getPosition());
                            });
                            
                        });     
                    }

        // Add a marker to the map and push to the array.
        function addMarker(location) {
            var image = {
                url: base_url+'uploads/others/marker.png',
                size: new google.maps.Size(40, 60),
                origin: new google.maps.Point(0,0),
                anchor: new google.maps.Point(20, 62)
            };

            var shape = {
                coords: [1, 5, 15, 62, 62, 62, 15 , 5, 1],
                type: 'poly'
            };

            var marker = new google.maps.Marker({
                position: location,
                map: map,
                draggable:true,
                icon: image,
                shape: shape,
                animation: google.maps.Animation.DROP
            });
            markers.push(marker);
            return marker;
        }

        // Deletes all markers in the array by removing references to them.
        function deleteMarkers() {
            clearMarkers();
            markers = [];
        }

        // Sets the map on all markers in the array.
        function setAllMap(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }

        // Removes the markers from the map, but keeps them in the array.
        function clearMarkers() {
            setAllMap(null);
        }
        //google.maps.event.addDomListener(window, 'load', initialize);

                    $(document).ready(function() {   

                        $('body').on('click', '.shopping-cart .coupon_btn', function(){
                            var txt = $(this).html();
                            var code = $('.coupon_code').val();
                            $('#coup_frm').val(code);
                            var form = $('#coupon_set');
                            var formdata = false;
                            if (window.FormData){
                                formdata = new FormData(form[0]);
                            }
                            var datas = formdata ? formdata : form.serialize();
                            $.ajax({
                                url: base_url+'index.php/home/coupon_check/',
                                type        : 'POST', // form submit method get/post
                                dataType    : 'html', // request type html/json/xml
                                data        : datas, // serialize form data 
                                cache       : false,
                                contentType : false,
                                processData : false,
                                beforeSend: function() {
                                    $(this).html(applying);
                                },
                                success: function(result){
                                    if(result == 'nope'){
                                        notify(coupon_not_valid,'warning','bottom','right');
                                    } else {
                                        var re = result.split(':-:-:');
                                        var ty = re[0];
                                        var ts = re[1];
                                        notify(coupon_discount_successful,'success','bottom','right');
                                        if(ty == 'total'){
                                            $(".coupon_disp").show();
                                            $("#disco").html(re[2]);
                                        }
                                        $("#coupon_report").html('<h3>'+ts+'</h3>');
                                        //update_calc_cart();
                                        //update_prices();
                                    }
                                }
                            });
                        });

                        /*$('body').on('click', '.colrs', function(){
                            var here = $(this);
                            var rowid = here.closest('tr').data('rowid');
                            var val = here.closest('li').find('input').val();
                            if(val == 'undefined'){
                                val = '';
                            }
                            val = val.split(",").join("-");
                            val = val.replace(')','--');
                            val = val.replace('(','---');

                            $.ajax({
                                url: base_url+'index.php/home/cart/upd_color/'+rowid+'/'+val,
                                beforeSend: function() {
                                },
                                success: function() {
                                    //other option
                                    ajax_load(base_url+'index.php/home/cart/added_list/','added_list');
                                },
                                error: function(e) {
                                    console.log(e)
                                }
                            });
                        });*/

                        $('body').on('click', '.shopping-cart .close', function(){
                            var here = $(this);
                            var rowid = here.closest('tr').find('.quantity_field').data('rowid');
                            var thetr = here.closest('tr');
                            var list1 = $('#total');
                            $.ajax({
                                url: base_url+'index.php/home/cart/remove_one/'+rowid,
                                beforeSend: function() {
                                    list1.html('...');
                                },
                                success: function(data) {
                                    list1.html(data).fadeIn();
                                    ajax_load(base_url+'index.php/home/cart/added_list/','added_list');
                                    notify(cart_product_removed,'success','bottom','right');
                                    update_calc_cart();
                                    thetr.hide('fast');
                                },
                                error: function(e) {
                                    console.log(e)
                                }
                            });
                        });

                        $('body').on('click', '.shopping-cart .quantity-button', function(){
                            var here = $(this);
                            var quantity = here.closest('td').find('.quantity_field').val();
                            var limit = here.closest('td').find('.quantity_field').data('limit');
                            if(here.val()=='minus'){
                                quantity = quantity-1;
                            } else if (here.val()=='plus'){
                                //if(limit == 'no'){
                                    quantity = Number(quantity)+1;
                               // }
                            }
                            if(quantity >= 1){
                                here.closest('td').find('.quantity_field').val(quantity);

                                var rowid = here.closest('td').find('.quantity_field').data('rowid');
                                var lim_t = here.closest('tr').find('.limit');
                                var list1 = here.closest('tr').find('.sub_total');

                                $.ajax({
                                    url: base_url+'index.php/home/cart/quantity_update/'+rowid+'/'+quantity,
                                    beforeSend: function() {
                                        list1.html('...'); 
                                    },
                                    success: function(data) {
                                        var res = data.split("---")
                                        list1.html(res[0]).fadeIn();
                                        ajax_load(base_url+'index.php/home/cart/added_list/','added_list');
                                        update_calc_cart();
                                        if(res[1] !== 'not_limit'){
                                            lim_t.html('!!').fadeIn();
                                            here.closest('td').find('.plus').hide();
                                            here.closest('td').find('.quantity_field').data('limit','yes');
                                            here.closest('td').find('.quantity_field').val(res[1]);
                                        } else {
                                            lim_t.html('').fadeOut();
                                            here.closest('td').find('.plus').show();
                                            here.closest('td').find('.quantity_field').data('limit','no');
                                        }
                                    },
                                    error: function(e) {
                                        console.log(e)
                                    }
                                });
                            }
                        });

                        $('body').on('blur', '.shopping-cart .address', function(){
                            set_cart_map();
                        });


                    });

/* ----------------- contact.js -----------------*/
function contact_initialize_map() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-34.397, 150.644);
    var mapOptions = {
        zoom: 14,
            center: latlng
    }
    map = new google.maps.Map(document.getElementById('contact_map'), mapOptions);
}

$(document).ready(function() {
    $('body').on('click','#contact_form .submittertt', function(){
        //alert('vdv');
        var here = $(this); // alert div for show alert message
        var form = here.closest('form');
        var can = true;
        var ing = here.data('ing');
        var msg = here.data('msg');
        var prv = here.html();

        var formdata = false;
        if (window.FormData){
            formdata = new FormData(form[0]);
        }

        form.find(".required").each(function(){
            var here = $(this);
            can = form_validation(here);
            if(can == false){
                return false;
            }
        });

        if(can){
            $.ajax({
                url: form.attr('action'), // form action url
                type: 'POST', // form submit method get/post
                dataType: 'html', // request type html/json/xml
                data: formdata ? formdata : form.serialize(), // serialize form data 
                cache       : false,
                contentType : false,
                processData : false,
                beforeSend: function() {
                    here.html(ing); // change submit button text
                },
                success: function(data) {
                    here.fadeIn();
                    here.html(prv);
                    if(data == 'sent'){
                        notify(sent,'success','bottom','right');
                    } else if (data == 'incor'){
                        notify(incor,'warning','bottom','right');
                    } else {
                        notify(data,'warning','bottom','right');
                    }
                },
                error: function(e) {
                    console.log(e)
                }
            });
        } else {
            return false;
        }
    });

    $('body').on('change','#contact_form .required',function(){
        var here = $(this);
        form_validation(here);
    });
});

/* ----------------- profile.js -----------------*/
    function pw_validation(){
        var valid = true;
        var pass1 = $(".pass1").val();
        var pass2 = $(".pass2").val();
        if(pass1 !== pass2){
            $("#pass_note").html('<div class="require_alert" >*'+mismatch+'</div>');
            valid = false;
        } else if(pass1 == pass2){
            $("#pass_note").html('');
            valid = true;
        }
        return valid;
    }

$(document).ready(function() {
    $('body').on('click','#update_info_form .submitter', function(){
        var here = $(this); // alert div for show alert message
        var form = here.closest('form');
        var can = true;
        var ing = here.data('ing');
        var msg = here.data('msg');
        var prv = here.html();
        
        var formdata = false;
        if (window.FormData){
            formdata = new FormData(form[0]);
        }

        form.find(".required").each(function(){
            var here = $(this);
            can = form_validation(here);
            if(can == false){
                return false;
            }
        });

        if(can){
            $.ajax({
                url: form.attr('action'), // form action url
                type: 'POST', // form submit method get/post
                dataType: 'html', // request type html/json/xml
                data: formdata ? formdata : form.serialize(), // serialize form data 
                cache       : false,
                contentType : false,
                processData : false,
                beforeSend: function() {
                    here.html(ing); // change submit button text
                },
                success: function(data) {
                    here.fadeIn();
                    here.html(prv);
                    if(data == ''){
                        notify(msg,'info','bottom','right');
                    } else if(data == 'pass_prb') {
                        notify(incor_pw,'info','bottom','right');
                    }
                },
                error: function(e) {
                    console.log(e)
                }
            });
        } else {
            return false;
        }
    });

    $('body').on('change','#update_info_form .required',function(){
        var here = $(this);
        form_validation(here);
    });

    $('body').on('click','#update_pw_form .submitter', function(){
        var here = $(this); // alert div for show alert message
        var form = here.closest('form');
        var can = true;
        var pw = true;
        var ing = here.data('ing');
        var msg = here.data('msg');
        var prv = here.html();
        
        var formdata = false;
        if (window.FormData){
            formdata = new FormData(form[0]);
        }

        form.find(".required").each(function(){
            var here = $(this);
            can = form_validation(here);
            if(can == false){
                return false;
            }
        });

        pw = pw_validation();

        if(can){
            if(pw){
                $.ajax({
                    url: form.attr('action'), // form action url
                    type: 'POST', // form submit method get/post
                    dataType: 'html', // request type html/json/xml
                    data: formdata ? formdata : form.serialize(), // serialize form data 
                    cache       : false,
                    contentType : false,
                    processData : false,
                    beforeSend: function() {
                        here.html(ing); // change submit button text
                    },
                    success: function(data) {
                        here.fadeIn();
                        here.html(prv);
                        if(data == ''){
                            notify(msg,'info','bottom','right');
                        } else if(data == 'pass_prb') {
                            notify(incor_pw,'info','bottom','right');
                        }
                    },
                    error: function(e) {
                        console.log(e)
                    }
                });
            } else {
                return false;
            }
        } else {
            return false;
        }
    });

    $('body').on('change','#update_pw_form .required',function(){
        var here = $(this);
        form_validation(here);
    });

/*  $('body').on('click', '.download_it', function(){
        var here = $(this);
        var id = here.data('pid');
        var txt = here.html();
        $.ajax({
            url: base_url+'index.php/home/can_download/'+id,
            beforeSend: function() {
                $(this).html(downloading);
            },
            success: function(data) {
                if(data == 'not'){
                    notify("<?php echo translate('download_permission_denied'); ?>",'warning','bottom','right');
                } else {
                    window.location =""+base_url+'index.php/home/download/'+id+"";
                }
                here.html(txt);
            },
            error: function(e) {
                console.log(e)
            }
        });
    });*/

    $('body').on('blur', '.pass', function(){
        pw_validation();
    });
});



