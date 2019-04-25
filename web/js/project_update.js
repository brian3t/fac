$(document).ready(function () {
    $('#project-use_own_domain').on('change', function () {
        let enabled = $(this).prop('checked');
        console.log(`enabled ${enabled}`);
        $('div.field-project-domain').toggle(enabled);
        if (! enabled) {
            $('#project-domain').val('');
        }
    })
});