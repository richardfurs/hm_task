<template>
  <div>
    <NuxtRouteAnnouncer />
    <NuxtWelcome />
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'

const message = ref('')

onMounted(async () => {
  const response = await fetch(`${useRuntimeConfig().public.apiBase}/test`)
  message.value = await response.json()
})
</script>
