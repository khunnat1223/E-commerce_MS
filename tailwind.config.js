import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        ["./src/**/*.{html,js}"],
    ],
    darkMode: 'class',
    theme: {
        extend: {
            fontFamily: {
                sans: ['khmer os battambang','Century', ...defaultTheme.fontFamily.sans],
                // khmer: ['"Khmer M1"', '"Roboto"'],
                khmer: ['"Roboto"', '"Khmer M1"'],

            },
        },
    },

    plugins: [forms],
};
