import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class', // Corregido aquí
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        extend: {
            backgroundImage: {
                'custom-gradient-light': 'linear-gradient(to right, #4E9E19 50%, #ffffff 50%)',
                'custom-gradient-dark': 'linear-gradient(to right, #1E5128 50%, #383838 50%)',
            },
            colors: {
                'custom-bg-verde': '#4E9E19',
                'custom-bg-dark': '#2c4e19',
                'custom-bg-base': '#f2fce9',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        require('tailwind-scrollbar'),

    ],
};
