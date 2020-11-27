SOBRE ESSE DIRETÓRIO
====================

### Aqui eu mostro como codificar arrays em formato JSon. Como decodicar JSon para array associato e para array de objetos e, como varrer esses arrays com foreach.


### DICAS PARA CRIAÇÃO DE WEB SERVICE RESTFULL

#### 1. RECURSOS: Para consumir web service RESTFULL, você pode utilizar os recursos da biblioteca curl do php, as funções $.ajax ou $.getJSON da biblioteca JQuery.  

#### 2. SEGURANÇA: Crie um token para validar acesso ao web servicev(caso necessário)
  Digamos que você criou um web service para que os sites da sua empresa possam obter 
  endereços completos. Os sites enviam um cep e o web service retorna um JSon com o endereço correspondente.

  Essa aplicação deve ser acessada somente por sites da sua empresa, sendo assim, para 
  que outros sites não descubram a url do seu web service e passem a utilizá-lo, você precisará 
  validar quem poderá acessá-lo.  

  Uma forma de fazer isso é através de um token.

  Os sites que precisarem acessar o web service deverão enviar um token e, no web service, será 
  necessário verificar se o token enviado é válido antes de processar a requisição.
  
  #A criação de um token nem sempre é necessária para dar acesso a uma API. Dentre os dados enviados 
  para a API pode constar algum dado identificador(que terá a mesma utilidade do token), que pode 
  ser utilizado para validar o acesso.

  Um exemplo é a API da Cielo, que recebe o número de cliente dentre os dados, sendo esse número 
  de cliente utilizado para validar o acesso.

  
  #Exemplo de como gerar token para enviar para um web service:
  
  $token = $token= substr(md5(date("H:i:s")),0,5).md5("meu-dado-fixo").substr(md5(date("Y-m-d")),0,5);

  #Exemplo de como validar o token no web service:
  
  $token = $toquen_enviado_na_requisicao;
<pre>
  switch($token){
  case (substr($token,5,32) == md5('meu-dado-fixo')):
    //Ok, o acesso ao web service deve ser liberado
    //Crie as rotinas a serem executadas pelo web service 
    break;
  default:
    echo '{"Erro":"Token inválido!"}';
    break;    
  }
</pre>  

#### 3. DOCUMENTAÇÃO: Documente o seu web service
  Imagine que você criou um web service que precisará receber cadastros de uma aplicação remota.

  Para que o sistema externo consiga enviar os dados de modo correto, você precisa criar um documento que informe quais dados o seu web service recebe e retorna.
  
  Essa documentação deve ser detalhada. 
  - Codificação utilizada, nesse exemplo JSon.
  - url do seu web service.
  - O padrão do token para acesso(se houver necessidade de criar um token). 
  - Campos do web service.
  - Tipo de cada um dos campos(string, inteiro, double etc)
  - Número de caracteres de cada um dos campos.
  - Mensagens de retorno em caso de sucesso ou erro. 

#### 4. LOGS: Você precisa armazenar dados para análise das transações realizadas
  Imagine que o seu web service está entre um site e uma API de pagamentos.

  Os usuários do site vão realizar pagamentos com cartões de crédito e, muitos pagamentos podem falhar, seja por falta de saldo no cartão, por instabilidade na API, entre motivos.
  
  Armazenando logs, você poderá analisar os dados e saber exatamente o que ocorreu em cada transação. Desse modo, será possível entender se o erro foi na requisição feita pelo site, se foi um erro na API de pagamentos, etc.


