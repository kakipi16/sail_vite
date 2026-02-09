import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './**/*.php',
    ],

    theme: {
        colors: {
            main: {
                DEFAULT: '#F2F2F2',
            },
            icon: {
                DEFAULT: '#049DD9',
            },
            btn: {
                DEFAULT: '#0487D9',
            },
        },
        extend: {

        },
    },

    plugins: [forms],
};
