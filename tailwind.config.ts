import type { Config } from "tailwindcss";

export default {
  content: ["./src/**/*.{astro,html,js,jsx,md,mdx,svelte,ts,tsx,vue}"],
  theme: {
    extend: {
      colors: {
        "light-orange": "#fa8142",
        "dark-primary": "#1f1f1f",
        "dark-secondary": "#313131",
        grey: "#ccc",
      },
      fontFamily: {
        inter: ["Inter"],
      },
    },
  },
  darkMode: "class",
  plugins: [],
};

