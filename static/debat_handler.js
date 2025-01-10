const userId = Math.random().toString(36).substring(7);

document.getElementById('topic-input').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        if (event.shiftKey) {
            const cursorPosition = this.selectionStart;
            const text = this.value;
            this.value = text.slice(0, cursorPosition) + '\n' + text.slice(cursorPosition);
            this.selectionStart = this.selectionEnd = cursorPosition + 1;
            event.preventDefault();
        } else {
            event.preventDefault();
            document.getElementById('topic-form').dispatchEvent(new Event('submit'));
        }
    }
});

document.getElementById('topic-form').addEventListener('submit', async function (event) {
    event.preventDefault();
    const messageInput = document.getElementById('topic-input');
    const userMessage = messageInput.value.trim();
    const chatContainer = document.getElementById('debat-container');

    if (chatContainer.querySelector('#slogan') || chatContainer.querySelector('#slogan2')) {
        chatContainer.innerHTML = '';
    }

    if (userMessage) {
        const isScrolledToBottom = chatContainer.scrollHeight - chatContainer.scrollTop === chatContainer.clientHeight;

        const sentMessageElement = document.createElement('div');
        sentMessageElement.className = 'user-message';
        sentMessageElement.style.paddingLeft = '95px';
        sentMessageElement.style.paddingRight = '95px';
        sentMessageElement.style.marginBottom = '20px';
        sentMessageElement.style.fontSize = '18px';
        const youElement = document.createElement('div');
        youElement.style.fontWeight = 'bold';
        youElement.textContent = 'You';
        youElement.style.fontSize = '16px';
        sentMessageElement.appendChild(youElement);

        const messageElement = document.createElement('div');
        messageElement.style.fontWeight = 'normal';
        messageElement.textContent = userMessage;
        sentMessageElement.appendChild(messageElement);
        chatContainer.appendChild(sentMessageElement);

        messageInput.value = '';

        const loadingElement = document.createElement('div');
        loadingElement.className = 'cosmo-message';
        loadingElement.style.paddingLeft = '95px';
        loadingElement.style.paddingRight = '95px';
        loadingElement.style.fontSize = '18px';
        loadingElement.textContent = `Cosmo: Thinking...`;
        chatContainer.appendChild(loadingElement);

        try {
            const response = await fetch('https://192.168.8.152:8000/debat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ message: userMessage, userId }),
            });

            if (!response.ok) {
                throw new Error('Failed to fetch response from the server');
            }

            const reader = response.body.getReader();
            const decoder = new TextDecoder();

            let buffer = '';

            while (true) {
                const { done, value } = await reader.read();
                if (done) break;

                buffer += decoder.decode(value, { stream: true });

                const chunks = buffer.split('\n');
                buffer = chunks.pop();

                for (const chunk of chunks) {
                    if (chunk.trim() === '') continue;

                    const data = JSON.parse(chunk);

                    loadingElement.remove();

                    const modelMessageElement = document.createElement('div');
                    modelMessageElement.className = 'cosmo-message';
                    modelMessageElement.style.paddingLeft = '95px';
                    modelMessageElement.style.paddingRight = '95px';
                    modelMessageElement.style.fontSize = '18px';

                    const modelNameElement = document.createElement('div');
                    modelNameElement.style.fontWeight = 'bold';
                    modelNameElement.textContent = `${data.role === 'model1' ? 'Model 1 (Qwen)' : 'Model 2 (Hermes)'}: `;
                    modelNameElement.style.fontSize = '16px';
                    modelNameElement.style.color = 'red';
                    modelMessageElement.appendChild(modelNameElement);

                    const reader = new commonmark.Parser();
                    const writer = new commonmark.HtmlRenderer();
                    const parsedMarkdown = reader.parse(data.content);
                    const htmlOutput = writer.render(parsedMarkdown);

                    const messageElement = document.createElement('div');
                    messageElement.innerHTML = htmlOutput;
                    modelMessageElement.appendChild(messageElement);
                    chatContainer.appendChild(modelMessageElement);

                    if (isScrolledToBottom) {
                        chatContainer.scrollTop = chatContainer.scrollHeight;
                    }
                }
            }
        } catch (error) {
            console.error('Error:', error);
            loadingElement.textContent = `Cosmo: Sorry, something went wrong. Please try again.`;
        }
    }
});