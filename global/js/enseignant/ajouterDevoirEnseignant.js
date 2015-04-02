
// JS page Ajouter devoir pour les enseignants 

    /*
    $(function() {
        $( "ul.droptrue" ).sortable({
            connectWith: "ul"
        });

        $( "ul.dropfalse" ).sortable({
            connectWith: "ul",
            dropOnEmpty: false
        });

        $( "#sortable1, #sortable2, #sortable3" ).disableSelection();
    });
*/
    $( document ).ready(function() {

       // msgAlert("test");
        $("#divEnseignant").hide();
        $("#divLivrable").hide();
        $("#divEtudiant").hide();
        $("#btnValid").hide();
        $("#imgOkInfoG").hide();
        $("#imgOkEnseignant").hide();
        $("#imgOkEtudiant").hide();

        $("#radioGroupe").hide();
        $("#nbGroupe").hide();

        $( "#nbGroupeChoix").change(function() {

            if ($("#nbGroupeChoix").val() != -1  ) {
                getGroupeEtudiant($("#listeFormation").val(), $("#nbGroupeChoix").val())
                $("#btnValid").show();
                $("#msgErreur").empty();
            } else {
                $("#listeEtudiant").empty();
                $("#btnValid").hide();
            }
        });


        $( "#radioGroupe").change(function() {

            if($('#groupeOui').is(':checked')){
                $("#listeEtudiant").empty();
                $("#nbGroupe").show();
            }else {
                getEtudiant($("#listeFormation").val());
                $("#nbGroupe").hide();
                $('#nbGroupeChoix>#-1').prop('selected', true);
            }

          //  alert($("#groupeNon").val() );

            /*
            if ($("#radioGroupe").val() == "1"  ) {
               // $("#listeEtudiant").hide();
                getEtudiant($("#listeFormation").val());
            } else {

            }*/
        });

        $( "#listeFormation").change(function() {
            if ($("#listeFormation").val() != -1  ) {
                //getEtudiant($("#listeFormation").val());
                $("#btnValid").show();
                $("#imgOkEnseignant").show();
                $("#imgOkEtudiant").show();
                $("#radioGroupe").show();
            } else {
                $("#listeEtudiant").empty();
                $("#btnValid").hide();
                $("#imgOkEtudiant").hide();
                $("#radioGroupe").hide();
                $('#groupeOui').attr('checked', false);
                $('#groupeNon').attr('checked', false);
                $('#nbGroupeChoix>#-1').prop('selected', true);
                $("#nbGroupe").hide();
            }
        });
        $( "#matiere").change(function() {
            if ($("#matiere").val() != -1 && $("#nbLivrable").val() != -1 ) {
                $("#divEnseignant").show();
                $("#divEtudiant").show();
                $("#divLivrable").show();

                $('#nbLivrable>#-1').prop('selected', true);

                getEnseignant($("#matiere").val());
            } else {
                if ($("#matiere").val() != -1) {
                    $("#divLivrable").show();
                    $("#msgErreur").empty();
                } else {
                    $("#divEnseignant").hide();
                    $("#divEtudiant").hide();
                    $("#divLivrable").hide();
                    $("#livrable").empty();
                    $("#btnValid").hide();

                    $("#imgOkInfoG").hide();
                    $("#imgOkEnseignant").hide();
                    $("#imgOkEtudiant").hide();
                }
            }
        });

        $( "#nbLivrable").change(function() {
            if ($("#nbLivrable").val() != -1 && $("#matiere").val() != -1 ) {
                $("#divEnseignant").show();
                $("#divEtudiant").show();
                getEnseignant($("#matiere").val());
                getFormation($("#matiere").val());
                $("#imgOkInfoG").show();
            } else {
                $("#divEnseignant").hide();
                $("#divEtudiant").hide();
                $("#btnValid").hide();
                $("#imgOkInfoG").hide();
            }
        });


        $( "#nbLivrable").change(function() {
            var nbLivrable= $("#nbLivrable").val();
            var html = "";
            $("#livrable").empty();
            for (var i = 1 ; i <= nbLivrable ; i++ ) {

                html = "<div clas   s='col-md-2 column'></div>";
                html += "<div class='col-md-10 column'>";
                html += " <fieldset class='scheduler-border'>";
                html += "<legend class='scheduler-border'> - Livrable n°"+ i +"</legend>";
                html += " <div class='form-group'>";
                html += "<label class='col-sm-4 control-label'>Intitulé du livrable * : </label>";
                html += "<div class='col-sm-8'>";
                html += "<input type='text' name='intituleLivrable" + i + "' placeholder='(Exemple : MCD)'  class='form-control' id='inputPassword3' />";
                html += " </div>" ;
                html += "</div>";
                html += " <div class='form-group'>";
                html += "<label class='col-sm-4 control-label'>Date / Heure limite : </label>";
                html += "<div class='col-sm-4'>";
                html += "<input type='date' placeholder='Date (jj/mm/aaaa)' title='Date de remise au plus tard.' name='date"+ i + "' class='form-control' id='inputPassword3' />";
                html += " </div>" ;
                html += " <div class='col-sm-3'>";
                html += " <input type='time' placeholder='Heure (hh:mm)' title='Heure de remise au plus tard.' name='heure"+ i +"' class='form-control' id='inputPassword3' />";
                html += "</div>";
                html += "</div>";
                html += " <div class='form-group'>";
                html += "<label class='col-sm-4 control-label'>Retard autorisé : </label>";
                html += "<div class='col-sm-3'>";
                html += "<input type='radio'name='retard"+ i + "'  value='1'  /> Oui <br/>";
                html += "<input type='radio'name='retard"+ i + "' checked  value='0'  /> Non ";
                html += " </div>" ;
                html += "</div>";
                html += "<div class='form-group'>";
                html += " <label class='col-sm-4 control-label'>Type de fichier * : </label>";
                html += "<label class='col-sm-1 control-label'> </label>";
                html += "<div class='col-sm-2'>";
                html += "<div class='checkbox'>";
                html += "<input type='checkbox' checked name='typeFichier" + i +"[]' value='pdf' />pdf <br />";
                html += "<input type='checkbox' checked name='typeFichier" + i +"[]' value='doc' />doc (Word)<br />";
                html += "<input type='checkbox' checked name='typeFichier" + i +"[]' value='zip' />zip<br />";
                html += " </div>";
                html += " </div>";
                html += "</fieldset>";
                html += " </div>";
                $("#livrable").append(html);
            }
            $("#livrable").append("<br/><br/>");
        });
    });


    function msgAlert(msg) {
        bootbox.alert(msg, function() {
        });
    }
    function getEnseignant(uneMatiere){

        $.ajax({
            async: "true",
            type: "POST",
            url: "global/ajax/listeEnseignantMatiere.php",
            data: "idMatiere="+ uneMatiere,
            dataType: "json",
            error: function(errorData) {
                alert(errorData);
            },
            success: function(data) {
                //alert(data);

                var html = "";
                $("#listeEnseignant").empty();
                html = "<table class='table text-center'>";
                html += "<tr><th class='text-center'>Concerné</th><th class='text-center'>Enseignant</th><th class='text-center'>Responsable</th></tr>";
                $.each(data, function(key, value) {
                    //$("#enseignant").append('<option value="'+ key +'">'+ value +'</option>');
                    html += "<tr>";
                    html += "<div class='checkbox'>";
                    html += "<td><input type='checkbox' id='idEnseignant' name='idEnseignant[]' value='"+ key +"' /> </td> ";
                    html += "<td>"+ value +"</td> ";
                    html += "<td>[ <input type='radio' id='idResponsable' name='idResponsable[]' value='"+ key +"' /> ] </td>";
                    html += "</div>";

                    html += "</tr>";
                });
                html += "</table>";
                $("#listeEnseignant").append(html);

            }
        });
    }

    function getFormation(uneMatiere){
        $("#etape1").add("class")
        $.ajax({
            async: "true",
            type: "POST",
            url: "global/ajax/listeFormationMatiere.php",
            data: "idEnseignant="+ uneMatiere,
            dataType: "json",
            error: function(errorData) {
                alert(errorData);
            },
            success: function(data) {

                $("#listeFormation").empty();
                $("#listeFormation").append('<option value="-1">...</option>');

                $.each(data, function(key, value) {
                    //$("#enseignant").append('<option value="'+ key +'">'+ value +'</option>');
                    $("#listeFormation").append("<option value='"+ key +"'>"+ value +"</option>");
                });
            }
        });
    }

    function getEtudiant(idFormation){
        $("#etape1").add("class")
        $.ajax({
            async: "true",
            type: "POST",
            url: "global/ajax/listeEtudiantFormation.php",
            data: "idFormation="+ idFormation,
            dataType: "json",
            error: function(errorData) {
                alert(errorData);
            },
            success: function(data) {
                var html = "";

                $("#listeEtudiant").empty();
                html += "<br/> <h4> LISTE DES ETUDIANTS </h4> <br/>";
                html += "<table class='table text-center'>";
                html += "<tr><th class='text-center'>Concerné</th><th class='text-center'>Etudiant</th></tr>";
                $.each(data, function(key, value) {
                    //$("#enseignant").append('<option value="'+ key +'">'+ value +'</option>');
                    html += "<tr>";
                   // html += "<div class='checkbox'>";
                    html += "<td><input type='checkbox' checked id='idEtudiant' name='idEtudiant[]' value='"+ value +"' /> </td> ";
                    html += "<td>"+ key +"</td> ";
                 //   html += "</div>";

                    html += "</tr>";
                });
                html += "</table>";
                $("#listeEtudiant").append(html);
            }
        });
    }

    function getGroupeEtudiant(idFormation, nbGroupe){
        $("#etape1").add("class")
        $.ajax({
            async: "true",
            type: "POST",
            url: "global/ajax/listeEtudiantFormation.php",
            data: "idFormation="+ idFormation,
            dataType: "json",
            error: function(errorData) {
                alert(errorData);

            },
            success: function(data) {
                var html = "";

                $("#listeEtudiant").empty();

                html += "<br/> <h4> LISTE DES ETUDIANTS </h4> <br/>";
                for (var i = 1 ; i <= nbGroupe ; i++) {

                    html += "<div class='form-group'>";
                    html += "<label class='col-sm-3 control-label'>GROUPE " + i + " :</label>";

                    html +="<div class='col-md-4'>";

                    html += " <select name='idEtudiant"+ i +"[]' class='selectpicker show-menu-arrow' multiple='multiple' title='Selection de(s) étudiant(s)' data-live-search='true'>";

                    $.each(data, function(key, value) {
                        html += "<option value='"+ value + "'> "+ key +"</option>";
                    });

                    html += " </select>";

                    html += "</div>";
                    html += "<label class='col-sm-1 control-label' >Chef</label>";

                    html +="<div class='col-md-4'>";

                    html += " <select name='idEtudiantResponsable"+ i +"' class='selectpicker show-menu-arrow'  title='Chef de groupe' data-live-search='true'>";
                    html += "<option value='-1'>Chef de groupe</option>";
                    $.each(data, function(key, value) {
                        html += "<option value='"+ value + "'> "+ key +"</option>";
                    });

                    html += " </select>";

                    html += "</div>";
                    html += "</div>";
                }

                $("#listeEtudiant").append(html);
                $('.selectpicker').selectpicker('render');

            }
        });
    }
