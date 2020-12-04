$(window).bind("load", function() {

	$('#password, #confirm_password').on('keyup', function (){
		
		if ($('#password').val() == $('#confirm_password').val()) 
		{
			$('#message').html('Senhas OK!').css('color', 'green');
		} 
		else 
			$('#message').html('As senhas não conferem').css('color', 'red');
	});
	
});

$(document).ready(function($){
	/* Money mask R$ */
    $('.money').mask('#.##0,00', {reverse: true});
    
	/* Only number on Dimensions Mask*/
    $('.number').mask('0000000');
    
    /*  CEP Mask*/
	$(".cep").mask("99.999-999");
	$("#postal_code").focusout(function(){
		//Início do Comando AJAX
		$.ajax({
			//O campo URL diz o caminho de onde virá os dados
			//É importante concatenar o valor digitado no CEP
			url: 'https://viacep.com.br/ws/'+$(this).val().replace(/\.|\-/g, '')+'/json/unicode/',
			//Aqui você deve preencher o tipo de dados que será lido,
			//no caso, estamos lendo JSON.
			dataType: 'json',
			//SUCESS é referente a função que será executada caso
			//ele consiga ler a fonte de dados com sucesso.
			//O parâmetro dentro da função se refere ao nome da variável
			//que você vai dar para ler esse objeto.
			success: function(resposta){
				//Agora basta definir os valores que você deseja preencher
				//automaticamente nos campos acima.
				$("#street").val(resposta.logradouro);
				$("#complement").val(resposta.complemento);
				$("#neighborhood").val(resposta.bairro);
				$("#city").val(resposta.localidade);
				$("#state").val(resposta.uf);
				//Vamos incluir para que o Número seja focado automaticamente
				//melhorando a experiência do usuário
				$("#street_number").focus();
			}
		});
		});

	});

