<template>
    <div class="post card rounded-lg border border-white/30 overflow-hidden">
        <img src="https://picsum.photos/450/250" class="w-full object-cover" alt="">
        <div class="card_body px-2">
            <h4 class="post_title mb-4 text-xl">
                {{ post.title }}
            </h4>
            <p class="text-orange-400 mb-2" v-if="post.category">
                {{ post.category.name }}
            </p>
            <ul class="tags flex flex-wrap gap-4 items-center">
                <li class="tag bg-white/30 rounded-full block px-4 text-xs" v-for="tag in post.tags" :key="tag.id">
                    {{ tag.name }}
                </li>
            </ul>
            <router-link 
            class="bg-orange-400 rounded-md px-3 py-1 text-sm my-3"
            tag="button" 
            :to="{ name: 'post.show', params: { slug: post.slug }}">
                Leggi articolo
            </router-link>
        </div>
        
    </div>
</template>

<script>
    export default {
        props: {
            post: {
                type: Object,
                required: false
            }
        }
    }
</script>
