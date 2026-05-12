<script setup lang="ts">
/**
 * Diagnostic page that calls the Laravel API /api/health endpoint to confirm
 * the Nuxt frontend can reach the backend through the configured runtime
 * base URL. Used in development and during initial setup verification.
 */

interface HealthResponse {
  status: string
  service: string
  environment: string
  time: string
}

const api = useApi()

const { data, error, status, refresh } = useAsyncData<HealthResponse>(
  'api-health',
  () => api<HealthResponse>('/api/health')
)
</script>

<template>
  <UDashboardPanel id="health">
    <template #header>
      <UDashboardNavbar title="API health" />
    </template>

    <template #body>
      <div class="space-y-6 p-6">
        <UCard>
          <template #header>
            <div class="flex items-center justify-between">
              <h2 class="text-lg font-semibold">
                Backend connectivity
              </h2>
              <UButton
                icon="i-lucide-refresh-cw"
                :loading="status === 'pending'"
                variant="soft"
                @click="refresh()"
              >
                Refresh
              </UButton>
            </div>
          </template>

          <div v-if="status === 'pending'" class="text-sm text-default-500">
            Calling /api/health…
          </div>

          <UAlert
            v-else-if="error"
            color="error"
            variant="subtle"
            icon="i-lucide-triangle-alert"
            title="Cannot reach the backend"
            :description="error.message"
          />

          <dl
            v-else-if="data"
            class="grid grid-cols-1 gap-x-6 gap-y-2 text-sm sm:grid-cols-2"
          >
            <div>
              <dt class="text-default-500">
                Status
              </dt>
              <dd class="font-medium">
                {{ data.status }}
              </dd>
            </div>
            <div>
              <dt class="text-default-500">
                Service
              </dt>
              <dd class="font-medium">
                {{ data.service }}
              </dd>
            </div>
            <div>
              <dt class="text-default-500">
                Environment
              </dt>
              <dd class="font-medium">
                {{ data.environment }}
              </dd>
            </div>
            <div>
              <dt class="text-default-500">
                Server time
              </dt>
              <dd class="font-medium">
                {{ data.time }}
              </dd>
            </div>
          </dl>
        </UCard>
      </div>
    </template>
  </UDashboardPanel>
</template>
