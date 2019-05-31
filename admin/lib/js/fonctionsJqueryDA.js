/*fonctions jquery pour DA */
$(document).ready(function () {
   
// Tableau éditable Etudiant
    
    $("span[id]").click(function () {
      //Récupération du contenu d'origine de la zone cliquée
        var valeur1 = $.trim($(this).text());

        //s'il fallait tester si on utilise edge :
        if (/Edge\/\d./i.test(navigator.userAgent)) {
            $(this).addClass("borderInput");
        }

        //2 lignes suivantes pour firefox
        $(this).contentEditable = "true";
        $(this).addClass("borderInput");

       //récupération, pour la zone cliquée, des attributs id et name, pour les envoyer à la requête sql
        var ident = $(this).attr("id");
        var name = $(this).attr("name");

        $(this).blur(function () {
            $(this).removeClass("borderInput");
           //récupération de la nouveau contenu du champ qui vient de perdre le focus (blur)
            var valeur2 = $(this).text();
            valeur2 = $.trim(valeur2);

            if (valeur1 != valeur2) // Si on a fait un changement
            {
               //adjonction des paramètres qui accompagnent le nom du fichier appelé
                var parametre = 'champ=' + name + '&id=' + ident + '&nouveau=' + valeur2;
               // alert (parametre);
                var retour = $.ajax({
                    type: 'GET',
                    data: parametre,
                    dataType: "text",
                    url: "./lib/php/ajax/ajaxUpdateEtudiant.php",
                    success: function (data) {
                       //rien de particulier à faire
                        console.log("success");
                    }
                });
                retour.fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                });
            };
        });
    });
  //tests
    $('#parag1').css('color', '#FF0000');

    $('#parag2').css({
        "background-color": "lightcyan",
        "font-size": "120%"
    });

    $('#parag1').click(function () {
        $(this).css('color', '#0000FF');
        $('#parag2').css('font-size', '80%');
    });

});



