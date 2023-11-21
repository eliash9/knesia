function FormValidation(){
	"use strict";
	var home_page=document.forms['myform'].home_page.value;
	var other_page=document.forms['myform'].other_page.value;
	var head_line=document.forms['myform'].head_line.value;
	var details_news=document.forms['myform'].details_news.value;
	var reference=document.forms['myform'].reference.value;	
	var image = document.forms['myform'].file_select_machin.value;
	var picture_name = document.forms['myform'].picture_name.value;
	
	
	if(home_page==0 && other_page==0){

		alert('Please Choose Home or Other page');
		document.forms['myform'].home_page.style.background = 'Yellow';
		document.forms['myform'].other_page.style.background = 'Yellow';
		document.forms['myform'].other_page.focus();
		return false;
	}		
		
	if(head_line==''){

		alert('Please enter head line');
		document.forms['myform'].head_line.style.background = 'Yellow';
		document.forms['myform'].head_line.focus();
		return false;
	}	
		
	if(image!='' && picture_name==''){

		alert('Please enter picture name');
		document.forms['myform'].picture_name.style.background = 'Yellow';
		document.forms['myform'].picture_name.focus();
		return false;
	}	
		
}

	
function change_color( v_id, origColor ) {
	"use strict";

	$("#tr_"+v_id).css('cursor','pointer');
	var x=document.getElementById("tr_"+v_id);
	var newColor = 'lime';
	if ( x.style ) {
	x.style.backgroundColor = ( newColor == x.style.backgroundColor )? origColor : newColor;
	}
}

// flowing function is used to select all checkbox start
function Select(pbaction){
	"use strict";

		if(pbaction=='true')
		{
			var inputs = document.querySelectorAll("input[type='checkbox']");
			for(var i = 0; i < inputs.length; i++) {
			inputs[i].checked = true;
			}
			document.getElementById('buttons').innerHTML="<input type=\"checkbox\" checked=\"checked\" onclick=\"Select('false');\" />";
		}
		
		if(pbaction=='false')
		{
			var inputs = document.querySelectorAll("input[type='checkbox']");
			for(var i = 0; i < inputs.length; i++) {
			inputs[i].checked = false;
			}
			document.getElementById('buttons').innerHTML="<input type=\"checkbox\" onclick=\"Select('true');\" />";
		}
		
}



// Above function is used to select all checkbox end ------------------------
function change_type(act)
{
	"use strict";
	if(act=='x_rectangle')
	{
	$("#thime").html("<label><span>Height(Y): </span><input class='form-control' class onkeyup=\"cng_val(this.value,'x_rectangle','x_y')\" type=\"number\" name=\"thime_y\" value=\"135\" /></label><label><label>Width(X): </label><input class='form-control' onkeyup=\"cng_val(this.value,'x_rectangle','x_x')\" type=\"number\" name=\"thime_x\" value=\"200\" /></label>");
	$("#img").html("<label><span>Height(Y): </span><input class='form-control' onkeyup=\"cng_val(this.value,'x_rectangle','x_y')\" type=\"number\" name=\"img_y\" value=\"400\" /></label><label><label>Width(X): </label><input class='form-control' onkeyup=\"cng_val(this.value,'x_rectangle','x_x')\" type=\"number\" name=\"img_x\" value=\"600\" /></label>");
	 $("#x_rectangle").attr('checked', true);
         
	 $(".x_rectangle").css("background-color","#991D57");
	 $(".y_rectangle").css("background-color","#CCC");
	 $(".score").css("background-color","#CCC");
	
	}
	else if(act=='y_rectangle')
	{
	$("#thime").html("<label><span>Height(Y): </span><input class='form-control' onkeyup=\"cng_val(this.value,'y_rectangle','y_y')\" type=\"number\" name=\"thime_y\" value=\"270\" /></label><label><span>Width(X): </span><input class='form-control' onkeyup=\"cng_val(this.value,'y_rectangle','y_x')\" type=\"number\" name=\"thime_x\" value=\"200\" /></label>");
	$("#img").html("<label><span>Height(Y): </span><input class='form-control' onkeyup=\"cng_val(this.value,'y_rectangle','y_y')\" type=\"number\" name=\"img_y\" value=\"600\" /></label><label><label>Width(X): </label><input class='form-control' onkeyup=\"cng_val(this.value,'y_rectangle','y_x')\" type=\"number\" name=\"img_x\" value=\"400\" /></label>");
	 $("#y_rectangle").attr('checked', true);
	 $(".x_rectangle").css("background-color","#CCC");
	 $(".y_rectangle").css("background-color","#991D57");
	 $(".score").css("background-color","#CCC");
	 
	}
	else if(act=='score')
	{
	$("#thime").html("<label><span>Height(Y): </span><input class='form-control' onkeyup=\"cng_val(this.value,'score','s_y')\" type=\"number\" name=\"thime_y\" value=\"200\" /></label><label><label>Width(X): </label><input class='form-control' onkeyup=\"cng_val(this.value,'score','s_x')\" type=\"number\" name=\"thime_x\" value=\"200\" /></label>");
	$("#img").html("<label><span>Height(Y): </span><input class='form-control' onkeyup=\"cng_val(this.value,'score','s_y')\" type=\"number\" name=\"img_y\" value=\"400\" /></label><label><label>Width(X): </label><input class='form-control' onkeyup=\"cng_val(this.value,'score','s_x')\" type=\"number\" name=\"img_x\" value=\"400\" /></label>");
	 $("#score").attr('checked', true);
	 $(".x_rectangle").css("background-color","#CCC");
	 $(".y_rectangle").css("background-color","#CCC");
	 $(".score").css("background-color","#991D57");
	}

	
}


function cng_val(val,sty,id){
	"use strict";
	var x=$("."+sty+" " +"."+id).text(val);	
}
	
	
function delete_cnf(url){
	"use strict";
	if(confirm("Do you want to delete this ?")==1){document.location.href=url,1;}else{return false;}
}
	
	
function sendValue(s){
	"use strict";
	window.opener.document.getElementById('lib_file_selected').value = s;
	window.close();
}


function startTime() {
	"use strict";

	var b=Array('০০','০১','০২','০৩','০৪','০৫','০৬','০৭','০৮','০৯','১০','১১','১২','১৩','১৪','১৫','১৬','১৭','১৮','১৯','২০','২১','২২','২৩','২৪','২৫','২৬','২৭','২৮','২৯','৩০','৩১','৩২','৩৩','৩৪','৩৫','৩৬','৩৭','৩৮','৩৯','৪০','৪১','৪২','৪৩','৪৪','৪৫','৪৬','৪৭','৪৮','৪৯','৫০','৫১','৫২','৫৩','৫৪','৫৫','৫৬','৫৭','৫৮','৫৯');
	
    var today=new Date();
    var h=today.getHours();
    var m=today.getMinutes();
    var s=today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    var ampmeng = (h >= 12) ? " PM" : " AM";
	
	h = ( h > 12 ) ? h - 12 : h;
	document.getElementById('txt').innerHTML = h+":"+m+":"+s+ampmeng;
    var t = setTimeout(function(){startTime()},500);
}



function checkTime(i) {
	"use strict";
    if (i<10) {i = i};  
    return i;
}


function FormValidationUser()
{
	"use strict";
	var other_page=document.forms['myform'].other_page.value;
	var head_line=document.forms['myform'].head_line.value;
	var details_news=document.forms['myform'].details_news.value;
	var image = document.forms['myform'].file_select_machin.value;
	var picture_name = document.forms['myform'].picture_name.value;
	
	if(other_page==0)
		{
		alert('Please Choose Page page');
		document.forms['myform'].other_page.style.background = 'Yellow';
		return false;
		}
				
	if(head_line=='')
		{
		alert('Please enter head line');
		document.forms['myform'].head_line.style.background = 'Yellow';
		return false;
		}
			
	if(image!='' && picture_name=='')
		{
		alert('Please enter picture name');
		document.forms['myform'].picture_name.style.background = 'Yellow';
		return false;
		}	
	
}


//for ad provide
var pages = {
    '1': 'Home Page',
    '2':'Category Page',
    '3':'News Details Page'
};

var page_positions = {   
    // for home page
    '11': 'Home Page Ads Position One (01)',
    '12': 'Home Page Ads Position Two (02)',
    '13': 'Home Page Ads Position Three (03)',
    '14': 'Home Page Ads Position Four (04)',
    '15': 'Home Page Ads Position Five (05)',
    '16': 'Home Page Ads Position Six (06)',
    '17': 'Home Page Ads Position Seven (07)',
    '18': 'Home Page Ads Position Eight (08)',
    
    // for Category page
    '21': 'Category Page Ads Position One (01)',
    '22': 'Category Page Ads Position Two (02)',
    '23': 'Category Page Ads Position Three (03)',
    '24': 'Category Page Ads Position Four (04)',
    
    // for News details page
    '31': 'News Details Page Ads Position One (01)',
    '32': 'News Details Page Ads Position Tow (02)',
    '33': 'News Details Page Ads Position Three (03)',
    '34': 'News Details Page Ads Position Four (04)',
    '35': 'News Details Page Ads Position Five (05)',
    '36': 'News Details Page Ads Position Six (06)'      
};

function view_ad_pages(selected){

	"use strict";

    for(var key in pages){
            if(selected===key){
    document.write('<option value='+key+' selected>'+pages[key]+'</option>');                
            }
            else{
    document.write('<option value='+key+'>'+pages[key]+'</option>');
            }
    }
}


function loadPagePositions(page_id,selected){
	"use strict";

    document.getElementById('position').innerHTML='<option value="">Select</option>';

    for(var key in page_positions){
        if(key.substring(0,1)===page_id){
            if(selected===key){
    			document.getElementById('position').innerHTML+=('<option value='+key+' selected>'+page_positions[key]+'</option>');                     
            }
            else{
    			document.getElementById('position').innerHTML+=('<option value='+key+'>'+page_positions[key]+'</option>');                     
            }
       
        }
    }
}



function view_ad_position_name(ad_position){
	"use strict";

    document.write(page_positions[ad_position]);
}

function delete_confirm(){
	"use strict";
    return confirm("Do you want to delete this?");
}

"use strict";
$(document).ready(function () {

    $( "#ade" ).trigger( "onchange" );


        $('.img_ad').css({'display': 'none'});
        $('.embed_code_ad').css({'display': 'none'});


        $('#ad_type').on('change', function () {

            var ad_type = $('#ad_type option:selected').val();

            if (ad_type == 1) {
                $('.img_ad').css({'display': 'none'});
                $('.embed_code_ad').css({'display': 'block'});
            }

            else if (ad_type == 2) {
                $('.img_ad').css({'display': 'block'});
                $('.embed_code_ad').css({'display': 'none'});
            }

            else {
                $('.img_ad').css({'display': 'none'});
                $('.embed_code_ad').css({'display': 'none'});
            }

        });



    $("#filter").on('click',function(){
        $("#filterbody").slideToggle(800); 
    });


    $("#tab_hide_show").on('click',function(){
        $("#nav-tabs").slideToggle(800); 
    });



    $('#slug').hide();
    $(".pageslug a").on('click',function(){
        $('#slug').toggle('show');
    });



        
});



	//braking news value
    function breakingNews(str){
    	"use strict";
		var base_url = $("#base_url").val();
        var text = $("#td_" + str).text();
        $("#id").val(str);
        $("#breaking_news").val(text);
        $(".legend").text('Update Breaking News');
        $("#MyForm").attr("action", base_url+'admin/breacking/breaking_edit')
        $(".button").text('Update');
        $(".titles").text('Update Breacking News');

        $("#breaking_news").focus();
    }


    "use strict";
    //date picker
    $(".datepicker1").datepicker({

        dateFormat: 'yy-mm-dd',
        showMonths: true,
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0"

    });

	function imgStatus(category_id){
        "use strict";
		var base_url = $('#base_url').val();
		
        $.ajax({
                url: base_url+"admin/category/save_category_img_status/" + category_id,
                context: document.body
            }).done(function (data) {

            toastr.success('Update successful');
            $("#table").load(location.href+" #table>*","");
        });

    }



    //media image search
    function searchMform(){
        "use strict";
        var formdata = new FormData($("#SeForm")[0]);

        $.ajax({
            url: $("#SeForm").attr("action"),
            type: $("#SeForm").attr("method"),
            data: formdata, 
            processData: false,
            contentType: false,
           'success': function (data) {
                $("#searchResult").html(data);
            },
            error: function (xhr, desc, err){
                alert('failed');
            }
        });
    }
    

    //media image upload
    function mimageUpload(){
        "use strict";
        var formdata = new FormData($("#imgfname")[0]);

        $.ajax({
            url: $("#imgfname").attr("action"),
            type: $("#imgfname").attr("method"),
            data: formdata, 
            processData: false,
            contentType: false,
           'success': function (data) {

                if(data==='1'){
                    toastr.success('Upload successful');
                }else{
                    toastr.error('Error! - This File Not allowed!');
                }
           		window.location.href = window.location.href;

                
            },

            error: function (xhr, desc, err){
                toastr.error('Error!');
            }
        });
    }


    "use strict";
    $(document).ready(function () {

        var segment_1 = $('#segment1').val();
        var segment_2 = $('#segment2').val();
        var segment_3 = $('#segment3').val();

        if (segment_2 === 'news_post' || 
            segment_3==='breaking_news' || 
            segment_3==='newses' || 
            segment_2==='positioning') {

            $('.post').addClass('mm-active');
            $('.post-mm').addClass('mm-show');
        }
       
        else if (segment_2 === 'photo_upload' || segment_2 === 'photo_list') {
            $('.photo').addClass('mm-active');
            $('.photo-mm').addClass('mm-show');
        }

        else if (segment_2 === 'ad') {

            $('.ad').addClass('mm-active');
            $('.ad-mm').addClass('mm-show');
        }

        else if (segment_2 === 'comments_manage') {
            $('.comments').addClass('mm-active');
        }

        else if (segment_2 === 'subscriber_manage') {
            $('.reporter').addClass('mm-active');
        }

        else if (segment_2 === 'user_analytics') {
            $('.analytics').addClass('mm-active');
            $('.analytics-mm').addClass('mm-show');
        }
        
        
        else if ( segment_2 === 'category') {
            $('.category').addClass('mm-active');
            $('.category-mm').addClass('mm-show');
        }

    
        else if (segment_2 === 'page_controller') {
            $('.page').addClass('mm-active');
             $('.page-mm').addClass('mm-show');
        }
    
        else if (segment_2 === 'seo') {
            $('.seo').addClass('mm-active');
             $('.seo-mm').addClass('mm-show');
        }

        else if (segment_2 === 'menu') {
            $('.menu').addClass('mm-active');
        }

        else if (segment_2 === 'archive') {
            $('.archive').addClass('mm-active');
        }

        else if (segment_2 === 'theme') {
            $('.theme').addClass('mm-active');
        }

        else if (segment_2 === 'cache_controller') {
            $('.cache_controller').addClass('mm-active');
        }
        
        else if (segment_2 === 'language') {
            $('.language').addClass('mm-active');
        }

        else if (segment_2 === 'view_setup') {
            $('.settings').addClass('mm-active');
            $('.settings-mm').addClass('mm-show');
        }
       
    });



    "use strict";
    function special_character_remove(vtext, id) {

        var specialChars = '!#$%^&*()_+[]{}?:;|\'`/><';
        var check = function (string) {
            for (i = 0; i < specialChars.length; i++) {
                if (string.indexOf(specialChars[i]) > -1) {
                    return true
                }
            }
            return false;
        }
        if (check($('#' + id).val()) == false) {
        } else {
            toastrErrorMsg(specialChars + " these special character are not allowed")
            $("#" + id).val('').focus();
        }

    }






        $(".datepicker1").datepicker({

            dateFormat: 'yy-mm-dd',
            showMonths: true,
            changeMonth: true,
            changeYear: true

        });


        function nprint(){
             "use strict";
            document.getElementById("print").innerHTML='';
            window.print();
        }