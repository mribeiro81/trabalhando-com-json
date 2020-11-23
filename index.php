<?php
/*
No exemplo abaixo, crie um array para ser codificado em formato JSon.
Porém, esse array poderia ser gerado com dados vindos de uma consulta ao banco de dados
*/

$clientes= array();
$clientes=  [['id'=>1,"nome"=>"Manoel","idade"=>39], ['id'=>2,"nome"=>"Daniella","idade"=>32], ['id'=>3,"nome"=>"João","idade"=>65], ['id'=>4,"nome"=>"Marisa","idade"=>55] ];


/*
Abaixo estou utilizando a função json_encode() do php para codificar o array em formato JSon
*/


$json = json_encode($clientes); //A função json_encode() recebe um array e o codifica em formato json. Ex. de JSon: {"identificador": "valor"}


/*
Abaixo estou utilizando a função json_decode() do php para pegar o JSon que criei acima(variável $json) e transformá-lo em um array associativo
A função json_decode() recebe um json e o decodifica, transformando-o em um array de objetos ou associativo.
No exemplo abaixo, note que passei dois parâmetros para json_decode(). 
- O primeiro parâmetro é o array a ser codificado em formato JSon
- O segundo parâmetro (true), indica que desejo que o resultado da decodificação seja um array associativo. Ex.: array("a"=>1,"b"=>2,"c"=>3);

IMPORTANTE:
- Abaixo estou decodificando o JSon que criei acima, mas, poderia ser um JSon vindo de um serviço remoto, que poderia ser conseguido utilizando a biblioteca CURL do php.
*/

$json_decode = json_decode($json,true); 

//Varrendo a variável $json_decode, que contém os dados dos clientes em um array associativo.
foreach($json_decode as $cliente){

  echo "id: ".$cliente["id"].", Nome: ".$cliente["nome"].", Idade: ".$cliente["idade"]."<br>\n";

}

echo "<hr/>";

/*
Abaixo, estou utilizando novamente a função json_decode(). No entanto, agora não estou passando o segundo parâmetro(true), para receber um array de objetos
*/

$json_decode = json_decode($json); 

foreach($json_decode as $cliente){

  echo "id: ".$cliente->id.", Nome: ".$cliente->nome.", Idade: ".$cliente->idade."<br>\n";

}


/*
DICAS PARA CRIAÇÃO DE WEB SERVICES RESTFULL

- SEGURANÇA: Crie um token para validar acesso ao web service
  Digamos que você criou um web service para que os sites da sua empresa possam obter endereços completos. Os sites enviam um cep e o web service retorna um JSon com o endereço correpondente.
  Essa aplicação deve ser acessada somente por sites da sua empresa, sendo assim, para que outros sites não descubram a url do seu site e passem a utilizá-lo, você precisará validar quem poderá acessá-lo.  
  Uma forma de fazer isso é através de um token.
  Os sites que precisarem acessar o web service deverão enviar um token e no web service, será verificado se o token enviado é válido para processar a requisição.
  
  #Exemplo de como gerar token para enviar para o web service:
  
  $token = $token= substr(md5(date("H:i:s")),0,5).md5("meu-dado-fixo").substr(md5(date("Y-m-d")),0,5);

  #Exemplo de como validar o token acima no web service:
  
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


- DOCUMENTAÇÃO: Documente o seu web service
  Imagine que você criou um web service que precisará receber cadastros de uma aplicação remota.
  Para que o sistema externo consiga enviar os dados de modo correto, você precisa informar quais dados o seu web service recebe. Para que o sistema externo consiga interagir com o seu web service, você deverá fornecer a documentação do seu web service.
  Essa documentação deve ser detalhada. 
  - Codificação utilizada, nesse exemplo JSon.
  - url do seu web service.
  - O padrão do token para acesso.
  - Campos do web service.
  - Tipo de cada um dos campos(string, inteiro, double etc)
  - Número de caracteres de cada um dos campos.
  - Mensagens de retorno em caso de sucesso ou erro.  

- LOGS: Você precisa armazenar dados para análise das transações realizadas
  Imagine que o seu web service está entre um site e uma API de pagamentos.
  Os usuários do site vão realizar pagamentos com cartões de crédito e, muitos pagamentos podem falhar, seja por falta de saldo no cartão, por instabilidade na API de pagamentos, entre outros.
  Armazenando logs, você poderá analisar os dados e saber exatamente o que ocorreu em cada transação. Desse modo, será possível entender se o erro foi na requisição feita pelo site, se foi um erro na API de pagamentos, etc. 
*/

?>