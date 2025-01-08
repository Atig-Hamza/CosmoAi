const userId = Math.random().toString(36).substring(7);

document.getElementById('message-input').addEventListener('keydown', function (event) {
    if (event.key === 'Enter') {
        if (event.shiftKey) {
            const cursorPosition = this.selectionStart;
            const text = this.value;
            this.value = text.slice(0, cursorPosition) + '\n' + text.slice(cursorPosition);
            this.selectionStart = this.selectionEnd = cursorPosition + 1;
            event.preventDefault();
        } else {
            event.preventDefault();
            document.getElementById('chat-form').dispatchEvent(new Event('submit'));
        }
    }
});

document.getElementById('chat-form').addEventListener('submit', async function (event) {
    event.preventDefault();
    const messageInput = document.getElementById('message-input');
    const userMessage = messageInput.value.trim();
    const chatContainer = document.getElementById('chat-container');
    let hiddenPrompt = '';

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

        const deepThinkingButton = document.getElementById('deepthinking');
        const boostButton = document.getElementById('boost');
        const webSearchButton = document.getElementById('websearch');

        if (webSearchButton.classList.contains('bg-blue-700')) {
            hiddenPrompt = 'Please search for relevant links related to this and put them in last of the response.';
        } else if (boostButton.classList.contains('bg-blue-700')) {
            hiddenPrompt = 'Optimize the response and give the best output.';
        } else if (deepThinkingButton.classList.contains('bg-blue-700')) {
            hiddenPrompt = 'Break down the response into 5 steps that make reach this and steps must start with similar of i will, i must,...';
        }

        try {
            const response = await fetch('http://localhost:3000/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ message: userMessage + " " + hiddenPrompt, userId }),
            });

            if (!response.ok) {
                throw new Error('Failed to fetch response from the server');
            }

            const data = await response.json();

            loadingElement.remove();

            const cosmoMessageElement = document.createElement('div');
            cosmoMessageElement.className = 'cosmo-message';
            cosmoMessageElement.style.paddingLeft = '95px';
            cosmoMessageElement.style.paddingRight = '95px';
            cosmoMessageElement.style.fontSize = '18px';

            const cosmoNameElement = document.createElement('div');
            cosmoNameElement.style.fontWeight = 'bold';
            cosmoNameElement.textContent = 'Cosmo: ';
            cosmoNameElement.style.fontSize = '16px';
            cosmoMessageElement.appendChild(cosmoNameElement);

            const reader = new commonmark.Parser();
            const writer = new commonmark.HtmlRenderer();
            const parsedMarkdown = reader.parse(data.response);
            const htmlOutput = writer.render(parsedMarkdown);

            const messageElement = document.createElement('div');
            messageElement.innerHTML = htmlOutput;

            messageElement.innerHTML = messageElement.innerHTML.replace(
                /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/gi,
                (url) => `<span style="color: blue; cursor: pointer;" onclick="window.open('${url}', '_blank')">${url}</span>`
            );

            cosmoMessageElement.appendChild(messageElement);
            chatContainer.appendChild(cosmoMessageElement);

            messageElement.querySelectorAll('pre code').forEach((codeBlock) => {
                codeBlock.classList.add('hljs');
                hljs.highlightElement(codeBlock);
                codeBlock.style.backgroundColor = '#000';
                codeBlock.style.color = '#fff';
                codeBlock.style.padding = '10px';
                codeBlock.style.borderRadius = '5px';

                const copyButton = document.createElement('button');
                copyButton.textContent = 'Copy';
                copyButton.style.marginTop = '5px';
                copyButton.style.padding = '5px 10px';
                copyButton.style.backgroundColor = '#383734';
                copyButton.style.color = '#fff';
                copyButton.style.border = 'none';
                copyButton.style.borderRadius = '5px';
                copyButton.style.cursor = 'pointer';

                copyButton.addEventListener('click', () => {
                    navigator.clipboard.writeText(codeBlock.textContent).then(() => {
                        copyButton.textContent = 'Copied!';
                        setTimeout(() => (copyButton.textContent = 'Copy'), 2000);
                    });
                });

                codeBlock.parentNode.appendChild(copyButton);
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
