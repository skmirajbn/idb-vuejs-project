import forms from "@tailwindcss/forms";
import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },
    daisyui: {
        darkTheme: "dark",
        themes: [
            {
                light: {
                    primary: "#34d399",

                    secondary: "#ea580c",

                    accent: "#0284c7",

                    neutral: "#302929",

                    "base-100": "#f3f4f6",

                    info: "#005ce9",

                    success: "#4ade80",

                    warning: "#dc2626",

                    error: "#991b1b",
                },
            },
            {
                dark: {
                    primary: "#34d399",

                    secondary: "#ea580c",

                    accent: "#0284c7",

                    neutral: "#302929",

                    "base-100": "#2b2b2b",

                    info: "#005ce9",

                    success: "#4ade80",

                    warning: "#dc2626",

                    error: "#991b1b",
                },
            },
        ],
    },
    plugins: [forms, require("daisyui")],
};
