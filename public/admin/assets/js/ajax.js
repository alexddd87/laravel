var BASE_URL = "/admin/";

$(document).on('click', '.save_or_create', function(){
    updateCkeditor();
    var form = $(this).parent().parent().parent('form.save_or_create_form');
    var type = $(this).attr('name');

    save_or_create(form, type);

    return false;
});

function save_or_create(form, type)
{
    var data = form.serializeArray();
    var module = form.find('[name=module]').val();
    var method = 'POST';
    var url = BASE_URL + module;

    if (type == 'save' && type == 'save_and_close') {
        method = 'PUT';
    }

    $.ajax({
        type: method,
        url: url,
        data: data,
        statusCode: {
            200: function(response) {
                statusCode200(response, type, module);
            },
            403: function() {
                statusCode403();
            },
            422: function(response) {
                statusCode422(response);
            },
            500: function() {
                statusCode500();
            }
        }
    }, "json");
}

function statusCode200(response, type, module)
{
    var redirect = false;
    if (type == 'create_and_open') {
        redirect = BASE_URL + module + '/' + response.id;
    } else if (type == 'save_and_close') {
        redirect = BASE_URL + module;
    }

    if (redirect) {
        window.location.href = redirect;
    }
}

function statusCode403()
{
    toastr.error('У вас нет прав доступа для этого действия!', 'Ошибка!');
}

function statusCode422(response)
{
    response = JSON.parse(response.responseText);
    $.each(response, function(index, value){
        toastr.error(value, 'Ошибка!');
    });
}

function statusCode500()
{
    toastr.error('Ошибка на сервере, обратитесь к системному администратору!', 'Ошибка!');
}

function updateCkeditor()
{
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
}
