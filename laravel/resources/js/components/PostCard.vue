<template>
    <div class="post card rounded-lg border border-white/30 overflow-hidden">
        <img src="https://picsum.photos/450/250" class="w-full object-cover" alt="">
        <div class="card_body">
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
