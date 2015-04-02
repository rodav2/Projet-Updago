$(document).ready(function () {

		// Verifie si les select sont rempli
		$("select").change(function(){

		    if(($(this) +":selected").length>0)
		    {
		        $(this).parent().find("span.glyphicon.glyphicon-remove").remove();
		        $(this).parent().parent(".form-group").removeClass( "has-error has-feedback" );
		        $(this).parent().parent(".form-group").addClass( "has-success has-feedback" );
		        $(this).parent(".input-group").append( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" );

		    }
		    else
		    {

		        $(this).parent().find("span.glyphicon.glyphicon-ok").remove();
		        $(this).parent().parent(".form-group").removeClass( "has-success has-feedback");
		        $(this).parent().parent(".form-group").addClass( "has-error has-feedback");
		        $(this).parent(".input-group").append( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>");
		    }
		});


		// Verifie si les champs sont rempli
		$("input").on('change keyup', function()
		{
		    if($(this).val().length >= 3)
		    {
		    	$(this).parent().find("span.glyphicon.glyphicon-remove.form-control-feedback").remove();
		        $(this).parent().parent(".form-group").removeClass( "has-error has-feedback" );
		        $(this).parent().parent(".form-group").addClass( "has-success has-feedback" );
		        $(this).parent(".input-group").append( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" );
		    }
		    else
		    {
		      	$(this).parent().find("span.glyphicon.glyphicon-ok.form-control-feedback").remove();
		        $(this).parent().parent(".form-group").removeClass( "has-success has-feedback");
		        $(this).parent().parent(".form-group").addClass( "has-error has-feedback");
		        $(this).parent(".input-group").append( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>");
		    }
		});


		// Verifie si les mots de passe sont identique (Visuel Couleur)
		$("input[type=Password]").on('change keyup', function()
		{
		    if($("#Password").val() == $("#ConfirmationPassword").val() && $("#Password").val().length >= 3  && $("#ConfirmationPassword").val().length >= 3)
		    {
		    	$("input[type=Password]").parent().find("span.glyphicon.glyphicon-remove.form-control-feedback").remove();
		        $("input[type=Password]").parent().parent(".form-group").removeClass( "has-error has-feedback" );
		        $("input[type=Password]").parent().parent(".form-group").addClass( "has-success has-feedback" );
		        $("input[type=Password]").parent(".input-group").append( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" );
		    }
		    else
		    {
		      	$("input[type=Password]").parent().find("span.glyphicon.glyphicon-ok.form-control-feedback").remove();
		        $("input[type=Password]").parent().parent(".form-group").removeClass( "has-success has-feedback");
		        $("input[type=Password]").parent().parent(".form-group").addClass( "has-error has-feedback");
		        $("input[type=Password]").parent(".input-group").append( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>");
		    }
		});
});	



