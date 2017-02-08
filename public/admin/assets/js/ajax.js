var BASE_URL = "/admin/";

$(document).on('click', '.save_or_create', function(){
    var form = $(this).parent().parent().parent('form.save_or_create_form');
    var data = form.serializeArray();
    var module = form.find('[name=module]').val();

    var method = 'POST';
    var url = BASE_URL + module;
    var redirect = false;
    var type = $(this).attr('name');

    if (type == 'save' && type == 'save_and_close') {
        method = 'PUT';
    }

    $.ajax({
        type: method,
        url: url,
        data: data,
        statusCode: {
            200: function(response) {
                if (type == 'create_and_open') {
                    redirect = BASE_URL + module + '/' + response.data.id;
                } else if (type == 'save_and_close') {
                    redirect = BASE_URL + module;
                }

                if (redirect) {
                    window.location.href = redirect;
                }
            },
            422: function(response) {
                response = JSON.parse(response.responseText);
                $.each(response, function(index, value){
                    toastr.error(value, 'Ошибка!');
                });
            }
        }
    }, "json");

    return false;
});