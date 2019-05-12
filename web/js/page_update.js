$(document).ready(function () {
    console.log(`page_update ready`);

    tinymce.init({
        selector: '#page-html',
        skin: 'oxide',
        // width: 600,
        height: 800,
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker code',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'save table contextmenu directionality emoticons template paste textcolor'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons code'
    });
});