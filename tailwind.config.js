const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],


    plugins: [require('@tailwindcss/forms')],
};
