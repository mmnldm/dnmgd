/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./*.{html,js}', ],
  theme: {
    screens: {
      sm: '400px',
      md: '760px',
      lg: '975px',
      xl: '1440px',
      ml:'425px',
      mo:'414px',
    },
    extend: {
      fontFamily: {
        'digital-font': ['DS-Digital', 'sans-serif'],
        'vcr-osd': ['VCR OSD Mono', 'sans-serif']
                                                
      },
    },
  },
  plugins: [],
}
