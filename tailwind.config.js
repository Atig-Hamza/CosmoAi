/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './templates/**/*.html',
    './static/**/*.{js,html}',
  ],
  safelist: [
    'grid',
    'grid-cols-12',
    'grid-rows-12',
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

