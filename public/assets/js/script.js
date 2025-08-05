// Função para fazer o texto do data-tts ser falado

function speak(text){
    if('speechSynthesis' in window){
        const utterance = new SpeechSynthesisUtterance(text);
        utterance.lang = 'pt-BR';
        window.speechSynthesis.cancel(); // Parar a fala anterior
        window.speechSynthesis.speak(utterance);
    }
}

// Seleciona todos os elementos da tela para leitura

document.querySelectorAll('[data-tts]').forEach(el =>{
    const texto = el.getAttribute('data-tts');

    // Falar ao clicar

    el.addEventListener('click', () => {
        speak(texto);
    });

    // Falar ao focar em um objeto

    el.addEventListener('focus', () => {
        speak(texto);
    });
});


// Link de redefinição de senha

function enviarEmail(event){
    event.preventDefault();

    const msg = document.getElementById('mensagem');

    msg.style.display = "block";

    document.getElementById('email').disabled = true;
    event.target.querySelector(".submit-btn").disabled = true;

    // Após 5 segundos redirecionar para o login
    setTimeout(() => {
        window.location.href = "login.html";
    }, 5000);
}

let pixel = 0.5; // Medida pixel que vai aumentar ou dimunir a fonte

function aumentarFonte(){
    const elementos = document.querySelectorAll('body, body *');

    elementos.forEach(el => {
        const estilo = window.getComputedStyle(el);
        const tamanho = parseFloat(estilo.fontSize);

        if(!isNaN(tamanho)){
            el.style.fontSize = (tamanho + pixel) + "px";
        }
    });
}


function diminuirFonte(){
    const elementos = document.querySelectorAll('body, body *');

    elementos.forEach(el => {
        const estilo = window.getComputedStyle(el);
        const tamanho = parseFloat(estilo.fontSize);

        if(!isNaN(tamanho)){
            el.style.fontSize = (tamanho - pixel) + "px";
        }
    });
}