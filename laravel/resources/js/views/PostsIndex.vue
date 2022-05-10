<template>
    <div>
        <div class="container grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <PostCard v-for="el_post in posts" :key="el_post.id" :post="el_post"/>
            <!-- <div v-for="post in posts" :key="post.id">
                {{ post.title }}
            </div> -->
        </div>
    </div>
</template>

<script>
import PostCard from '../components/PostCard.vue'
export default {
    name: "PostsIndex",
    components: {
        PostCard
    },
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