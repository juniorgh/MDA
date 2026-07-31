document
.getElementById('buscar').addEventListener('keyup',function(){

	let texto = this.value.toLowerCase();

	let linhas = document.querySelectorAll('.agenda-table-body-tr');


	linhas.forEach(function(linha, indice) {

        if(indice == 0)
        {
            return;
        }

        let conteudo = linha.innerText.toLowerCase();

        if(conteudo.includes(texto))
        {
            linha.style.display = '';
        }
        else
        {
            linha.style.display = 'none';
        }

    });

});