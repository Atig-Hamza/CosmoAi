const express = require('express');
const { HfInference } = require('@huggingface/inference');
const cors = require('cors');

const app = express();
const client = new HfInference('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');

app.use(cors());
app.use(express.json());

const conversations = new Map();

app.post('/chat', async (req, res) => {
  const { message, userId } = req.body;

  if (!message || !userId) {
    return res.status(400).json({ error: 'Message and userId are required' });
  }

  try {
    let conversationHistory = conversations.get(userId) || [];

    conversationHistory.push({ role: 'user', content: message });

    const response = await client.chatCompletion({
      model: '01-ai/Yi-1.5-34B-Chat',
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

const PORT = 3000;
app.listen(PORT, () => {
  console.log(`Server is running on http://localhost:${PORT}`);
});