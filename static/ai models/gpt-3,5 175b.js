import { HfInference } from "@huggingface/inference";
import readlineSync from 'readline-sync';

const client = new HfInference("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");

async function chatWithModel() {
  let conversationHistory = [];  

  while (true) {
    const userInput = readlineSync.question("You: ");
    if (userInput.toLowerCase() === "exit") {
      console.log("Ending the conversation. Goodbye!");
      break;
    }

    conversationHistory.push({ role: "user", content: userInput });

    try {
      const responseStream = client.chatCompletionStream({
        model: "01-ai/Yi-1.5-34B-Chat",  
        messages: conversationHistory,
        temperature: 0.6,
        max_tokens: 100,
        top_p: 0.9,
      });

      let modelResponse = "";
      for await (const chunk of responseStream) {
        if (chunk.choices && chunk.choices.length > 0) {
          const newContent = chunk.choices[0].delta.content;
          modelResponse += newContent;
        }
      }

      console.log(`Assistant: ${modelResponse}`);

      conversationHistory.push({ role: "assistant", content: modelResponse });

    } catch (error) {
      console.error("Error interacting with the model:", error);
    }
  }
}

chatWithModel();

