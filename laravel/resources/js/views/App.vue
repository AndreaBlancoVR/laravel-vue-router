<template>
    <div class="app bg-zinc-800 text-white">
        <header>
            <nav class="py-6 flex gap-4 items-center">
                <ul class="contents">
                    <li>Home</li>
                    <li>
                        <router-link to="/posts">Elenco Post</router-link>
                    </li>
                    <li>
                        <router-link :to=" { name: 'contact' } ">Contatti</router-link>
                    </li>
                </ul>
            </nav>
        </header>
        <main>

            <!-- <PostsIndex /> -->
            <router-view></router-view>

        </main>

        <footer>
            &copy; Boolpress 2022
        </footer>
    </div>
</template>

<script>
    // import PostsIndex from './PostsIndex.vue'

    export default {
        components: {
            // PostsIndex,
    }
}
</script>

<style lang="scss" scoped>

.app {
    min-height: 100vh;
}

</style>