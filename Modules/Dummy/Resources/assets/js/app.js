$('#confirm_import').on('change, input', function() {
    $('.import_now_btn').prop('disabled', $(this).val() != 'import');
})
