<?php
/*
##### CRIANDO UM ARRAY ASSOCIATIVO PARA DEPOIS CODIFICÁ-LO EM FORMATO JSON

No exemplo abaixo, criei um array associativo com dados de clientes para ser codificado em formato JSon.
Os dados para criar esse array poderiam vir de uma consulta a um banco de dados
*/
$clientes= [];
$clientes=  [['id'=>1,"nome"=>"Manoel","idade"=>39], ['id'=>2,"nome"=>"Daniella","idade"=>32], 
['id'=>3,"nome"=>"João","idade"=>65], ['id'=>4,"nome"=>"Marisa","idade"=>55] ];


/*
##### CODIFICANDO ARRAY EM FORMATO JSON

Abaixo estou utilizando a função json_encode() do php para codificar o array em formato JSon
*/
$json = json_encode($clientes); //A função json_encode() recebe um array e o codifica em formato json. Ex. de JSon: {"identificador": "valor"}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Trabalhando com JSON</title>
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link href="css/stylo.css" type="text/css" rel="stylesheet" /> 
</head>
<body>

	<header class="container header-background mt-1">

	    <div class="row justify-content-md-center">

	        <div class="col-sm">
	            <h2>Trabalhando com JSON</h2>            
	        </div>

	    </div>

	</header>

	<main role="main" class="container mt-2">


		<div class="row">

			<div class="col-sm  mt-4">				

					<div class="alert alert-info">
						<h4>Criando um array associativo para depois codifica-lo em formato JSON.</h4>	
					</div>	
<pre>
 No exemplo abaixo, criei um array associativo com dados de clientes para ser codificado em formato JSon.
 Os dados para criar esse array poderiam vir de uma consulta a um banco de dados

 $clientes= [];
 $clientes=  [['id'=>1,"nome"=>"Manoel","idade"=>39], ['id'=>2,"nome"=>"Daniella","idade"=>32], 
 ['id'=>3,"nome"=>"João","idade"=>65], ['id'=>4,"nome"=>"Marisa","idade"=>55] ];
</pre>

			</div>

		</div>


	


		<div class="row">

			<div class="col-sm">	

					<div class="alert alert-info">
						<h4>Codificando o array em formato JSON</h4>	
					</div>

<pre>

 Abaixo estou utilizando a função json_encode() do php para codificar o array em formato JSon.

 A função json_encode() do php recebe um array e o codifica em 
 formato json chave e valor: {"identificador": "valor"}

 $json = json_encode($clientes);  

</pre>	
			</div>

		</div>	


		


		<div class="row">

				<div class="col-sm">

				
					<?php
			
						/*
						##### DECODIFICANDO JSON PARA ARRAY ASSOCIATIVO

						Abaixo estou utilizando a função json_decode() do php para pegar o JSon que criei acima(variável $json) e transformá-lo em um array associativo
						A função json_decode() recebe um json e o decodifica, transformando-o em um array de objetos ou associativo.
						No exemplo abaixo, note que passei dois parâmetros para json_decode(). 
						- O primeiro parâmetro é o array a ser codificado em formato JSon
						- O segundo parâmetro (true), indica que desejo que o resultado da decodificação seja um array associativo.

						##IMPORTANTE:
						- Abaixo estou decodificando o JSon que codifiquei acima, mas, poderia ser um JSon vindo de um serviço remoto, que poderia ser acessado utilizando a biblioteca CURL do php ou a função $.getJSON da biblioteca JQuery
						*/

						$json_decode = json_decode($json,true); 

						echo '<div class="alert alert-info">
								<h4>1. Veja o resultado da decodificação do array $json.</h4>
								<hr class="hr-alert" />	
								Para essa decodificação, passei o segundo parâmetro da função json_decode() para que retorne como resultado um array associativo.<br> 							
							  	Veja: json_decode($json,true); //Passando o segundo parâmtero, será retornado um array associativo.
							  </div>';
					
						echo '<div class="conteudo">';	  
						//Varrendo a variável $json_decode, que contém os dados dos clientes em um array associativo.
						foreach($json_decode as $cliente){

						  echo $cliente["id"].", ".$cliente["nome"].", ".$cliente["idade"]."<br>\n";

						}
						echo '</div">';	 

						?>		  

<pre>

$json_decode = json_decode($json,true); 

Varrendo a variável $json_decode, que contém os dados dos clientes em um array associativo.
foreach($json_decode as $cliente){

   echo $cliente["id"].", ".$cliente["nome"].", ".$cliente["idade"]."&#60;br>\n";

}
</pre>
				</div>

			</div>


			<div class="col-sm">

				

					<?php			


						/*
						Abaixo, estou utilizando novamente a função json_decode() para varrer o mesmo JSon que codifiquei. No entanto, agora não estou passando o segundo parâmetro(true), para receber um array de objetos.
						*/


						echo '<div class="alert alert-info">
								<h4>2. Veja abaixo o resultado da decodificação do array $json.</h4>
								<hr class="hr-alert" />
								Para essa decodificação, NÃO passei o segundo parâmetro da função json_decode() para que retorne como resultado um array de objetos.<br> 
							  	Veja: json_decode($json);<br>
							  	O resultado é o mesmo demonstrado acima, o que muda é somente a forma como a função retorna os dados e o modo de leitura do array. 
							  </div>';

						echo '<div class="conteudo">';	  

						$json_decode = json_decode($json); 
						//Varrendo a variável $json_decode, que contém os dados dos clientes em um array de objetos.
						foreach($json_decode as $cliente){

						  echo $cliente->id.", ".$cliente->nome.", ".$cliente->idade."<br>\n";

						}
						echo '</div">';	

					?>

<pre>

$json_decode = json_decode($json); 

Varrendo a variável $json_decode, que contém os dados dos clientes em um array de objetos.
foreach($json_decode as $cliente){

   echo $cliente->id.", ".$cliente->nome.", ".$cliente->idade."&#60;br>\n";
   
}
</pre>	

				

			</div>


		</div>		




		<div class="container">
			<div class="row">

				<div class="col-sm">

					<div class="alert alert-info">					


						<h4 class="mt-4">
						RECURSOS: Para consumir web service RESTFULL, você pode utilizar os recursos da 
						  biblioteca curl do php, as funções $.ajax ou $.getJSON da biblioteca JQuery. 	
						</h4><br>


						<h4 class="mt-4">
						SEGURANÇA: Crie um token para validar acesso ao web servicev(caso necessário)
						</h4>

						<p>
						  Digamos que você criou um web service para que os sites da sua empresa possam obter 
						  endereços completos. Os sites enviam um cep e o web service retorna um JSon com o endereço correspondente.
						</p>
						<p>
						  Essa aplicação deve ser acessada somente por sites da sua empresa, sendo assim, para 
						  que outros sites não descubram a url do seu web service e passem a utilizá-lo, você precisará 
						  validar quem poderá acessá-lo. 
						</p>   
						<p>
						  Uma forma de fazer isso é através de um token.
						</p>
						<p>
						  Os sites que precisarem acessar o web service deverão enviar um token e, no web service, será 
						  necessário verificar se o token enviado é válido antes de processar a requisição.
						</p>
						<p>  
						  A criação de um token nem sempre é necessária para dar acesso a uma API. Dentre os dados enviados 
						  para a API pode constar algum dado identificador(que terá a mesma utilidade do token), que pode 
						  ser utilizado para validar o acesso.
						</p>
						<p>
						  Um exemplo é a API da Cielo, que recebe o número de cliente dentre os dados, sendo esse número 
						  de cliente utilizado para validar o acesso.
						</p>  

						<p>
						  Exemplo de como gerar token para enviar para um web service:
						</p>
						<p>  
						  $token = $token= substr(md5(date("H:i:s")),0,5).md5("meu-dado-fixo").substr(md5(date("Y-m-d")),0,5);
						</p>
						<p>
						  Exemplo de como validar o token no web service:
						</p>  
						
	<pre class="pre">	  
	$token = $toquen_enviado_na_requisicao;

	switch($token){
		case (substr($token,5,32) == md5('meu-dado-fixo')):
			//Ok, o acesso ao web service deve ser liberado
			//Crie as rotinas a serem executadas pelo web service 
			break;
		default:
			echo '{"Erro":"Token inválido!"}';
			break;    
	}
	</pre><br>
						 



						<h4 class="mt-4">DOCUMENTAÇÃO: Documente o seu web service</h4>

						<p>
						  Imagine que você criou um web service que precisará receber cadastros de uma aplicação remota.
						</p>
						<p>
						  Para que o sistema externo consiga enviar os dados de modo correto, você precisa criar um 
						  documento que informe quais dados o seu web service recebe e retorna.
						</p>
						<p>
							Essa documentação deve ser detalhada.
						</p>  

						<ul>
							 <li>Codificação utilizada, nesse exemplo JSon.</li>
							 <li>url do seu web service.</li>
							 <li>O padrão do token para acesso(se houver necessidade de criar um token).</li> 
							 <li>Campos do web service.</li>
							 <li>Tipo de cada um dos campos(string, inteiro, double etc).</li>
							 <li>Número de caracteres de cada um dos campos.</li>
							 <li>Mensagens de retorno em caso de sucesso ou erro.</li>
						</ul> <br>  



						<h4 class="mt-4">LOGS: Você precisa armazenar dados para análise das transações realizadas</h4>

						<p>
						  Imagine que o seu web service está entre um site e uma API de pagamentos.
						</p>
						<p>
						  Os usuários do site vão realizar pagamentos com cartões de crédito e, muitos pagamentos 
						  podem falhar, seja por falta de saldo no cartão, por instabilidade na API, entre motivos.
						</p>

						<p>Armazenando logs, você poderá analisar os dados e saber exatamente o que ocorreu em cada 
						  transação. Desse modo, será possível entender se o erro foi na requisição feita pelo site, se 
						  foi um erro na API de pagamentos, etc.
						</p>  	

	 				</div>

				</div>	

			</div>	

		</div>	

	</main>

</body>
</html>