document.getElementById('formulario').addEventListener('submit', function (event) {
    event.preventDefault();

    const formData = new FormData(event.target);
    formData.append('submit', 'submit'); 
    console.log('Dados do formulário:', formData);

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
            
            // Redireciona para a URL de redirecionamento na mesma guia
            window.location.href = data.redirect;
        } else {
            console.error('Erro ao enviar dados:', data.error);
        }
    })
    .catch(error => {
        console.error('Erro ao enviar dados:', error);
    });
});
