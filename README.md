SOBRE ESSE DIRETÓRIO
====================

### Aqui eu mostro como codificar arrays em formato JSon. Como decodicar JSon para array associato e para array de objetos e, como varrer esses arrays com foreach.

### Dentro do arquivo há explicação do código e dicas de como criar web service RESTFULL, sendo que aqui segue algumas dessas dicas.

### DICAS PARA CRIAÇÃO DE WEB SERVICE RESTFULL

#### 1. SEGURANÇA: Crie um token para validar acesso ao web service
  Digamos que você criou um web service para que os sites da sua empresa possam obter endereços completos. Os sites enviam um cep e o web service retorna um JSon com o endereço correpondente.
  Essa aplicação deve ser acessada somente por sites da sua empresa, sendo assim, para que outros sites não descubram a url do seu site e passem a utilizá-lo, você precisará validar quem poderá acessá-lo.	
  Uma forma de fazer isso é através de um token.
  Os sites que precisarem acessar o web service deverão enviar um token e no web service, será verificado se o token enviado é válido para processar a requisição.
  Dentro do arquivo há exemplo de como criar token.
  


#### 2. DOCUMENTAÇÃO: Documente o seu web service
  Imagine que você criou um web service que precisará receber cadastros de uma aplicação remota.
  Para que o sistema externo consiga enviar os dados de modo correto, você precisa informar quais dados o seu web service recebe.
  Essa documentação deve ser detalhada. 
  - url do seu web service.
  - O padrão do token para acesso.
  - Campos que o seu web service.
  - Tipo de cada um dos campos(string, inteiro, double etc)
  - Número de caracteres de cada um dos campos.
  - Mensagens de retorno em caso de sucesso ou erro. 

#### 3. LOGS: Você precisa armazenar dados para análise das transações realizadas
  Imagine que o seu web service está entre um site e uma API de pagamentos.
  Os usuários do site vão realizar pagamentos com cartões de crédito e, muitos pagamentos podem falhar, seja por falta de saldo no cartão, por instabilidade na API de pagamentos, entre outros.
  Armazenando logs, você poderá analisar os dados e saber exatamente o que ocorreu em cada transação. Desse modo, será possível entender se o erro foi na requisição feita pelo site, se foi um erro na API de pagamentos, etc.


