const https = require('https');
const fs = require('fs');
const express = require('express');
const { HfInference } = require('@huggingface/inference');
const cors = require('cors');
const multer = require('multer');

const app = express();
const client = new HfInference('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');

app.use(cors());
app.use(express.json());

const conversations = new Map();

// Set up HTTPS
const sslOptions = {
  key: fs.readFileSync('C:/Users/imane/Desktop/CosmoAi/ssl/key.pem'),
  cert: fs.readFileSync('C:/Users/imane/Desktop/CosmoAi/ssl/cert.pem'),
};


app.post('/chat', async (req, res) => {
  const { message, userId } = req.body;

  if (!message || !userId) {
    return res.status(400).json({ error: 'Message and userId are required' });
  }

  try {
    let conversationHistory = conversations.get(userId) || [];

    conversationHistory.push({ role: 'user', content: message });

    const response = await client.chatCompletion({
      model: 'Qwen/Qwen2.5-Coder-32B-Instruct',
      messages: conversationHistory,
      temperature: 0.6,
      max_tokens: 2000,
      top_p: 0.9,
    });

    const modelResponse = response.choices[0].message.content;

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

    const response = await client.chatCompletion({
      model: 'Qwen/Qwen2.5-Coder-32B-Instruct',
      messages: conversationHistory,
      temperature: 0.6,
      max_tokens: 2000,
      top_p: 0.9,
    });

    const modelResponse = response.choices[0].message.content;
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
        const model2Response = await client.chatCompletion({
          model: 'NousResearch/Hermes-3-Llama-3.1-8B',
          messages: conversationHistory,
          temperature: 0.6,
          max_tokens: 150,
          top_p: 0.9,
        });
        const model2Message = model2Response.choices[0].message.content;

        const model2Prompt = "Let's keep it casual and human-like. Feel free to engage in a simple, open discussion with me: ";
        const fullModel2Message = model2Prompt + model2Message;

        if (!isRepeatedContent(conversationHistory, fullModel2Message)) {
          conversationHistory.push({ role: 'model2', content: fullModel2Message });
          res.write(JSON.stringify({ role: 'model2', content: fullModel2Message }) + '\n');
        } else {
          break;
        }
      } else if (lastEntry.role === 'model2') {
        const model1Response = await client.chatCompletion({
          model: 'Qwen/Qwen2.5-Coder-32B-Instruct',
          messages: conversationHistory,
          temperature: 0.6,
          max_tokens: 150,
          top_p: 0.9,
        });
        const model1Message = model1Response.choices[0].message.content;

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
  console.log(`Server is running on https://192.168.8.152:${PORT}`);
});
