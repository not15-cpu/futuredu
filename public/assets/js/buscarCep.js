const inputCep = document.getElementById('cepInput');

inputCep.addEventListener('blur', buscarCep);

function buscarCep() {
    const cep = inputCep.value.replace('/\D/g', '');
    if (cep.length !== 8) {
        alert('O cep precisa ter 8 digitos.');
        return;
    }

    fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then(response => response.json())
        .then(data => {
            if (data.erro) throw new Error("CEP não encontrado");
            console.log("Endereço:", data);
            const address = document.getElementById('addressInput');
            const complemento = document.getElementById('complementoInput');
            address.value = `${data.logradouro} - ${data.bairro}, ${data.estado} ${data.uf}`
            complemento.value = `${data.complemento}`
        })
        .catch(error => {
            console.error("Erro ao buscar CEP:", error);
        })
}