module.exports = {
  theme: {
    extend: {}
  },
  variants: {
    backgroundColor: ['responsive', 'hover', 'focus', 'even', 'odd']
  },
  plugins: [
    require('@tailwindcss/custom-forms')
  ],
}
