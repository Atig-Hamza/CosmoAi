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
    sentMessageElement.textContent = `You: ${userMessage}`;
    chatContainer.appendChild(sentMessageElement);

    messageInput.value = '';

    const loadingElement = document.createElement('div');
    loadingElement.className = 'cosmo-message';
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

      const reader = new commonmark.Parser();
      const writer = new commonmark.HtmlRenderer();
      const parsedMarkdown = reader.parse(`Cosmo: ${data.response}`);
      const htmlOutput = writer.render(parsedMarkdown);

      cosmoMessageElement.innerHTML = htmlOutput;
      chatContainer.appendChild(cosmoMessageElement);

      if (isScrolledToBottom) {
        chatContainer.scrollTop = chatContainer.scrollHeight;
      }
    } catch (error) {
      console.error('Error:', error);
      loadingElement.textContent = `Cosmo: Sorry, something went wrong. Please try again.`;
    }
  }
});
