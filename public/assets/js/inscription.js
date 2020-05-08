$(function () {

    var intervalRedirection = setInterval(function() {
        text_redirection = $('#redirection_text span').text();
        text_redirection--;
        if (text_redirection == 1) {$('#redirection_text').html('Vous serez automatiquement redirigé vers vers l\'index dans <span>'+text_redirection+'</span> seconde.');}
        else if (text_redirection == 0) {$('#redirection_text span').html(text_redirection); clearInterval(intervalRedirection);}
        else {$('#redirection_text span').html(text_redirection);}
    }, 1000);

    var value;
    var input_form;
    var error_explain;

    $("#username_subscribe").blur(function () {
        input_form = 'username';
        error_explain = 'Ce pseudo n\'est pas disponible !';
        $.get(
            '/public/index.php?action=inscription', // Un script PHP que l'on va créer juste après
            {
                username: $("#username_subscribe").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
            },

            function (data) {
                if (data == 'Success') {
                    success_form(input_form);
                } else if (data == 'Empty') {
                    empty_form(input_form);
                } else {
                    failed_form(input_form, error_explain);
                }
            },
            'text'
        );
    });

    $("#mail_subscribe").blur(function () {
        var regexMail = /^[^\W][a-zA-Z0-9_-]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;
        value = $('#mail_subscribe').val();
        input_form = 'mail';
        error_explain = 'Votre mail contient des caractères non autorisés !';
        if (value == '') {
            empty_form(input_form);
        } else if (regexMail.test(value)) {
            success_form(input_form)
        } else {
            failed_form(input_form, error_explain);
        }
    });

    $("#pass_subscribe").blur(function () {
        var regexPass = /^(?=.{6,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/;
        value = $('#pass_subscribe').val();
        input_form = 'pass';
        error_explain = 'Le mot de passe doit contenir : Une majuscule, un chiffre et 6 caractères au minimum';
        if (value == '') {
            empty_form(input_form);
        } else if (regexPass.test(value)) {
            success_form(input_form)
        } else {
            failed_form(input_form, error_explain);
        }
    });

    $("#confirm_subscribe").blur(function () {
        var valuePass = $('#pass_subscribe').val();
        var valueConfirm = $('#confirm_subscribe').val();
        input_form = 'confirm';
        error_explain = 'Le mot de passe doit contenir : Une majuscule, un chiffre et 6 caractères au minimum';
        if (valueConfirm == '') {
            empty_form(input_form);
        } else if (valuePass == valueConfirm) {
            success_form(input_form)
        } else {
            failed_form(input_form, error_explain);
        }
    });

    function failed_form(input_form, error_explain) {
        $("#" + input_form + "_subscribe").removeClass();
        $("#" + input_form + "_subscribe").addClass('border_red');
        $("#" + input_form + "_check").html('<i class="fas fa-exclamation-circle"></i>');
        $("#" + input_form + "_check i").addClass('fas_red');
        $("#" + input_form + "_info").html(error_explain);
    }


    function empty_form(input_form) {
        $("#" + input_form + "_check").html("<i title=\"Les pseudos offensants ou injurieux seront automatiquement bannis !\" class=\"fas fa-info-circle\"></i>");
        $("#" + input_form + "_subscribe").removeClass();
        $("#" + input_form + "_subscribe").addClass('border_none');
        $("#" + input_form + "_info").html('');
    }

    function success_form(input_form) {
        $("#" + input_form + "_subscribe").removeClass();
        $("#" + input_form + "_subscribe").addClass('border_green');
        $("#" + input_form + "_check").html('<i class="fas fa-check"></i>');
        $("#" + input_form + "_check i").addClass('fas_green');
        $("#" + input_form + "_info").html('');
    }
});