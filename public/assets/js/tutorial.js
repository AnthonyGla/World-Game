$(document).on('click', '.like_button', function(e){
    e.preventDefault();

    let call = $(this).attr('id');
    let change_for_this = call == '1' ? ".click_good" : ".click_bad";
    let remove_on_this = call == '2' ? ".click_good" : ".click_bad";
    let id = $(change_for_this).attr('id');

    $.post(
        '/public/index.php?action=openTutorial&id='+id+'&call=' +call,
        {
            id_tutorial: id
        },

        function (data) {
            if (data == 'Add') {
                $(change_for_this).removeClass('disable_like');
                let value = $(change_for_this + ' p').html();
                value++;
                $(change_for_this + ' p').html(value);
            }
            else if (data == 'Change') {
                $(change_for_this).removeClass('disable_like');
                value_add = $(change_for_this + ' p').html();
                value_add++;
                $(change_for_this + ' p').html(value_add);

                $(remove_on_this).addClass('disable_like');
                value_remove = $(remove_on_this + ' p').html();
                value_remove--;
                $(remove_on_this + ' p').html(value_remove);
            }
            else if (data == 'No session') {
                $('#need_connection').html('Vous devez être connecté pour pouvoir voter.');
            }
        },
        'text'
    );
});

$('.disable_tutorial').click(function () {
    this.preventDefault;
    Swal.fire({
        title: 'Êtes-vous certain ?',
        text: "Ce tutoriel sera désactivé !",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, désactive !',
        cancelButtonText: 'Non !'
    }).then((result) => {
        if (result.value) {
            let id_tuto = $(this).attr('id');
            $.get(
                '/public/index.php?action=openTutorial',
                {
                    id_tuto: id_tuto,
                },
                function (data) {
                    if (data == 'Success') {
                        Swal.fire(
                            'Désactivation !',
                            'Le tutoriel a bien été désactivé.',
                            'success'
                        )
                    }
                    else {
                        Swal.fire(
                            'Erreur !',
                            'Vous n\'êtes pas autorisé à supprimer ce tutoriel.',
                            'error'
                        )
                    }
                    setTimeout(function(){window.location="/accueil.html";}, 1000);
                },
                'text'
            );
        }
    })
});

$('.file_upload').on('change', function () {
    var upload_file = this.files[0];
    var reader = new FileReader();
    reader.onload = function(event) {
        if (upload_file.type == 'image/png' || upload_file.type == 'image/gif' || upload_file.type == 'image/jpg' || upload_file.type == 'image/jpeg') {
            $('.cover_add').css('display', 'block');
            $('.cover_add img').attr("src", event.target.result);
            $('.error_cover').html('');
        }
        else {
            $('.cover_add').css('display', 'none');
            $('.error_cover').html('Ce fichier n\'est pas autorisé');
        }
    };
    reader.onerror = function(event) {
        alert("I AM ERROR: " + event.target.error.code);
    };
    reader.readAsDataURL(upload_file);
})