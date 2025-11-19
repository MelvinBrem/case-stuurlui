import { resolve, dirname } from "path";
import { fileURLToPath } from "url";
import tailwindcss from "@tailwindcss/vite";

const __filename = fileURLToPath(import.meta.url);
const __dirname = dirname(__filename);

export default {
  root: ".",
  base: "/",
  plugins: [tailwindcss()],
  build: {
    outDir: "wp-content/themes/stuurlui-theme/dist",
    emptyOutDir: true,
    rollupOptions: {
      input: {
        main: resolve(__dirname, "wp-content/themes/stuurlui-theme/assets/js/main.js"),
      },
      output: {
        entryFileNames: "js/[name].js",
        assetFileNames: "css/[name].[ext]",
      },
    },
  },
};
