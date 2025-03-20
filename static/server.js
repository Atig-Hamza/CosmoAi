import https from 'https';
import fs from 'fs';
import express from 'express';
import cors from 'cors';
import fetch from 'node-fetch';

const app = express();
const HYPERBOLIC_API_KEY = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJoYW16YWF0aWc1OEBnbWFpbC5jb20iLCJpYXQiOjE3NDIyOTQyNDV9.AKK1DBxR29fSSkLhA9sB_eR1jEgz0tIq1pZJP50QLjM';

app.use(cors());
app.use(express.json());

const conversations = new Map();

// Set up HTTPS
const sslOptions = {
  key: fs.readFileSync('C:/Users/imane/Desktop/CosmoAi/ssl/key.pem'),
  cert: fs.readFileSync('C:/Users/imane/Desktop/CosmoAi/ssl/cert.pem'),
};

async function callHyperbolicAPI(messages, model = 'deepseek-ai/DeepSeek-V3', temp = 0.6) {
  try {
    const response = await fetch('https://api.hyperbolic.xyz/v1/chat/completions', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${HYPERBOLIC_API_KEY}`,
      },
      body: JSON.stringify({
        model: model,
        messages: messages,
        temperature: temp,
        max_tokens: 2000,
        top_p: 0.9,
        stream: false
      }),
    });

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const data = await response.json();
    return data.choices[0].message.content;
  } catch (error) {
    console.error('API Error:', error);
    throw error;
  }
}

app.post('/chat', async (req, res) => {
  const { message, userId } = req.body;

  if (!message || !userId) {
    return res.status(400).json({ error: 'Message and userId are required' });
  }

  try {
    let conversationHistory = conversations.get(userId) || [];
    conversationHistory.push({ role: 'user', content: message });

    const modelResponse = await callHyperbolicAPI(conversationHistory);
    conversationHistory.push({ role: 'assistant', content: modelResponse });
    conversations.set(userId, conversationHistory);

    res.json({ response: modelResponse });
  } catch (error) {
    console.error('Error:', error);
    res.status(500).json({ error: 'Something went wrong' });
  }
});

app.post('/voice', async (req, res) => {
  const { message, userId } = req.body;

  if (!message || !userId) {
    return res.status(400).json({ error: 'Message and userId are required' });
  }

  try {
    let conversationHistory = conversations.get(userId) || [];
    conversationHistory.push({ role: 'user', content: message });

    const modelResponse = await callHyperbolicAPI(conversationHistory);
    conversationHistory.push({ role: 'assistant', content: modelResponse });
    conversations.set(userId, conversationHistory);

    res.json({ response: modelResponse });
  } catch (error) {
    console.error('Error:', error);
    res.status(500).json({ error: 'Something went wrong' });
  }
});

app.post('/debat', async (req, res) => {
  const { message, userId } = req.body;

  function isRepeatedContent(history, newContent) {
    return history.some(entry => entry.content === newContent);
  }

  if (!message || !userId) {
    return res.status(400).json({ error: 'Message and userId are required' });
  }

  try {
    let conversationHistory = conversations.get(userId) || [];
    conversationHistory.push({ role: 'user', content: message });

    if (conversationHistory.length === 1) {
      const model1Question = `${message}?`;
      if (!isRepeatedContent(conversationHistory, model1Question)) {
        const prompt = "Let's kick off our discussion with this inquiry, or if it's not a question, feel free to start a dialogue with me and don't say this sentence Hello! How can I assist you today? for ever: ";
        const fullMessage = prompt + model1Question;

        if (!isRepeatedContent(conversationHistory, fullMessage)) {
          conversationHistory.push({ role: 'model1', content: fullMessage });
          res.write(JSON.stringify({ role: 'model1', content: fullMessage }) + '\n');
        }
      }
    }

    while (true) {
      const lastEntry = conversationHistory[conversationHistory.length - 1];

      if (lastEntry.role === 'model1') {
        const model2Message = await callHyperbolicAPI(
          conversationHistory,
          'deepseek-ai/DeepSeek-V3',
          0.6
        );

        const model2Prompt = "Let's keep it casual and human-like. Feel free to engage in a simple, open discussion with me: ";
        const fullModel2Message = model2Prompt + model2Message;

        if (!isRepeatedContent(conversationHistory, fullModel2Message)) {
          conversationHistory.push({ role: 'model2', content: fullModel2Message });
          res.write(JSON.stringify({ role: 'model2', content: fullModel2Message }) + '\n');
        } else {
          break;
        }
      } else if (lastEntry.role === 'model2') {
        const model1Message = await callHyperbolicAPI(
          conversationHistory,
          'deepseek-ai/DeepSeek-V3',
          0.6
        );

        if (!isRepeatedContent(conversationHistory, model1Message)) {
          conversationHistory.push({ role: 'model1', content: model1Message });
          res.write(JSON.stringify({ role: 'model1', content: model1Message }) + '\n');
        } else {
          break;
        }
      } else {
        break;
      }

      if (conversationHistory.length >= 10) {
        break;
      }
    }

    conversations.set(userId, conversationHistory);
    res.end();
  } catch (error) {
    console.error('Error:', error);
    res.status(500).json({ error: 'Something went wrong' });
  }
});

const PORT = 8000;

https.createServer(sslOptions, app).listen(PORT, () => {
  console.log(`Server is running on https://localhost:${PORT}`);
});