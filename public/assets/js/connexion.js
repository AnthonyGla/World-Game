$(function () {

    function timer_redirection() {
        var intervalRedirectionConnexion = setInterval(function () {
            text_redirection = $('#info_connexion p span').text();
            text_redirection--;
            if (text_redirection == 1) {
                $('#info_connexion p').html('<p>Connexion réussie<br/>Vous serez automatiquement redirigé dans <span>' + text_redirection + '</span> seconde.</p>');
            } else if (text_redirection == 0) {
                $('#info_connexion p span').html(text_redirection);
                clearInterval(intervalRedirectionConnexion);
                document.location.href = "/accueil.html";
            } else {
                $('#info_connexion p span').html(text_redirection);
            }
        }, 1000);
    }

$(document).on('click', '#submit_Connexion', function(e){
    e.preventDefault();
    $.post(
        '/public/index.php?action=connection', // Un script PHP que l'on va créer juste après
        {
            username: $("#user_Connection").val(),
            password: $("#pass_Connection").val(),
        },

        function (data) {
            if (data == 'Success') {
                $('#info_connexion').css('padding', '20px');
                $('#info_connexion').html('<img src="https://vignette.wikia.nocookie.net/leagueoflegends/images/4/48/Okay_Emote.png/revision/latest?cb=20180601212654"><p>Connexion réussie<br/>Vous serez automatiquement redirigé dans <span>3</span> secondes.</p>');
                timer_redirection();
            } else if (data == 'Empty') {
                $('#error_connexion').html('<i class="fas fa-sync"></i>');
                $("#user_Connection, #pass_Connection").addClass('border_red');
                setTimeout(function(){$('#error_connexion').html('Tous les champs doivent être remplis');}, 200);
            } else if (data == 'Banned') {
                $('#error_connexion').html('<i class="fas fa-sync"></i>');
                $("#user_Connection, #pass_Connection").addClass('border_red');
                setTimeout(function(){$('#error_connexion').html('Cet utilisateur a été banni');}, 200);
            } else if (data == 'Not activated') {
                $('#error_connexion').html('<i class="fas fa-sync"></i>');
                $("#user_Connection, #pass_Connection").removeClass('border_red');
                setTimeout(function(){$('#error_connexion').html('Cet utilisateur n\'est pas activé. Consultez vos e-mails pour obtenir le lien d\'activation');}, 200);
            }
        else {
                $('#error_connexion').html('<i class="fas fa-sync"></i>');
                $("#user_Connection, #pass_Connection").addClass('border_red');
                setTimeout(function(){$('#error_connexion').html('Identifiants incorrects');}, 200);
            }
        },
        'text'
    );
});
});