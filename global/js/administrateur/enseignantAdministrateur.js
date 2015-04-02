	$(document).ready(function () {

		$('.selectpicker').selectpicker();

/*		$.fn.datepicker.dates['en'] = {
				days: ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"],
				daysShort: ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
				daysMin: ["d", "l", "ma", "me", "j", "v", "s"],
				months: ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"],
				monthsShort: ["janv.", "févr.", "mars", "avril", "mai", "juin", "juil.", "août", "sept.", "oct.", "nov.", "déc."],
				today: "Aujourd'hui",
				clear: "Effacer",
				weekStart: 1,

			};*/

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


