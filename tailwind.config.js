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
              'dark-40': '#BFC0C4',
              'dark-20': '#E6E6E7',
              'dark-4': '#F6F6F7',
              'blue-border': '#2029F3',
              'green-button': '#0FBA68',
              'green-box': '#249E2C',
              'green-recovered': '#0FBA68',
              'blue-cases': '#2029F3',
              'yellow-death': '#EAD621',
            'error': '#CC1E1E',
          },
        backgroundImage: {
            'blue-bg': "url('/public/images/new-cases.png')",
            'green-bg': "url('/public/images/recovered.png')",
            'yellow-bg': "url('/public/images/death.png')",
      }
    },
  },
  plugins: [
      require("@tailwindcss/forms")
  ],
}
