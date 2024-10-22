<style>
    /* Estilo del contenedor del chat */
    #chat-container {
        position: fixed;
        bottom: 5px;
        right: 100px;
        max-width: 260px;
        border-radius: 20px;
        background: white;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        z-index: 9999;
        transition: height 0.3s ease-in-out;
        opacity: 0.9;
    }

    /* Estilo del encabezado del chat */
    #chat-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 5px;
        background: #f1f1f1;
        border-bottom: 1px solid #ccc;
        font-weight: bold;
    }

    /* Mensaje del usuario (burbuja azul estilo iMessage) */
    .user-message {
        align-self: flex-end;
        background-color: #007aff;
        color: white;
        padding: 10px;
        margin: 5px 10px;
        border-radius: 15px 15px 0 15px;
        max-width: 75%;
        word-wrap: break-word;
    }

    /* Mensaje del bot (burbuja gris estilo iMessage) */
    .bot-message {
        align-self: flex-start;
        background-color: #e5e5ea;
        color: black;
        padding: 10px;
        margin: 5px 10px;
        border-radius: 15px 15px 15px 0;
        max-width: 75%;
        word-wrap: break-word;
    }

    /* Área de mensajes con desplazamiento automático */
    #messages {
        max-height: 250px;
        overflow-y: auto;
        display: flex !important;
        flex-direction: column;
        padding: 10px;
    }

    /* Estilo del área de entrada */
    #input-area {
        display: flex;
        border-top: 1px solid #ccc;
    }

    /* Campo de entrada de texto */
    #input {
        flex: 1;
        border: none;
        padding: 10px;
        font-size: 15px;
        border-radius: 0;
    }

    /* Botón de enviar */
    #send {
        border: none;
        background: #007aff;
        color: white;
        padding: 8px;
        cursor: pointer;
        font-size: 15px;
    }

    /* Botones de minimizar y cerrar */
    #minimize,
    #close {
        border: none;
        background: transparent;
        cursor: pointer;
        font-size: 20px;
    }



    #chat-header span {
        flex: 1;
        /* Permite que el span tome el espacio disponible */
        text-align: center;
        /* Centra el texto */
    }
</style>

<div id="chat-container" onclick="toggleChat()" aria-labelledby="chat-header" role="dialog">
    <div id="chat-header" role="heading" aria-level="1">
        <span>Chat</span>
        <div>
            <button id="minimize" aria-label="Maximizar chat"></button>
            <button id="close"aria-label="Cerrar chat">X</button>
        </div>
    </div>
    <div id="messages"></div>
    <div id="input-area">
        <input type="text" id="input" placeholder="Escribe tu mensaje..." aria-label="Campo de entrada de mensaje"/>
        <button id="send" aria-label="Enviar mensaje">Enviar</button>
    </div>
</div>




<script type="text/javascript" defer>
    const sendButton = document.getElementById('send');
    const inputField = document.getElementById('input');
    const messagesDiv = document.getElementById('messages');
    const minimizeButton = document.getElementById('minimize');
    const closeButton = document.getElementById('close');
    const chatContainer = document.getElementById('chat-container');

    // Cargar el historial al cargar la página
    window.onload = () => {
        //fetch('/chat/history')
        fetch('')
            .then(response => response.json())
            .then(data => {
                data.forEach(msg => {
                    messagesDiv.innerHTML += `<p><strong style="color:lightgrey;">Yo:</strong> ${msg.user_message}</p>`;
                    messagesDiv.innerHTML += `<p><strong style="color:red;">Bot:</strong> ${msg.bot_response}</p>`;
                });
                scrollToBottom(); // Hacer scroll al cargar el historial
            });

        // Minimizar el chat al cargar
        minimizeChat();
    };

    const sendMessage = () => {
        const userMessage = inputField.value.trim();
        if (userMessage) {
            messagesDiv.innerHTML += `<p class="user-message"><strong style="color:lightgrey;">Yo:</strong> ${userMessage}</p>`;
            inputField.value = '';

            fetch('/chat/response', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        message: userMessage
                    })
                })
                .then(response => response.json())
                .then(data => {
                    messagesDiv.innerHTML +=
                    `<p class="bot-message"><strong style="color:red;">Bot:</strong> ${data.response}</p>`;
                    scrollToBottom(); // Hacer scroll al agregar respuesta del bot
                });
        }
    };


    // Función para hacer scroll al final del chat
    const scrollToBottom = () => {
        messagesDiv.scrollTop = messagesDiv.scrollHeight;
    };

    const minimizeChat = () => {
        messagesDiv.style.display = 'none';
        document.getElementById('input-area').style.display = 'none';
        chatContainer.classList.add('minimized'); // Agregar clase para minimizar
    };

    const maximizeChat = () => {
        messagesDiv.style.display = 'block';
        document.getElementById('input-area').style.display = 'flex';
        chatContainer.classList.remove('minimized'); // Remover clase para maximizar
    };

    const toggleChat = () => {
        const isMinimized = chatContainer.classList.contains('minimized');
        if (isMinimized) {
            maximizeChat();
        } else {
            minimizeChat();
        }
    };

    sendButton.addEventListener('click', (event) => {
        event.stopPropagation(); // Evita minimizar el chat al dar click en enviar
        sendMessage();
    });


    // Evitar que el clic en el input minimice el chat
    inputField.addEventListener('click', (event) => {
        event.stopPropagation(); // Detiene la propagación del evento de clic
    });

    sendButton.addEventListener('click', sendMessage);

    inputField.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
            sendMessage();
            event.preventDefault(); // Evita que se inserte un salto de línea
        }
    });

    minimizeButton.addEventListener('click', () => {
        minimizeChat();
    });

    closeButton.addEventListener('click', () => {
        chatContainer.style.display = 'none'; // Cerrar el chat
    });
</script>
