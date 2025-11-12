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
                    50: "#E8F5E9", // Lightest tint
                    100: "#C8E6C9",
                    200: "#A5D6A7",
                    300: "#81C784",
                    400: "#66BB6A",
                    500: "#116530", // Light Green (primary)
                    600: "#114232", // Dark Green (secondary)
                    700: "#0D3426",
                    800: "#09261B",
                    900: "#051810",
                },
                "sacli-yellow": {
                    50: "#FFFEF5",
                    100: "#FFFAEB",
                    200: "#FFF4CC",
                    300: "#FFEEAA",
                    400: "#FFE87D",
                    500: "#FFCC1D", // Yellow (accent)
                    600: "#E6B800",
                    700: "#CC9F00",
                    800: "#B38600",
                    900: "#996D00",
                },
                "sacli-grey": {
                    50: "#FAFAF8",
                    100: "#F5F5F0",
                    200: "#E8E8CC", // Grey (background)
                    300: "#D9D9B8",
                    400: "#CACAA4",
                    500: "#BBBB90",
                    600: "#9A9A75",
                    700: "#79795A",
                    800: "#58583F",
                    900: "#373724",
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
