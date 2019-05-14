/*fonctions jquery pour DA */
$(document).ready(function () {

    //auto-complétion
    $('#password').blur(function () {
        email = $('#email').val();
        
        password = $('#password').val();
        if (($.trim(email) !== ''  && $.trim(password !==''))) {
            //alert("email1 = "+email1+" et email2 = "+email2+ " et password = "+password);
            var recherche = "emai=" + email + "&password=" + password;
            //	alert(recherche);
            $.ajax({
                type: 'GET',
                data: recherche,
                dataType: "json",
                url: './admin/lib/php/ajax/ajaxRechercheEtudiant.php',			
                success: function (data) { // retournÃ© par le fichier php
                    $('#nom').val(data[0].nom);
                    $('#prenom').val(data[0].prenom);
                    $('#adresse_mail').val(data[0].adresse_mail);
                    $('#mot_de_passe').val(data[0].mot_de_passe);
                    console.log(data[0].adresse);
                }
            });
        }
    });



    $('#submit_choix_type').remove();

    $('#choix_type').change(function () {
        var param = $(this).attr('name');
        var val = $(this).val();
        var refresh = 'index.php?' + param + '=' + val + '&submit_choix_type=1';
        window.location.href = refresh;
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

    //alert("Coucou");
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
                    url: "./lib/php/ajax/ajaxUpdateClient.php",
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
  
});



