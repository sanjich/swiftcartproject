/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./index.html",".{html,js}","./desktop/*.html","./phones/*.html","./gadgets/*.html","./laptops/*.html", "./footer/*.html","./*.html"],
  theme: {
    extend: {},
  },
  plugins: [
  require('daisyui')
],
}