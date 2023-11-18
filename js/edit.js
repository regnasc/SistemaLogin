document.getElementById('editForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(event.target);

    fetch('saveEdit.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`Erro na requisição: ${response.statusText}`);
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            console.log('Dados enviados com sucesso:', data);
        } else {
            console.error('Erro ao enviar dados:', data.error);
        }
    })
    .catch(error => {
        console.error('Erro ao enviar dados:', error);
    });
});

//Explicação do Codigo

//Este código JavaScript utiliza o método `fetch` para realizar uma operação assíncrona no evento de envio
//de um formulário (`submit`) com id `editForm`. Após prevenir o comportamento padrão de envio do formulário 
//(`event.preventDefault()`), ele cria um objeto `FormData` contendo os dados do formulário. Em seguida, utiliza o 
//`fetch` para enviar esses dados de forma assíncrona para o script PHP `saveEdit.php` via método POST. O código trata 
//a resposta da requisição: se a resposta não for bem-sucedida (código diferente de 200), lança um erro; caso contrário, 
//converte a resposta para JSON. Posteriormente, verifica se o processo foi bem-sucedido com a chave `success` no JSON 
//retornado. Se for bem-sucedido, registra uma mensagem de sucesso no console; caso contrário, registra uma mensagem de erro. 
//O bloco `catch` captura e trata quaisquer erros que possam ocorrer durante o processo assíncrono, melhorando a robustez do código.