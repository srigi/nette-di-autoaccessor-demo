/** @type {import("tailwindcss").Config} */
module.exports = {
  content: ["src/**/*.latte", "temp/cache/latte/*.php"],
  theme: {
    container: {
      center: true,
      screens: {
        md: "1280px",
      },
    }
  },

  plugins: [],
}
