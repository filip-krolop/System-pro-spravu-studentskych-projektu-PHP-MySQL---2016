$('.input').focusin(function () {
    $(this).find('span').animate({ 'opacity': '0' }, 200);
});
$('.input').focusout(function () {
    $(this).find('span').animate({ 'opacity': '1' }, 300);
});
$('.login').submit(function () {
    $(this).find('.submit i').removeAttr('class').addClass('fa fa-hourglass').css({ 'color': '#fff' });
    $('.submit').css({
        'background': '#0C9DF3',
        'border-color': '#0C9DF3'
    });
    $('.feedback').show().animate({
        'opacity': '1',
        'bottom': '-80px'
    }, 400);
    $('input').css({ 'border-color': '#0C9DF3' });
});
//# sourceURL=pen.js
$('form').submit(function (e) {
    var form = this;
    e.preventDefault();
    setTimeout(function () {
        form.submit();
    }, 500); // in milliseconds
});