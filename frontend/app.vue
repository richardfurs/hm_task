<template>
  <div>
    <div class="content">
      <Header />
      <NuxtPage />
    </div>
    <Footer />
  </div>
</template>

<script setup>

const userId = useUserId();
const { pageUrl, dateTime } = usePageInfo();

if (import.meta.server) {
  const headersData = useRequestHeaders();

  await fetch(`http://nginx/api/event`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      userId: userId,
      pageUrl: pageUrl,
      dateTime: dateTime,
      browser: headersData['user-agent'],
      eventName: 'page-viewed'
    }),
  });
}

useHead({
  link: [
    {
      rel: "preconnect",
      href: "https://fonts.googleapis.com",
    },
    {
      rel: "preconnect",
      href: "https://fonts.gstatic.com",
      crossorigin: "anonymous",
    },
    {
      rel: "stylesheet",
      href: "https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100..700;1,100..700&display=swap",
    },
  ],
});
</script>

<style scoped>

.content {
    padding: 2rem 1rem 0 1rem;
}

@media (min-width: 1024px) {
  .content {
      padding: 40px 95px 0 95px;
  }
}

</style>
