// **Optimized Configuration**
module.exports = {
  content: [
    './src/**/*.{html,php}',     // Looks for .html and .php inside src/
    './templates/**/*.{html,php}', // Looks for .html and .php inside templates/
    './components/**/*.{html,php}'
  ],
  theme: {
    extend: {
      fontSize: {
        base: '0.90rem',
        sm: '0.85rem'
      },
      fontFamily: {
        sans: ["Inter Tight", "sans-serif"],
      }
    }
  },
  plugins: [],
}