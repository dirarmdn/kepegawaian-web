/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        main : ['Nunito','sans-serif'],
      },
      colors: {
        'ebony-clay': {
          '50': '#f2f5fb',
          '100': '#e7ecf8',
          '200': '#d3dbf2',
          '300': '#b8c5e9',
          '400': '#9ba7de',
          '500': '#838ad1',
          '600': '#696bc2',
          '700': '#5958aa',
          '800': '#4a4c89',
          '900': '#23243c',
        },
        'alejandro': {
          '50': '#ecfffe',
          '100': '#cefffe',
          '200': '#b2fefe',
          '300': '#64fafc',
          '400': '#1eecf2',
          '500': '#02cfd8',
          '600': '#04a5b6',
          '700': '#0b8493',
          '800': '#136977',
          '900': '#145765',
      },      
      },
    },
    plugins: [],
  }
}
