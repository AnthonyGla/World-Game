$(function () {
    $('#member_list_select').change(function () {
        value = $("#member_list_select").val();
        if (value == 'allUser') {
            $('.list_member_table, .pagination').show();
            $('.ajax_table').hide();
        } else {
            $.post(
                '/public/index.php?action=admin_memberList',
                {
                    value: $("#member_list_select").val(),
                },

                function (data) {

                    $('.list_member_table, .pagination').hide();
                    $('.ajax_table').show();
                    $('.ajax_table tbody').html('');

                    switch (value) {
                        case 'mostNews':
                            $('.ajax_table .thead-dark tr th:nth-child(5)').html('Nombre d\'articles');
                            break;
                        case 'mostTutorial':
                            $('.ajax_table .thead-dark tr th:nth-child(5)').html('Nombre de tutoriels');
                            break;
                        case 'TopComments':
                            $('.ajax_table .thead-dark tr th:nth-child(5)').html('Nombre de commentaires');
                            break;
                        case 'TopPosts':
                            $('.ajax_table .thead-dark tr th:nth-child(5)').html('Nombre de messages sur le forum');
                            break;
                        default:
                    }

                    $.each(data, function (index) {
                        $('.ajax_table tbody').append(`
        <tr>
            <td>${index + 1}</td>
            <td class="list_avatar"><img src="${data[index].avatar}"></td>
            <td class="search_username"><a href="/administration/modifier-utilisateur/${data[index].username}.html">${data[index].username}</a></td>
            <td>${data[index].date}</td>
            <td>${data[index].count}</td>
        </tr>
        `)
                    });
                },
                'json'
            );
        }
    });

    $(function () {
        $("#search_input").autocomplete({
            source: "/public/index.php?action=admin_modifyUser",
        });
    });

    $('#delete_avatar').click(function (e) {
        e.preventDefault;
        Swal.fire({
            title: 'Êtes-vous sûr ?',
            text: "Cet avatar sera supprimé définitivement !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprime !',
            cancelButtonText: 'Non !'
        }).then((result) => {
            if (result.value) {

                $.get(
                    '/public/index.php?action=modifyUser',
                    {
                        default_avatar: '/public/assets/img/users_avatars/default.png',
                        id: $("h2").attr('id'),
                    },

                    function (data) {
                        if (data == 'Success') {
                            Swal.fire(
                                'Supprimé !',
                                'Le fichier a bien été supprimé, l\'avatar par défaut a été mis en place.',
                                'success'
                            )
                            let default_avatar = '/public/assets/img/users_avatars/default.png';
                            $("#userinfo_avatar img").attr('src', default_avatar);

                        } else {
                        }
                    },
                    'text'
                );

            }
        })
    });

    $('input[name="active"]').click(function (e) {

        if ($(this).prop('checked')) {
            $(this).prop('checked', false);
            Swal.fire({
                title: 'Êtes-vous certain ?',
                text: "Cet utilisateur sera banni !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, bannis le !',
                cancelButtonText: 'Non !'
            }).then((result) => {
                if (result.value) {
                    $(this).prop('checked', true);
                    update(2);
                }
            })
        } else {
            $(this).prop('checked', true);
            Swal.fire({
                title: 'Êtes-vous certain ?',
                text: "Cet utilisateur sera débanni !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, il faut le débannir !',
                cancelButtonText: 'Non !'
            }).then((result) => {
                if (result.value) {
                    $(this).prop('checked', false);
                    update(1);
                }
            })
        }


        function update(active) {
            $.get(
                '/public/index.php?action=admin_modifyUser',
                {
                    active: active,
                    username: $("h2").html(),
                },

                function (data) {
                    if (active == 1) {
                        if (data == 'Success') {
                            Swal.fire(
                                'Débanissement !',
                                'Cet utilisateur a bien été débanni.',
                                'success'
                            )
                            $('.active_advert').html('Cet utilisateur a été débanni');
                        }
                    }
                    else {
                        if (data == 'Success') {
                            Swal.fire(
                                'Bannissement !',
                                'Cet utilisateur a bien été banni.',
                                'success'
                            )
                            $('.active_advert').html('Cet utilisateur a été banni');
                        }
                    }
                },
                'text'
            );
        }
    });

    $('.manage_announcement').click(function () {
        this.preventDefault;
        Swal.fire({
            title: 'Êtes-vous certain ?',
            text: "Cette annonce sera supprimée !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprime !',
            cancelButtonText: 'Non !'
        }).then((result) => {
            if (result.value) {
                let id_announcement = $(this).attr('id');
                $.get(
                    '/public/index.php?action=admin_announcements',
                    {
                        id_announcement: id_announcement,
                    },
                    function (data) {
                        console.log(id_announcement);
                        if (data == 'Success') {
                            Swal.fire(
                                'Suppression !',
                                'L\'annonce a bien été supprimée.',
                                'success'
                            )
                            $('#'+id_announcement).remove('');
                        }
                        else {
                                Swal.fire(
                                    'Erreur !',
                                    'Vous n\'êtes pas autorisé à supprimer cette annonce.',
                                    'error'
                                )
                        }
                    },
                    'text'
                );
    }
})
});


});