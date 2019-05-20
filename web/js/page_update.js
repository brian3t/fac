$(document).ready(function () {
    console.log(`page_update ready`);
    /*
    ck5
    ClassicEditor
        .create(document.querySelector('#page-html'), {
            allowedContent: true,
            fullPage: true
        })
        .catch(error => {
            console.error(error);
        });*/
    CKEDITOR.replace( 'page-html',
        {
            fullPage : true,
            uiColor : '#efe8ce',
            extraAllowedContent: 'header section'
        });
    /*tinymce.init({
        selector: '#page-html',
        skin: 'oxide',
        // width: 600,
        height: 800,
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker code',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'save table contextmenu directionality emoticons template paste textcolor fullpage'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons code',
        relative_urls : false,
        convert_urls : false,
        remove_script_host : false,
        // allow_script_urls: true



        // content_css: '/test.css'
    });*/
});