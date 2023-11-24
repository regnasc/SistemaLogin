# Sistema_de_Login
 
## Introdução

O projeto foi desenvolvido com o objetivo de criar um sistema de login, sendo ele uma extensão do projeto SK2R - Security. Neste repositório temos toda a codificação Backend.

## Objetivo

No Backend tínhamos o objetivo de utilizar a linguagem PHP no conceito PDO para fazer a transferência de dados captados do nosso formulário de cadastro, sendo assim, as informações eram armazenados em nosso banco de dados (utilizamos o MYSQL Workbench como BD).

Desenvolvemos também uma tabela que exibe todos os dados que estão armazenados em nosso banco, nela é possível fazer a exclusão e edição das informações, onde qualquer ação feita nela irá atualizar diretamente os dados do nosso banco de dados. 

## Métodos

No codigo sistema.php, temos algunas operações CRUD, onde conseguimos visualizar as informações, altera-las e exclui-las, no codigo formulario.html, conseguimos enviar os dados captados para o nosso banco de dados, assim temos todas as operações básicas do CRUD.

Para melhorar a expêriencia do usuário, utilizamos recursos assincronos através da linguagem JS, onde o código formulario.js é responsável por capturar os dados enviados do front-end, prevenir o comportamento padrão de recarregamento da página, e realizar uma requisição assíncrona utilizando a função fetch. Ele cria um objeto FormData a partir dos dados do formulário, adiciona informações adicionais a esse objeto e o utiliza como corpo da requisição POST. O código trata a resposta da requisição de forma assíncrona, manipulando tanto casos de sucesso quanto erros, utilizando Promises. Se a resposta indicar sucesso, os dados são exibidos no console e o usuário é redirecionado para a URL especificada na resposta. Em caso de falha, mensagens de erro são registradas no console, sendo uma abordagem assíncrona eficiente para o envio dos dados capturados do formulário e tratamento de respostas HTTP.

No codigo edit.js utiliza-mos recursos assíncrona para gerenciar a edição de dados do nosso BD com o ID 'editForm'. Ao capturar o evento de envio, a função de tratamento inicia prevenindo o comportamento padrão do formulário e cria um objeto `FormData` para encapsular os dados. A requisição assíncrona é então realizada através da função `fetch`, enviando os dados para o arquivo saveEdit.php via método POST. O código utiliza Promises e os métodos `then` e `catch` para tratar a resposta da requisição, proporcionando uma abordagem clara e concisa para o envio dos dados editados e o tratamento de respostas assíncronas.

E por ultimo, no arquivo sistema.js, temos o uso da assincronicidade para implementar uma busca em tempo real em um campo de input com o ID 'pesquisar'. Ao detectar a tecla "Enter", a função `searchData()` é chamada, coletando o valor do campo de busca e realizando uma requisição assíncrona GET para o arquivo 'sistema.php' por meio do método `$.ajax()` do jQuery. O resultado bem-sucedido da requisição é tratado pela função `success`, que atualiza dinamicamente o conteúdo da classe '.table-responsive' com os dados recebidos. Essa abordagem assíncrona permite uma experiência de usuário mais responsiva, pois a página não é bloqueada durante a busca, possibilitando a atualização em tempo real da interface conforme os resultados da busca são processados. Eventuais erros na requisição são capturados pela função `error` e registrados no console para fins de depuração.