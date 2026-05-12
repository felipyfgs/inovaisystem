import type { $Fetch, FetchOptions } from 'ofetch'

/**
 * Returns a $fetch instance preconfigured with the Laravel API base URL.
 *
 * Use this composable from pages, components, and other composables to talk
 * to the backend. It automatically forwards cookies for Sanctum SPA auth
 * (added in phase 2) and reads the base URL from runtime config so it can
 * be overridden at deploy time via NUXT_PUBLIC_API_BASE_URL.
 */
export function useApi(): $Fetch {
  const config = useRuntimeConfig()

  const options: FetchOptions = {
    baseURL: config.public.apiBaseUrl,
    credentials: 'include',
    headers: {
      Accept: 'application/json'
    }
  }

  return $fetch.create(options)
}
