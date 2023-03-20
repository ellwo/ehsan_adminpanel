const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");
const { primary } = require("laravel-mix/src/Mix");

module.exports = {
    mode: "jit",
    darkMode: "class",
    purge: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/views/**/**/*.blade.php",
        "./resources/js/**/*.js",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                dark: {
                    bg: "#151823",
                    "eval-1": "#222738",
                    "eval-2": "#2A2F42",
                    "eval-3": "#2C3142",
                },
                base: {
                    "10": "#21337D",
                    "20": "#111E51",
                    "30": "#0A1232",
                    "100": "#070C21",
                    "300": "#070C62"

                },
                primary_color: "#FF7D00",
                light: 'var(--light)',
                dark: 'var(--dark)',
                darker: 'var(--darker)',
                primary: {
                    DEFAULT: 'var(--color-primary)',
                    50: 'var(--color-primary-50)',
                    100: 'var(--color-primary-100)',
                    light: 'var(--color-primary-light)',
                    lighter: 'var(--color-primary-lighter)',
                    dark: 'var(--color-primary-dark)',
                    darker: 'var(--color-primary-darker)',
                    onprimary: 'var(--color-primary-onprimary)'
                },
                m_primary: {
                    DEFAULT: '#FF7D00',
                    50: '#c1c3c9',
                    100: '#424474',
                    light: '#FF7D00',
                    lighter: '#fa973a',
                    dark: '#101b3f',
                    darker: '#070C21',
                    onprimary: '#0b0842'
                },
                secondary: {
                    DEFAULT: colors.fuchsia[600],
                    50: colors.fuchsia[50],
                    100: colors.fuchsia[100],
                    light: colors.fuchsia[500],
                    lighter: colors.fuchsia[400],
                    dark: colors.fuchsia[700],
                    darker: colors.fuchsia[800],

                },
                success: {
                    DEFAULT: colors.green[600],
                    50: colors.green[50],
                    100: colors.green[100],
                    light: colors.green[500],
                    lighter: colors.green[400],
                    dark: colors.green[700],
                    darker: colors.green[800],
                },
                warning: {
                    DEFAULT: colors.orange[600],
                    50: colors.orange[50],
                    100: colors.orange[100],
                    light: colors.orange[500],
                    lighter: colors.orange[400],
                    dark: colors.orange[700],
                    darker: colors.orange[800],
                },
                danger: {
                    DEFAULT: colors.red[600],
                    50: colors.red[50],
                    100: colors.red[100],
                    light: colors.red[500],
                    lighter: colors.red[400],
                    dark: colors.red[700],
                    darker: colors.red[800],
                },
                info: {
                    DEFAULT: colors.cyan[600],
                    50: colors.cyan[50],
                    100: colors.cyan[100],
                    light: colors.cyan[500],
                    lighter: colors.cyan[400],
                    dark: colors.cyan[700],
                    darker: colors.cyan[800],

                },
            },
        },
    },
    variants: {
        extend: {
            backgroundColor: ['checked', 'disabled'],
            opacity: ['dark'],
            overflow: ['hover'],
        },
    },

    plugins: [require("@tailwindcss/forms")],
};