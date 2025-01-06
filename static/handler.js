const userId = Math.random().toString(36).substring(7);

    document.getElementById('chat-form').addEventListener('submit', async function (event) {
      event.preventDefault();
      const messageInput = document.getElementById('message-input');
      const userMessage = messageInput.value.trim();

      if (userMessage) {
        const chatContainer = document.getElementById('chat-container');
        if (chatContainer.querySelector('#slogan') || chatContainer.querySelector('#slogan2')) {
          chatContainer.innerHTML = '';
        }

        const sentMessageElement = document.createElement('div');
        sentMessageElement.className = 'user-message';
        sentMessageElement.textContent = `You: ${userMessage}`;
        chatContainer.appendChild(sentMessageElement);

        messageInput.value = '';

        const loadingElement = document.createElement('div');
        loadingElement.className = 'cosmo-message';
        loadingElement.textContent = `Cosmo: Thinking...`;
        chatContainer.appendChild(loadingElement);

        chatContainer.scrollTop = chatContainer.scrollHeight;

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

          loadingElement.textContent = `Cosmo: ${data.response}`;
        } catch (error) {
          console.error('Error:', error);
          loadingElement.textContent = `Cosmo: Sorry, something went wrong. Please try again.`;
        }

        chatContainer.scrollTop = chatContainer.scrollHeight;
      }
    });