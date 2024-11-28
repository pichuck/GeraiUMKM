/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                'custom-blue': '#97E8FF',
                'custom-blue1': '#63B4CA',
                'custom-teal': '#4A9BB0',
                'custom-navy': '#096B7F',
              },
              gradientColorStops: {
                'custom-start': '#63B4CA',
                'custom-end': '#315964',
              },
        },
        fontFamily: {
            poppins: ['Poppins', 'sans-serif'],
          },
    },
    plugins: [],
};
