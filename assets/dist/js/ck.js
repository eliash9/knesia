
        "use strict";
        var base_url = $('#base_url').val();

        var editor = CKEDITOR.replace('details', {
            filebrowserBrowseUrl : base_url+'assets/plugins/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl : base_url+'assets/plugins/ckfinder/ckfinder.html?type=Images',
            filebrowserFlashBrowseUrl : base_url+'assets/plugins/ckfinder/ckfinder.html?type=Flash',
            filebrowserUploadUrl : base_url+'assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl : base_url+'assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl : base_url+'assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
        });
