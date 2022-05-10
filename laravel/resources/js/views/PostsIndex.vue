<template>
    <div>
        <div class="container">
            <div v-for="post in posts" :key="post.id">
                {{ post.title }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "PostsIndex",
    data() {
        return {
            posts: []
        }
    },

    methods: {
        fetchPosts() {
            axios.get('/api/posts')
            .then( res => {
                // console.log(res.data.posts)
                // this.posts = res.data.posts;
                const { posts } = res.data
                this.posts = posts
            })
            .catch( err => {
                console.warn(err)
            })
        }
    },
    mounted() {
        this.fetchPosts()
    }
}
</script>

<style lang="scss" scoped>

</style>