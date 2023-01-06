/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./index.php","./Profil.php"],
  theme: {
    extend: {
      fontFamily: {
        Akira: ["Akira Super", "sans-serif"],
        Bahn: ["bahnschrift", "sans-serif"],
      },
      backgroundImage: {
        'bannerpromo': "url('../image/bannerpromo.png')",
      }
    },
  },
  plugins: [],
}