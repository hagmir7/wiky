/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        './vendor/awcodes/filament-quick-create/resources/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                'primary': {
                    '50': '#eefffc',
                    '100': '#c6fff7',
                    '200': '#8efff0',
                    '300': '#4dfbe8',
                    '400': '#19e8d8',
                    '500': '#00bfb3',
                    '600': '#00a49e',
                    '700': '#02837f',
                    '800': '#086765',
                    '900': '#0c5553',
                    '950': '#003334',
                },

            }
        },
    },
    plugins: [],
}

