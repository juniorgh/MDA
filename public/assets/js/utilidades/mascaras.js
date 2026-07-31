let cpf = document.getElementById('cpf');

cpf.addEventListener('input', function() {

    let valor = this.value;

    valor = valor.replace(/\D/g, '');

    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
    valor = valor.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

    this.value = valor;
});

let telefone = document.getElementById('telefone');

telefone.addEventListener('input', function() {

    let valor = this.value.replace(/\D/g, '');

    valor = valor.replace(/^(\d{2})(\d)/, '($1) $2');

    valor = valor.replace(/(\d{5})(\d)/, '$1-$2');

    this.value = valor;
});