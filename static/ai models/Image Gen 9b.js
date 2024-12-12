import readlineSync from 'readline-sync';
import fs from 'fs';
import path from 'path';
import open from 'open';

const __dirname = path.resolve();

async function query(data) {
  const maxRetries = 3;
  let attempt = 0;

  while (attempt < maxRetries) {
    try {
      const response = await fetch(
        "https://api-inference.huggingface.co/models/CompVis/stable-diffusion-v1-4",
        {
          headers: {
            Authorization: "Bearer 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",
            "Content-Type": "application/json",
          },
          method: "POST",
          body: JSON.stringify(data),
        }
      );

      if (!response.ok) {
        throw new Error(`Failed to fetch from Hugging Face API. Status: ${response.status}`);
      }

      const result = await response.blob();
      return result;

    } catch (error) {
      if (response && response.status === 500) {
        console.log(`Server error (500). Retrying... (${attempt + 1}/${maxRetries})`);
        attempt++;
        if (attempt === maxRetries) {
          console.error("Max retries reached. Please try again later.");
          throw error;
        }
        await new Promise(resolve => setTimeout(resolve, 3000));
      } else {
        console.error("Error interacting with the model:", error);
        throw error;
      }
    }
  }
}

async function saveImage(imageBlob) {
  const imagesDir = path.join(__dirname, 'images');
  if (!fs.existsSync(imagesDir)) {
    fs.mkdirSync(imagesDir);
  }

  const filePath = path.join(imagesDir, 'generated_image.png');
  const buffer = Buffer.from(await imageBlob.arrayBuffer());
  fs.writeFileSync(filePath, buffer);

  console.log(`Image saved to ${filePath}`);
  return filePath;
}

async function chatWithModel() {
  console.log("Starting conversation. Type 'exit' to end the chat.");

  while (true) {
    const userInput = readlineSync.question("You: ");
    if (userInput.toLowerCase() === "exit") {
      console.log("Ending the conversation. Goodbye!");
      break;
    }

    try {
      const imageBlob = await query({ inputs: userInput });

      if (imageBlob) {
        console.log("Assistant generated an image!");
        const imagePath = await saveImage(imageBlob);
        await open(imagePath);
      } else {
        console.log("No image generated. Please check the model response.");
      }
    } catch (error) {
      console.error("Error interacting with the model:", error);
    }
  }
}

chatWithModel();

