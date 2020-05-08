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