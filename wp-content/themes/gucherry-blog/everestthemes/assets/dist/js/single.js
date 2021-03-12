$(document).ready(function() {
    console.log(322);
    $('.comment-input').change(function() {
        console.log(83);
        if ($(this).val() == '') {
            $('.dm-btn-primary').addClass('dm-btn-disabled');
            $('.dm-btn-primary').attr('disabled', true);
        } else {
            $('.dm-btn-primary').removeClass('dm-btn-disabled');
            $('.dm-btn-primary').attr('disabled', false);
        }
    })
})