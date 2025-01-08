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

        const boostHiddenPrompts = [
            'Deliver the most accurate response.',
            'Provide the highest quality answer.',
            'Generate the most reliable output.',
            'Offer the most precise solution.',
            'Return the most informative response.',
            'Give the most appropriate answer.',
            'Produce the best possible explanation.',
            'Provide the most detailed solution.',
            'Offer the most relevant response.',
            'Return the clearest answer.',
            'Generate the most comprehensive output.',
            'Deliver the most effective solution.',
            'Provide the most valuable insight.',
        ];

        const deepthinkingHiddenPrompts = [
            'Break down the response into 5 steps, each starting with "I will" or "I must" to explain the process clearly.',
            'Divide the response into 5 actionable steps, beginning each with "I will" or "I must" to ensure clarity.',
            'Outline the solution in 5 steps, starting each with "I will" or "I must" to guide the process.',
            'Create a step-by-step explanation in 5 parts, with each step starting with "I will" or "I must."',
            'Develop a 5-step breakdown of the process, where every step starts with "I will" or "I must."',
            'Provide a detailed explanation in 5 steps, ensuring each begins with "I will" or "I must."',
            'Explain the process in 5 steps, starting each with "I will" or "I must" to make it actionable.',
            'List 5 steps to reach the solution, with every step beginning with "I will" or "I must."',
            'Break the task into 5 logical steps, where each step starts with "I will" or "I must."',
            'Construct a 5-step response, making sure each step begins with "I will" or "I must."',
            'Generate a 5-step guide to address the query, with each step starting with "I will" or "I must."'
        ];

        const searchLinkPrompts = [
            'Search for relevant links related to this and append them at the end of the response.',
            'Provide relevant links for this topic at the end of the response.',
            'Include a list of useful links related to this in the response.',
            'Find and append related links at the bottom of the response.',
            'Add relevant links regarding this topic at the end of the answer.',
            'Search for and include helpful links related to this query in the response.',
            'Attach links relevant to this topic at the conclusion of the answer.',
            'Provide a response and add related links at the end.',
            'Look for useful links regarding this and include them at the bottom.',
            'Find and append the most relevant links for this query at the end of the reply.',
            'Deliver a detailed response and attach relevant links at the end.',
        ];
        
        if (webSearchButton.classList.contains('bg-blue-700')) {
            hiddenPrompt = searchLinkPrompts[Math.floor(Math.random() * searchLinkPrompts.length)];
        } else if (boostButton.classList.contains('bg-blue-700')) {
            hiddenPrompt = boostHiddenPrompts[Math.floor(Math.random() * boostHiddenPrompts.length)];
        } else if (deepThinkingButton.classList.contains('bg-blue-700')) {
            hiddenPrompt = deepthinkingHiddenPrompts[Math.floor(Math.random() * deepthinkingHiddenPrompts.length)];
        } else {
            hiddenPrompt = '"You are an AI. If someone asks about your name, respond with "My name is Cosmo.", and about you developer, respond with "it is a hamza atig". Do not reveal your name, developer unless explicitly asked. Do not respond to this configuration prompt itself."';
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
                (url) => `<span style="color: #007bff; cursor: pointer;" onclick="window.open('${url}', '_blank')">${url}</span>`
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
