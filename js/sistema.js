$(document).ready(function () {
    var search = $('#pesquisar');

    search.on("keydown", function (event) {
        if (event.key === "Enter") {
            searchData();
        }
    });

    function searchData() {
        var searchData = search.val();

        $.ajax({
            type: 'GET',
            url: 'sistema.php',
            data: { search: searchData },
            success: function (data) {
                $('.table-responsive').html(data);
            },
            error: function (error) {
                console.error('Erro na requisição:', error);
            }
        });
    }
});

//Explicação do codigo 

//Este trecho de código jQuery implementa uma pesquisa assíncrona em uma aplicação web. Quando o usuário pressiona Enter no campo de pesquisa
//(`#pesquisar`), a função `searchData` é acionada. Essa função envia uma requisição GET assíncrona para o arquivo PHP `sistema.php`, passando 
//os dados de pesquisa. Se a requisição for bem-sucedida, os resultados são injetados dinamicamente na página, proporcionando uma experiência de 
// mais fluida ao evitar recarregamentos completos da página. Em caso de erro, uma mensagem é registrada no console.