document.getElementById('cadastroForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const formData = new FormData(event.target);

    fetch('formulario.php', {
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
            window.location.href = 'login.php';
        } else {
            console.error('Erro ao enviar dados:', data.error);
        }
    })
    .catch(error => {
        console.error('Erro ao enviar dados:', error);
    });
});

//Explicação da assicronia

//Este código JavaScript utiliza a API fetch para realizar uma requisição assíncrona POST para um arquivo PHP (formulario.php) ao enviar
//dados de um formulário HTML. Ao capturar o evento de envio do formulário, a função impede o comportamento padrão de recarregamento da página. 
//Um objeto FormData é criado a partir dos campos do formulário, e a requisição é feita usando fetch. O código trata a resposta, lançando um erro se 
//a requisição não for bem-sucedida ou manipulando os dados JSON retornados. Se a resposta indicar sucesso (data.success verdadeiro), uma mensagem de 
//log é exibida, e a página é redirecionada para 'login.php'. Em caso de falha, uma mensagem de erro é registrada no console. Esse processo deixa a interação
//com o servidor assíncrona, evitando recarregamentos desnecessários da página.