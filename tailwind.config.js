/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
        colors: {
              'dark-100': '#010414',
              'dark-60': '#808189',
              'dark-20': '#E6E6E7',
              'blue-border': '#2029F3',
              'green-button': '#0FBA68',
              'green-box': '#249E2C',
          },
    },
  },
  plugins: [
      require("@tailwindcss/forms")
  ],
}
