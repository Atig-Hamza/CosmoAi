const userId = Math.random().toString(36).substring(7);

document.getElementById('chat-form').addEventListener('submit', async function (event) {
    event.preventDefault();
    const messageInput = document.getElementById('message-input');
    const userMessage = messageInput.value.trim();
    const chatContainer = document.getElementById('chat-container');

    if (chatContainer.querySelector('#slogan') || chatContainer.querySelector('#slogan2')) {
        chatContainer.innerHTML = '';
    }

    if (userMessage) {
        const isScrolledToBottom = chatContainer.scrollHeight - chatContainer.scrollTop === chatContainer.clientHeight;

        const sentMessageElement = document.createElement('div');
        sentMessageElement.className = 'user-message';
        sentMessageElement.style.paddingLeft = '88px';
        sentMessageElement.style.paddingRight = '88px';
        const youElement = document.createElement('div');
        youElement.style.fontWeight = 'bold';
        youElement.textContent = 'You';
        sentMessageElement.appendChild(youElement);

        const messageElement = document.createElement('div');
        messageElement.style.fontWeight = 'normal';
        messageElement.textContent = userMessage;
        sentMessageElement.appendChild(messageElement);
        chatContainer.appendChild(sentMessageElement);

        messageInput.value = '';

        const loadingElement = document.createElement('div');
        loadingElement.className = 'cosmo-message';
        loadingElement.style.paddingLeft = '88px';
        loadingElement.style.paddingRight = '88px';
        loadingElement.textContent = `Cosmo: Thinking...`;
        chatContainer.appendChild(loadingElement);

        try {
            const response = await fetch('http://localhost:3000/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ message: userMessage, userId }),
            });

            if (!response.ok) {
                throw new Error('Failed to fetch response from the server');
            }

            const data = await response.json();

            loadingElement.remove();

            const cosmoMessageElement = document.createElement('div');
            cosmoMessageElement.className = 'cosmo-message';
            cosmoMessageElement.style.paddingLeft = '88px';
            cosmoMessageElement.style.paddingRight = '88px';

            const cosmoNameElement = document.createElement('div');
            cosmoNameElement.style.fontWeight = 'bold';
            cosmoNameElement.textContent = 'Cosmo: ';
            cosmoMessageElement.appendChild(cosmoNameElement);

            const reader = new commonmark.Parser();
            const writer = new commonmark.HtmlRenderer();
            const parsedMarkdown = reader.parse(data.response);
            const htmlOutput = writer.render(parsedMarkdown);

            const messageElement = document.createElement('div');
            messageElement.innerHTML = htmlOutput;
            cosmoMessageElement.appendChild(messageElement);
            chatContainer.appendChild(cosmoMessageElement);

            messageElement.querySelectorAll('pre code').forEach((codeBlock) => {
                codeBlock.classList.add('hljs');
                hljs.highlightElement(codeBlock);
                codeBlock.style.backgroundColor = '#000';
                codeBlock.style.color = '#fff';
                codeBlock.style.padding = '10px';
                codeBlock.style.borderRadius = '5px';
            });

            if (isScrolledToBottom) {
                chatContainer.scrollTop = chatContainer.scrollHeight;
            }
        } catch (error) {
            console.error('Error:', error);
            loadingElement.textContent = `Cosmo: Sorry, something went wrong. Please try again.`;
        }
    }
});
