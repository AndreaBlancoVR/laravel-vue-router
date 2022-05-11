<template>
    <div class="app bg-zinc-800 text-white">
        <header>
            <nav>
                <ul>
                    <li>Home</li>
                    <li>Posts</li>
                    <li>Categories</li>
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