	$(document).ready(function () {

		// Permet la multi-selection
		$('.selectpicker').selectpicker();

        // Format de la date de naissance
        $('#Date').datepicker({
        	format: "dd/mm/yyyy"
        });  

        // Affichage en 1er plan du select
        $("#Date").parent().css("z-index", "1");

        // Permet la verification des champs
        $(function () { 
        	$("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); 
        });

    });


