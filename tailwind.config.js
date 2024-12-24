import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        "./node_modules/flowbite/**/*.js",

    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                serif: ['Mina']
            },
            colors: {
                hijaumuda: '#6A9C89',
                hijautua: '#16423C',
                putih: '#E9EFEC',
                hijaumudaaa: '#5F7465',
                hijaucerah: '#0BB489',
                hijaunavbar: '#C4DAD2'
            },
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
};
