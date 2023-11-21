
    function addNewmenu()
    {
        "use strict";
        var base_url = $('#base_url').val();
        var url = base_url+"admin/menu/save_menu";
        $('#actionurl').val(url);
        $('#menuForm')[0].reset(); 
        $('.form-group').removeClass('has-error'); 
        $('.help-block').empty(); 
        $('#modal_form').modal('show'); 
        $('.modal-title').text('Add Menu'); 
    }

    function editMainMenu(id)
    {
        "use strict";        
        $('#menuForm')[0].reset(); 
        $('.form-group').removeClass('has-error'); 
        $('.help-block').empty(); 
        var base_url = $('#base_url').val();
        var url = base_url+"admin/menu/edit_data/"+id;
        //Ajax Load data from ajax
        $.ajax({
            url : url,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id"]').val(data.menu_id);
                $('[name="menu_name"]').val(data.menu_name);
                $('[name="position"]').val(data.menu_position);
                $('#modal_form').modal('show'); 
                $('.modal-title').text('Edit Menu'); 
                var urls = base_url+"admin/menu/menu_update";
                $('#btnSave').text('Update');
                $('#actionurl').val(urls);

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }


    function saveMainMenu()
    {
        "use strict";

        $('#btnSave').text('saving...'); 
        $('#btnSave').attr('disabled',true);
        var url = $('#actionurl').val();
        var base_url = $('#base_url').val();
        
        $.ajax({
            url : url,
            type: "POST",
            data: $('#menuForm').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                

                if(data.status=='1') 
                {
                    $('#modal_form').modal('hide');
                    toastr.success('Update successful');
                    $("#table").load(location.href+" #table>*","");
                    $('#btnSave').attr('disabled',false);

                }else if(data.status=='0'){
                    toastr.warning('Position already exist');
                    $('#btnSave').text('save');
                    $('#btnSave').attr('disabled',false);
                }else if(data.status=='2'){
                    toastr.warning('Please fill up al the fields');
                    $('#btnSave').text('save');
                    $('#btnSave').attr('disabled',false);
                }


            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave').text('save'); 
                $('#btnSave').attr('disabled',false);

            }
        });
    }



    function deleteMainMenu(id)
    {
        "use strict";
        if(confirm('Do you want to delete this?'))
        {
            var base_url = $('#base_url').val();
            var url = base_url+"admin/Menu/Delete_menu/"+id;
            // ajax delete data to database
            $.ajax({
                url : url,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    toastr.success('Delete successful');
                    $("#table").load(location.href+" #table>*","");
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });

        }
    }




    "use strict";
    $(function() {
        $( "#sortable" ).sortable();
        $( "#sortable" ).disableSelection();
    });



    function ContentPositionUpdate(){

        "use strict";
        var base_url = $('#base_url').val();
        var url = base_url+"admin/menu/drag_drop_update";
        $.ajax({
            url : url,
            type: "POST",
            data: $('#drugDropForm').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                toastr.success('Update successful');
                $("#table").load(location.href+" #table>*","");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error  update data');
            }
        });
    }



    function set_status($id){
        "use strict";
        var base_url = $('#base_url').val();
        var url = base_url+"admin/menu/udate_status/"+id;
            // ajax delete data to database
            $.ajax({
                url : url,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    //if success reload ajax table
                    $('#modal_form').modal('hide');
                    reload_table();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });
    }



    function add_link(id)
    {
        "use strict";
        var base_url = $('#base_url').val();
        $('#drugForm')[0].reset(); 
        $('.form-group').removeClass('has-error');
        $('.help-block').empty(); 
        $('[name="menu_id"]').val(id);
        $('#modal_form').modal('show'); 
        $('.modal-title').text('Add Link'); 
        $('#actionurl').val(base_url+'admin/menu/content_menu_update'); 
    }


    function editMenu(id)
    {
        "use strict";
        var base_url = $('#base_url').val();
        $('#drugForm')[0].reset(); 
        $('.form-group').removeClass('has-error'); 
        $('.help-block').empty(); 
        var url = base_url+"admin/menu/content_menu_data/"+id;
        //Ajax Load data from ajax
        $.ajax({
            url : url,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id"]').val(data.menu_content_id);
                $('[name="lavel"]').val(data.menu_lavel);
                $('[name="slug"]').val(data.slug);
                $('[name="position"]').val(data.menu_position);
                $('[name="link"]').val(data.link_url);
                $('select[name="parent_id"]').val(data.parents_id);
                $('#modal_form').modal('show'); 
                $('.modal-title').text('Edit Menu'); 
                $('#btnSave').text('Update'); 
                $('#actionurl').val(base_url+'admin/menu/content_menu_update'); 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }



    function save()
    {
        "use strict";
        $('#btnSave').text('saving...'); 
        $('#btnSave').attr('disabled',true); 
        var url=$('#actionurl').val();
        var base_url = $('#base_url').val();
        
        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $('#drugForm').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                if(data.status) 
                {
                    $('#modal_form').modal('hide');
                    toastr.success('Update successful');
                    $("#table").load(location.href+" #table>*","");
                }

                $('#btnSave').text('save');
                $('#btnSave').attr('disabled',false); 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave').text('save'); 
                $('#btnSave').attr('disabled',false);

            }
        });
    }

    // delete menu
    function deleteMenu(id)
    {
        "use strict";
        var base_url = $('#base_url').val();
        if(confirm('Do you want to delete this?'))
        {
             var url = base_url+"admin/menu/delete_content_menu/"+id;
            // ajax delete data to database
            $.ajax({
                url : url,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    toastr.success('Delete successful');
                    $("#table").load(location.href+" #table>*","")
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });

        }
    }


    "use strict";
    $(document).ready(function () {

        var base_url = $('#base_url').val();

        function test(catID_Avaibale) {
            $('#myModalLabel').html("Archive News");

            $.ajax({
                url: base_url+"admin/archive/archive_newses_by_category/" + catID_Avaibale,
                context: document.body
            }).done(function (data) {
            });
        }


        $('.archive_modal').click(function () {
            $('.a').attr('id', this.id);
        });

        
        $('#start_archive').click(function () {

            $("#processing").html("Processing....");

            var catID_Avaibale = $('.a').attr('id');
            var total_news_by_category = catID_Avaibale.split("~");
            var total_call = Math.ceil(total_news_by_category[1] / 10);
            var timerId = 0;
            var counter = 0;

            timerId = setInterval(function () {
                ++counter;
                test(catID_Avaibale);
                var percentage = Math.round(((10 * counter) * 100) / total_news_by_category[1]);
                if (percentage > 100) {
                    percentage = 100;
                }
                $('.archive_process').css(
                        'width', percentage + '%'
                );
                $('.archive_process').html(percentage + '%');

                if (counter === total_call) {
                    $("#processing").html("Completed");
                    $(".archive_status").removeClass('d-none');
                    $(".archive_status").addClass('d-block');
                    $(".a").addClass('disabled');
                    clearInterval(timerId);
                }

            }, 5000);
        });
        
        $('#myModal').on('hide.bs.modal', function () {
            location.reload();
        });
    });