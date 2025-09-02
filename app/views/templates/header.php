<script>
 const applicationServerKey = 'BKNzC8_7il-TnSBFupgfT_YS4sjUsqKFNQdI8PHI-hKZ_l7h6cjFfR-ThKQ6SzKzCuJdNrBJ8_whF_tA4XAkYG4'; // <--- CHAVE VAPID AQUI

    function urlBase64ToUint8Array(base64String) {
        const padding = '='.repeat((4 - base64String.length % 4) % 4);
        const base64 = (base64String + padding)
            .replace(/\-/g, '+')
            .replace(/_/g, '/');
        const rawData = window.atob(base64);
        const outputArray = new Uint8Array(rawData.length);
        for (let i = 0; i < rawData.length; ++i) {
            outputArray[i] = rawData.charCodeAt(i);
        }
        return outputArray;
    }

    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('<?=URL_BASE;?>sw.js')
                .then(() => {
                    console.log('Service Worker registrado com sucesso!');
                    subscribeUserToPush(); // Chama a função de inscrição após o registro
                })
                .catch(err => console.error('Erro ao registrar SW:', err));
        });
    }

    // Função para solicitar permissão e se inscrever
    function subscribeUserToPush() {
        if (!('Notification' in window)) {
            console.warn('Este navegador não suporta notificações.');
            return;
        }

        Notification.requestPermission().then(permission => {
            if (permission === 'granted') {
                navigator.serviceWorker.ready.then(registration => {
                    registration.pushManager.subscribe({
                        userVisibleOnly: true,
                        applicationServerKey: urlBase64ToUint8Array(applicationServerKey)
                    }).then(subscription => {
                        console.log('Inscrição para push bem-sucedida!');
                        // Envie o objeto de inscrição (subscription) para o seu servidor
                        sendSubscriptionToServer(subscription);
                    }).catch(err => {
                        console.error('Falha na inscrição para push:', err);
                    });
                });
            } else {
                console.log('Permissão para notificações negada.');
            }
        });
    }

    // Função para enviar a inscrição para o servidor
    function sendSubscriptionToServer(subscription) {
        // Envia o objeto JSON da inscrição para um endpoint no seu servidor
        fetch('<?=URL_BASE;?>salvar_subscription.php', { // <--- SUBSTITUA PELO ENDPOINT DO SEU SERVIDOR
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(subscription)
        })
        .then(response => {
            if (response.ok) {
                console.log('Inscrição enviada para o servidor com sucesso!');
            } else {
                console.error('Erro ao enviar a inscrição para o servidor.');
            }
        })
        .catch(error => {
            console.error('Erro de rede ao enviar a inscrição:', error);
        });
    }
</script>
<header>
    <img src="<?= URL_BASE; ?>assets/img/logo/logo-futuedu-preto.svg" alt="Logo FuturEdu" class="logo">
</header>
<button class="fonte-menor" tabindex="0" onclick="diminuirFonte()" data-tts="Diminuir Fonte">-</button>
<button class="fonte-maior" tabindex="0" onclick="aumentarFonte()" data-tts="Aumentar Fonte">+</button>