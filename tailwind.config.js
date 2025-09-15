import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        colors: {
            'appBackground': '#181C1F',
            'containerBackground': '#212529',
            'textColor': '#D6DCD8',
            'main': '#262D3D',
            'second-main': '#2D3446',
            'background': '#CDD1DD',
            'second': '#349762',
            'border': '#323846'
        }
        },
    },

    plugins: [forms],
};
