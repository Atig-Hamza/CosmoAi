/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './templates/**/*.html',
    './static/**/*.{js,html}',
  ],
  theme: {
    extend: {
      fontFamily: {
        jura: ['Jura'],
      },
    },
  },
  plugins: [],
}
