<template>
    <div class="logo-container">
        <img class="logo" src="/public/images/Logo.png" alt="Logo">
    </div>
</template>

<style scoped lang="scss">

.logo-container {
    display: none;
}

@media (min-width: 1024px) {
    .logo-container {
        display: block;
        margin: 0 0 4rem -55px;

        .logo {
            height: 2rem;
        }
    }
}

</style>