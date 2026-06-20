import { defineConfig } from "vite";
import react from "@vitejs/plugin-react";

export default defineConfig({
  server: {
    host: true
  },
  plugins: [react()],
  optimizeDeps: {
    include: ["react", "react-dom", "react-router-dom"],
  },
});