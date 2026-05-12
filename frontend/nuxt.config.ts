// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  modules: [
    '@nuxt/eslint',
    '@nuxt/ui',
    '@vueuse/nuxt'
  ],

  devtools: {
    enabled: true
  },

  css: ['~/assets/css/main.css'],

  // Public runtime config is exposed to the client and can be overridden at
  // runtime via NUXT_PUBLIC_* environment variables.
  runtimeConfig: {
    public: {
      // Base URL of the Laravel API (used by $fetch / useFetch helpers).
      apiBaseUrl: 'http://localhost:8000',
      // Base URL used to acquire the Sanctum CSRF cookie (phase 2).
      sanctumBaseUrl: 'http://localhost:8000'
    }
  },

  routeRules: {
    '/api/**': {
      cors: true
    }
  },

  compatibilityDate: '2024-07-11',

  eslint: {
    config: {
      stylistic: {
        commaDangle: 'never',
        braceStyle: '1tbs'
      }
    }
  }
})
