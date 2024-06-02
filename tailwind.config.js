/** @type {import('tailwindcss').Config} */
export default {

  purge: ['./**/*.php', './**/*.html', './**/*.js'],
  darkMode: false, // or 'media' or 'class'

  
  content: [],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),

  ],
}

