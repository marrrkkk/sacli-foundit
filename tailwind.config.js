import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "sacli-green": {
                    50: "#D1FAE5", // Light green
                    100: "#A7F3D0",
                    200: "#6EE7B7",
                    300: "#34D399", // Accent
                    400: "#10B981", // Primary green
                    500: "#059669", // Secondary green
                    600: "#047857", // Dark green
                    700: "#065F46",
                    800: "#064E3B",
                    900: "#022C22",
                },
            },
            borderRadius: {
                sm: "0.375rem", // 6px - small elements
                DEFAULT: "0.5rem", // 8px - default
                md: "0.625rem", // 10px - cards, inputs
                lg: "0.75rem", // 12px - larger cards
                xl: "1rem", // 16px - modals, containers
                "2xl": "1.25rem", // 20px - hero sections
                "3xl": "1.5rem", // 24px - special elements
            },
            boxShadow: {
                sm: "0 1px 2px 0 rgb(0 0 0 / 0.05)",
                DEFAULT:
                    "0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1)",
                md: "0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1)",
                lg: "0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1)",
                xl: "0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1)",
                "2xl": "0 25px 50px -12px rgb(0 0 0 / 0.25)",
            },
            spacing: {
                18: "4.5rem", // 72px
                88: "22rem", // 352px
                128: "32rem", // 512px
            },
            aspectRatio: {
                "4/3": "4 / 3",
                "16/9": "16 / 9",
            },
            transitionDuration: {
                DEFAULT: "200ms",
                250: "250ms",
            },
            transitionTimingFunction: {
                DEFAULT: "ease-in-out",
            },
        },
    },

    plugins: [
        forms,
        function ({ addUtilities }) {
            addUtilities({
                ".line-clamp-1": {
                    display: "-webkit-box",
                    "-webkit-line-clamp": "1",
                    "-webkit-box-orient": "vertical",
                    overflow: "hidden",
                },
                ".line-clamp-2": {
                    display: "-webkit-box",
                    "-webkit-line-clamp": "2",
                    "-webkit-box-orient": "vertical",
                    overflow: "hidden",
                },
                ".line-clamp-3": {
                    display: "-webkit-box",
                    "-webkit-line-clamp": "3",
                    "-webkit-box-orient": "vertical",
                    overflow: "hidden",
                },
            });
        },
    ],
};
