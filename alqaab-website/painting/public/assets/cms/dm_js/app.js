
$(document).on('click', '#delete', function () {
    var id = $(this).data('id');
    var url = $(this).data('url');
    $object = $(this);
    $.confirm({
        title: 'तपाइँ मेटाउन चाहनुहुन्छ?',
        autoClose: 'cancelAction|8000',
        buttons: {
            deleteUser: {
                text: 'Delete',
                btnClass: 'btn-red',
                action: function () {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        dataType: "JSON",
                        beforeSend: function (xhr) {
                            var token = $('meta[name="csrf-token"]').attr('content');
                            if (token) {
                                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                            }
                        },
                        data: {
                            "id": id,
                        },
                        success: function (response) {
                            console.log(response);
                            $.alert('सफलतापूर्वक मेटियो !!');
                            location.reload(true);
                        },
                        error: function (xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            },
            cancelAction: function () {
                $.alert('कारबाही रद्द गरिएको छ !!');
            }
        }
    });

});

$(document).on('click', '#restore', function () {
    var id = $(this).data('id');
    var url = $(this).data('url');
    // alert(url);
    $object = $(this);
    if (confirm("के तपाई पुनर्स्थापना गर्न चाहनुहुन्छ??")) {
        $.ajax({
            url: url,
            type: 'PUT',
            dataType: "JSON",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf-token"]').attr('content');
                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: {
                "id": id,
            },
            success: function (response) {
                console.log(response);
                $($object).parents('tr').remove();
                alert('सफलतापूर्वक पुनर्स्थापित गरियो !!');
            },
            error: function (xhr) {
                console.log(xhr.responseText); // this line will save you tons of hours while debugging
                // do something here because of error
            }
        });
    }
    else {

    }

});

$('.dropdown-click').on('click', function () {
    var value = $(this).attr('href');
    window.location.href = value;
});

//Validation message
setTimeout(function () {
    $('.alert').slideUp();
}, 5000)


//ck editor
function ckeditor(id) {
    CKEDITOR.replace(id, {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',

    });
}
