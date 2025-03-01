import { defineConfig } from "cypress";

export default defineConfig({
  e2e: {
    baseUrl: 'http://localhost:8000'
  },

  video: false,
  fixturesFolder: false,
});
