import express from 'express';
import { HfInference } from '@huggingface/inference';
import cors from 'cors';
import https from 'https';
import fs from 'fs';
import dotenv from 'dotenv';
dotenv.config();

const app = express();
const client = new HfInference(process.env.HUGGING_API_KEY);
const conversations = new Map();

app.use(cors());
app.use(express.json());

const sslOptions = {
    key: fs.readFileSync('C:/Users/imane/Desktop/CosmoAi/ssl/key.pem'),
    cert: fs.readFileSync('C:/Users/imane/Desktop/CosmoAi/ssl/cert.pem'),
};

app.post('/caption-image', async (req, res) => {
    const { image } = req.body;

    if (!image) {
        return res.status(400).json({ error: 'Image data is required' });
    }

    try {
        const imageBuffer = Buffer.from(image, 'base64');

        const response = await client.imageToText({
            data: imageBuffer,
            model: 'Salesforce/blip-image-captioning-large',
        });

        console.log("Image captioning response:", response);
        res.json({ caption: response.generated_text });
    } catch (error) {
        console.error('Error in /caption-image:', error);
        res.status(500).json({ error: 'Something went wrong' });
    }
});

app.post('/vid', async (req, res) => {
    const { message, userId, imageCaption } = req.body;

    if (!message || !userId) {
        return res.status(400).json({ error: 'Message and userId are required' });
    }

    try {
        let conversationHistory = conversations.get(userId) || [];
        conversationHistory.push({ role: 'user', content: message });

        if (imageCaption) {
            conversationHistory.push({ role: 'system', content: `Image Context: ${imageCaption}` });
        }

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

const PORT = 8000;
https.createServer(sslOptions, app).listen(PORT, () => {
    console.log(`Server is running on https://localhost:${PORT}`);
});