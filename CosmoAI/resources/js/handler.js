document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('.typing-form');
    const chatList = document.querySelector('.chat-list');
    const textarea = form.querySelector('.typing-input');
    const sendButton = document.getElementById('send-message-button');
    const header = document.querySelector('header');
  
    const userId = 'user-' + Math.random().toString(36).substr(2, 9);
  
    loadScript('https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js');
    loadStylesheet('https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/atom-one-dark.min.css');
    loadScript('https://cdnjs.cloudflare.com/ajax/libs/commonmark/0.30.0/commonmark.min.js');
    loadStylesheet('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
  
    addCustomStyles();
  
    function loadScript(url) {
      if (!document.querySelector(`script[src="${url}"]`)) {
        const script = document.createElement('script');
        script.src = url;
        document.head.appendChild(script);
      }
    }
  
    function loadStylesheet(url) {
      if (!document.querySelector(`link[href="${url}"]`)) {
        const link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = url;
        document.head.appendChild(link);
      }
    }
  
    function addCustomStyles() {
      const style = document.createElement('style');
      style.textContent = `
        /* Color variables */
        :root {
          --dark-blue-primary: #1a2b45;
          --dark-blue-secondary: #102033;
          --dark-blue-accent: #2c4870;
          --dark-blue-light: #3a5e8c;
          --dark-blue-highlight: #4a6ea0;
          --dark-blue-hover: #356199;
          --text-light: #e6f0ff;
          --text-code: #a3c7ff;
          --code-bg: #162538;
          --code-header: #121212;
        }
        
        /* Message styling */
        .message {
          
        }
        
        .user-message {
          background-color: #242424;
          border: 1px solid #333;
          color: #fff;
        }
        
        .ai-message {
          
        }
        
        /* Typography enhancements */
        .markdown-rendered h1 {
          font-size: 1.8rem;
          font-weight: bold;
          margin: 1.5rem 0 1rem;
          color: var(--text-light);
          border-bottom: 1px solid var(--dark-blue-accent);
          padding-bottom: 0.5rem;
        }
        
        .markdown-rendered h2 {
          font-size: 1.5rem;
          font-weight: bold;
          margin: 1.2rem 0 0.8rem;
          color: #c3d7ff;
        }
        
        .markdown-rendered h3 {
          font-size: 2.2rem;
          font-weight: bold;
          margin: 1rem 0 0.6rem;
          color: #fff;
        }
        
        .markdown-rendered p {
          margin: 0.75rem 0;
          line-height: 1.6;
          font-size: 1rem;
        }
        
        .markdown-rendered a {
          color: #6bb5ff;
          text-decoration: none;
          transition: color 0.2s;
        }
        
        .markdown-rendered a:hover {
          color: #8dc5ff;
          text-decoration: underline;
        }
        
        /* YouTube and image embeds */
        .youtube-embed {
          margin: 1rem 0;
          border-radius: 8px;
          overflow: hidden;
          box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
          position: relative;
          padding-bottom: 56.25%; /* 16:9 aspect ratio */
          height: 0;
          width: 100%;
        }
        
        .youtube-embed iframe {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          border-radius: 8px;
        }
        
        .image-embed {
          margin: 1rem 0;
          border-radius: 8px;
          overflow: hidden;
          box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
          text-align: center;
          width: 100%;
        }
        
        .image-embed img {
          max-width: 100%;
          border-radius: 8px;
          transition: transform 0.3s ease;
        }
        
        .image-embed img:hover {
          transform: scale(1.02);
        }
        
        /* Enhanced Code blocks */
        pre {
          position: relative;
          margin: 1rem 0;
          border-radius: 8px;
          background-color: var(--code-bg) !important;
          overflow: hidden;
          box-shadow: 0 3px 15px rgba(0, 0, 0, 0.4);
        }
        
        pre code {
          border-radius: 8px;
          font-family: 'Fira Code', 'Consolas', monospace;
          padding: 1.2rem !important;
          font-size: 0.95rem;
          line-height: 1.5;
          letter-spacing: 0.3px;
          color: var(--text-code);
        }
        
        .code-header {
          display: flex;
          justify-content: space-between;
          align-items: center;
          background-color: var(--code-header);
          padding: 0.5rem 1rem;
          color: #8eaeff;
          font-family: 'Consolas', monospace;
          font-size: 0.9rem;
          border-bottom: 1px solid #0c1522;
          height: 48px;
        }
        
        .copy-button {
          background-color: transparent;
          border: none;
          color: #f1f1f1;
          cursor: pointer;
          padding: 4px 8px;
          border-radius: 4px;
          transition: all 0.2s;
          display: flex;
          align-items: center;
          gap: 5px;
          font-size: 0.9rem;
        }
        
        .copy-button:hover {
          background-color: var(--dark-blue-hover);
          color: #ffffff;
        }
        
        .copy-button i {
          font-size: 1rem;
        }
        
        /* Line numbering for code */
        .line-numbers {
          position: absolute;
          left: 0;
          top: 0;
          padding: 1.2rem 0.6rem;
          text-align: right;
          background-color: var(--code-header);
          color: #5a7ebd;
          user-select: none;
          font-size: 0.85rem;
          line-height: 1.5;
          border-right: 1px solid #0c1522;
          margin-top: 47px;
          display: flex;
          flex-direction: column;
          gap: 5px;
        }
        
        /* Typing cursor */
        @keyframes blink {
          0%, 100% { opacity: 1; }
          50% { opacity: 0; }
        }
        
        .typing-cursor {
          display: inline-block;
          margin-left: 2px;
          width: 6px;
          height: 16px;
          background-color: #6bb5ff;
          animation: blink 1s infinite;
        }
        
        /* Lists */
        .markdown-rendered ul, .markdown-rendered ol {
          margin: 0.5rem 0 0.5rem 1rem;
        }
        
        .markdown-rendered li {
          margin: 0.3rem 0;
          line-height: 1.5;
        }
        
        /* Blockquotes */
        .markdown-rendered blockquote {
          margin: 1rem 0;
          padding: 0.5rem 0 0.5rem 1rem;
          background-color: var(--dark-blue-accent);
          border-radius: 6px;
          font-style: italic;
        }
        
        /* Tables */
        .markdown-rendered table {
          width: 100%;
          border-collapse: collapse;
          margin: 1rem 0;
          background-color: var(--dark-blue-secondary);
          border-radius: 6px;
          overflow: hidden;
        }
        
        .markdown-rendered th {
          background-color: var(--dark-blue-primary);
          padding: 0.6rem;
          text-align: left;
          font-weight: bold;
          color: var(--text-light);
        }
        
        .markdown-rendered td {
          padding: 0.6rem;
          border-top: 1px solid var(--dark-blue-accent);
        }

        iframe {
          height: 57vh;
          width: 74vw;
          margin: 0 auto;
        }
        
        /* Code language badge */
        .code-language {
          display: inline-block;
          padding: 2px 6px;
          font-size: 0.8rem;
          color: var(--text-light);
        }

        .hljs {
          margin-left: 19px;
        }

        .html5-video-player {
          width: 100vw;
          height: 100vh;
        }

        .ai-message ul {
          padding-left: 24px;
          border-left: 2px solid #515151;
        }

        .ai-message > p:first-of-type {
          font-style: italic;
          color: rgb(253 253 253);
          font-size: 0.92rem;
        }
      `;
      document.head.appendChild(style);
    }
  
    function addMessage(role, content, number = 'A') {
      const messageDiv = document.createElement('div');
      messageDiv.className = `message ${role}-message pl-4 pr-4 pt-2 pb-2 mb-1 rounded-lg text-left flex items-center`;

      const circleDiv = document.createElement('div');
      circleDiv.className = 'w-8 h-8 rounded-full bg-[#b8fd33] mr-4 flex items-center justify-center';
      const circleText = document.createElement('span');
      circleText.className = 'text-md font-bold text-[#242424]';
      circleText.textContent = number;
      circleDiv.appendChild(circleText);

      if (role === 'user') {
        const messageText = document.createElement('span');
        messageText.textContent = content;
        messageDiv.appendChild(circleDiv);
        messageDiv.appendChild(messageText);
      } else {
        messageDiv.classList.add('markdown-rendered');
        processAIContent(messageDiv, content);
        messageDiv.insertBefore(circleDiv, messageDiv.firstChild);
      }

      chatList.appendChild(messageDiv);
      document.body.scrollTop = document.body.scrollHeight;
    }
  
    function processAIContent(container, content) {
      if (typeof commonmark !== 'undefined') {
        const reader = new commonmark.Parser();
        const writer = new commonmark.HtmlRenderer();
        const parsed = reader.parse(content);
        let html = writer.render(parsed);
  
        html = processYouTubeLinks(html);
        html = processImageLinks(html);
  
        container.innerHTML = html;
  
        if (typeof hljs !== 'undefined') {
          container.querySelectorAll('pre code').forEach((block) => {
            const classes = block.className.split(' ');
            let language = 'text';
            
            for (const cls of classes) {
              if (cls.startsWith('language-')) {
                language = cls.replace('language-', '');
                break;
              }
            }
            
            hljs.highlightElement(block);
            
            const codeHeader = document.createElement('div');
            codeHeader.className = 'code-header';
            
            const languageBadge = document.createElement('span');
            languageBadge.className = 'code-language';
            languageBadge.textContent = language.charAt(0).toUpperCase() + language.slice(1);
            codeHeader.appendChild(languageBadge);
            
            const copyBtn = document.createElement('button');
            copyBtn.className = 'copy-button';
            copyBtn.innerHTML = '<i class="fa-solid fa-copy"></i> Copy';
            
            copyBtn.addEventListener('click', () => {
              navigator.clipboard.writeText(block.textContent);
              copyBtn.innerHTML = '<i class="fa-solid fa-check"></i> Copied';
              setTimeout(() => {
                copyBtn.innerHTML = '<i class="fa-solid fa-copy"></i> Copy';
              }, 2000);
            });
            
            codeHeader.appendChild(copyBtn);
            
            const content = block.textContent;
            const lines = content.split('\n');
            
            if (lines.length > 1) {
              const lineNumbers = document.createElement('div');
              lineNumbers.className = 'line-numbers';
              
              for (let i = 1; i + 1 <= lines.length; i++) {
                const lineNum = document.createElement('div');
                lineNum.textContent = i;
                lineNumbers.appendChild(lineNum);
              }
              
              block.style.paddingLeft = '2.5rem';
              
              const preBlock = block.parentNode;
              preBlock.style.position = 'relative';
              preBlock.insertBefore(codeHeader, block);
              preBlock.appendChild(lineNumbers);
            } else {
              const preBlock = block.parentNode;
              preBlock.insertBefore(codeHeader, block);
            }
          });
        }
      } else {
        container.textContent = content;
      }
    }
  
    function processYouTubeLinks(html) {
      const youtubeRegex = /https?:\/\/(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/g;
      return html.replace(youtubeRegex, (match, videoId) => {
        return `<div class="youtube-embed"><iframe src="https://www.youtube.com/embed/${videoId}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>`;
      });
    }
  
    function processImageLinks(html) {
      const imgRegex = /<p>(https?:\/\/(?:(?!youtube\.com).)*\.(?:png|jpg|jpeg|gif|webp))<\/p>/gi;
      return html.replace(imgRegex, (match, imageUrl) => {
        return `<div class="image-embed"><img src="${imageUrl}" alt="Embedded image" loading="lazy" title="Click to enlarge"></div>`;
      });
    }

    textarea.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' && !e.shiftKey && !e.ctrlKey) {
            e.preventDefault();
            document.querySelector('.typing-form').dispatchEvent(new Event('submit'));
        }
    });
  
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      const message = textarea.value.trim();
      if (!message) return;
  
      if (header) header.remove();
  
      addMessage('user', message);
      textarea.value = '';
      sendButton.disabled = true;
  
      const aiResponseDiv = document.createElement('div');
      aiResponseDiv.className = 'message ai-message p-2 mb-2 rounded-lg text-left markdown-rendered';
  
      // Simple loading indicator with cursor
      const loadingIndicator = document.createElement('span');
      loadingIndicator.className = 'typing-cursor';
      
      if (!document.getElementById('cursor-style')) {
        const style = document.createElement('style');
        style.id = 'cursor-style';
        style.textContent = `
          @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
          }
          .typing-cursor {
            display: inline-block;
            margin-left: 2px;
            width: 2px;
            height: 16px;
            background-color: #ffffff;
            animation: blink 1s infinite;
            vertical-align: middle;
            border-radius: 5px;
          }
        `;
        document.head.appendChild(style);
      }
  
      aiResponseDiv.appendChild(loadingIndicator);
      document.body.scrollTop = document.body.scrollHeight
      chatList.appendChild(aiResponseDiv);
  
      try {
        const response = await fetch('https://localhost:8000/chat', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({ message, userId }),
        });
  
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
  
        const data = await response.json();
  
        if (loadingIndicator.parentNode === aiResponseDiv) {
          aiResponseDiv.removeChild(loadingIndicator);
        }
  
        processAIContent(aiResponseDiv, data.response);
        
      } catch (error) {
        console.error('Error:', error);
        
        if (loadingIndicator.parentNode === aiResponseDiv) {
          aiResponseDiv.removeChild(loadingIndicator);
          document.body.scrollTop = document.body.scrollHeight
        }
        
        aiResponseDiv.textContent = 'Error: Could not get response from AI';
        document.body.scrollTop = document.body.scrollHeight
      } finally {
        sendButton.disabled = false;
      }
    });
  });
