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
            animation: {
                'slide-in': 'slideIn 0.5s ease-out forwards',
                'slide-out': 'slideOut 0.5s ease-out forwards'
            },
            
            colors: {
                'appBackground': '#181C1F',
                'containerBackground': '#212529',
                'containerGradient': '#252B30',
                'textColor': '#D6DCD8',
                'main': '#262D3D',
                'second-main': '#2D3446',
                'background': '#CDD1DD',
                'second': '#349762',
                'secondGradient': '#2D8555',
                'border': '#323846',
                'hover': '#2F353A'
            },
            keyframes: {
                slideIn: {
                '0%': { transform: 'translateY(-100%)' },
                '100%': { transform: 'translateX(0)' },
                },

                slideOut: {
                '0%': { transform: 'translateX(0)' },
                '100%': { transform: 'translateY(-100%)' },
                },
            },
        },
    },

    plugins: [forms],
};
