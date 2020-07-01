$('.disable_news').click(function (e) {
    e.preventDefault();
    Swal.fire({
        title: 'Êtes-vous certain ?',
        text: "Cet article sera désactivé !",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, désactive !',
        cancelButtonText: 'Non !'
    }).then((result) => {
        if (result.value) {
            let id_news = $(this).attr('id');
            $.get(
                '/public/index.php?action=news',
                {
                    id_news: id_news,
                },
                function (data) {
                    if (data == 'Success') {
                        Swal.fire(
                            'Désactivation !',
                            'L\'article a bien été désactivé.',
                            'success'
                        )
                    }
                    else {
                        Swal.fire(
                            'Erreur !',
                            'Vous n\'êtes pas autorisé à supprimer cet article.',
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
            $('.cover_Update, .cover_add').css('display', 'block');
            $('.cover_Update img, .cover_add img').attr("src", event.target.result);
            $('.error_cover').html('');
        }
        else {
            $('.cover_Update, .cover_add').css('display', 'none');
            $('.error_cover').html('Ce fichier n\'est pas autorisé');
        }
    };
    reader.onerror = function(event) {
        alert("I AM ERROR: " + event.target.error.code);
    };
    reader.readAsDataURL(upload_file);
})