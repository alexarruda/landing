$(document).ready(function () {	
	$.getJSON('js/loadStates.json', function (data) {
		var items = [];
		var options = '<option value="">Estado</option>';	

		$.each(data, function (key, val) {
			options += '<option value="' + val.sigla + '">' + val.nome + '</option>';
		});	

		$("#state").html(options);				
		
		$("#state").change(function () {	
			var optionsCity = '<option value="">Cidade</option>';	
			var str = "";					
			
			$("#state option:selected").each(function () {
				str += $(this).text();
			});
			
			$.each(data, function (key, val) {
				if(val.nome == str) {							
					$.each(val.cidades, function (keyCity, valCity) {
						optionsCity += '<option value="' + valCity + '">' + valCity + '</option>';
					});							
				}
			});

			$("#city").html(optionsCity);
			
		}).change();		
	
	});

	$("input").keypress(function(){
		$(this).removeClass("erro-input");
	});

	$('#enviarForm').click(function () {
        var dataRequire = "";
		var flag = true;
		
        $('.require').each(function () {
            if ($.trim($(this).val()) == '' || $(this).is('select') && $(this).val() == 'Estado' || $(this).val() == 'Cidade' ) {
                dataRequire = $(this).data("require");
                $(this).addClass("erro-input");
                $(this).attr("placeholder", dataRequire);
                $(this).focus();
                flag = false;
                return false;
            }
        });
        $('.email-analytic').each(function () {
            if ($.validateEmail($.trim($(this).val())) == false && $.trim($(this).val()) != '') {
                $("#mail").val("");
                $(this).addClass("erro-input");
                $("#mail").attr("placeholder", "E-mail Inválido!");
                flag = false;
            }
        });

        $("#enviarForm").html('Cadastrando contato ...  ');
        if (flag) {
            $.ajax({
                type: 'POST',
                url: "landing.php",
                data: {name: $('#name').val(), phone: $('#phone').val(), mail: $('#mail').val(), state: $("#state").val(), city: $('#city').val(), date: $("#date").val(), plataforma: $("#plataforma").val()},
                success: function (data) {
                    var msg = data;
                    Message(msg);
                    clearInput();
                    $("#enviarForm").html('Teste por 30 dias grátis!');
                }
            });
        } else {
            $("#enviarForm").html('Teste por 30 dias grátis!');
        }
        return false;
    });
});

function clearInput() {
    $("#name").val("");
    $("#name").attr("placeholder", "Nome");
    $("#mail").val("");
    $("#mail").attr("placeholder", "E-mail");
    $("#phone").val("");
    $("#phone").attr("placeholder", "Celular");
    $("#city").val("Cidade");
    $("#state").val("Estado");
    $("#plataforma").val("");
    $("#plataforma").attr("placeholder", "Onde conheceu nossa plataforma?");
}

function Message(msg) {
    $('html,body').animate({ scrollTop: $('#divMessage').offset().top }, 1500);

    if (msg.match(/sucesso/)) {
        clearInput();
        $(".message").html(msg);
		$("#landingForm").addClass("message-success");
		$(".divMessage").addClass("openMessage");
    } else {
        $(".message").html(msg);
		$(".divMessage").addClass("openMessage");
    }

    setTimeout(function () {
        $("#landingForm").removeClass("message-success");
    }, 4000);

    setTimeout(function() {
		$(".message").fadeOut("slow");
		$(".divMessage").removeClass("openMessage");
	}, 7000);

    setTimeout(function () {
		window.location.href = "http://agrobrazil.net.br";
    }, 8000);
}