$('.disable_news').click(function () {
    this.preventDefault;
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
            console.log(id_news);
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