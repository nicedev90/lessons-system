/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['../app/**/*'],
  theme: {
    screens: {
      sm: '480px',
      md: '768px',
      lg: '976px',
      xl: '1440px'
    },
    extend: {
      colors: {
        neutralLight: 'hsl(187,100%,95.3%)',
        neutral: 'hsl(187,100%,87.3%)',
        neutralDark: 'hsl(187,100%,75.3%)',
        primaryLight: 'hsl(201,90.3%,63.7%)',
        primary: 'hsl(201,90.3%,55.7%)',
        primaryDark: 'hsl(201,90.3%,43.7%)',
        ctaLight: 'hsl(356,90.4%,75.3%)',
        cta: 'hsl(356,90.4%,67.3%)',
        ctaDark: 'hsl(356,90.4%,55.3%)',
        dark: 'hsl(208,72.8%,20.2%)'
      }
    },
  },
  plugins: [],
}
