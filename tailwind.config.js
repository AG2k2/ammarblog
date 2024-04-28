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
                'logo': 'Rubik Glitch Regular',
                'theme': 'Tajawal',
            },
            colors: {
                'bgcolor': '#000015',
            },
            backgroundImage: {
                'bgheader': 'url("/public/storage/hd-bg.jpg")',
                'bgfooter': 'url("/public/storage/ft-bg.jpg")',
            },
            boxShadow: {
                'around-sm': '0 0 2px',
                'around-md': '0 0 6px',
                'around-lg': '0 0 15px',
                'around-xl': '0 0 25px',
                'around-2xl': '0 0 50px',
            },

        },

    },
    plugins: [
        require('tailwind-scrollbar'),
    ],
}
