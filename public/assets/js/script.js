$(function () {
    setInterval(function () {
// les noms de jours / mois
        var jours = new Array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
        var mois = new Array("janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "decembre");
// on recupere la date
        var date = new Date();
// on construit le message
        var message = jours[date.getDay()] + " ";   // nom du jour
        message += date.getDate() + " ";   // numero du jour
        message += mois[date.getMonth()] + " ";   // mois
        var heure = date.getHours();
        var minutes = date.getMinutes();
        var secondes = date.getSeconds();
        if (minutes < 10) {
            minutes = "0" + minutes;
        }
        if (secondes < 10) {
            secondes = "0" + secondes;
        }
        $('#bloc_Date p').html('<i class="far fa-calendar-alt"></i>' + message + heure + ":" + minutes + ":" + secondes);
    })


    setInterval(function() {
        let heightBloc = $('header').outerHeight(true);
        $("#carous ul").animate({marginTop: -heightBloc}, 700, function () {
            $(this).css({marginTop: 0}).find("li:last").after($(this).find("li:first"));
        })
    }, 6000);


    setInterval(function() {
        widthWindow = (window.innerWidth);
        if (widthWindow > 1200) {
            let taille = $('.slide_left li').outerHeight(true);
            $(".slide_left ul").animate({marginTop: -taille}, 700, function () {
                $(this).css({marginTop: 0}).find("li:last").after($(this).find("li:first"));
            })
        }
    }, 6000);

    setInterval(function() {
        widthWindow = (window.innerWidth);
        if (widthWindow > 1200) {
            let taille = $('.slide_right li').outerHeight(true);
            $(".slide_right ul").animate({marginTop: -taille}, 700, function () {
                $(this).css({marginTop: 0}).find("li:last").after($(this).find("li:first"));
            })
        }
    }, 8000);

    $( ".slide_right ul" ).draggable({ axis: "y"});

    $('#search_champ').keyup(function () {
        let value_search = $('#search_champ').val();
        let regexp = new RegExp(`${value_search}`, 'i');
        $('.champ_select_a').each(function () {
            let id_test = $(this).attr('id');
            if (!regexp.test(id_test)) {
                $(this).css('display', 'none');
            } else {
                $(this).css('display', '');
            }
        });
    });

    $(".Dropdown").on("click", function(){
        $(this).toggleClass('is-expanded');
    });


    $('#bloc_search a').click(function () {
        var my_Bloc = $('#bloc_search input');

        if ($(my_Bloc).is(":hidden")) {
            $(my_Bloc).slideDown();
        } else {
            $(my_Bloc).slideUp();
        }
    });


    $(function () {
        $('#trumbowyg').trumbowyg({
            lang: 'fr',
            autogrow: true,
            imageWidthModalEdit: true
        });
    });

    $('#trumbowyg_comment').trumbowyg({
        btns: [
            ['undo', 'redo'], // Only supported in Blink browsers
            ['strong', 'em'],
            ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
            ['unorderedList', 'orderedList'],
            ['horizontalRule'],
            ['removeformat'],
            ['fullscreen']
        ]
    });
})
