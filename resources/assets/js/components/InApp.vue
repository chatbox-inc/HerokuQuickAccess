<template>
    <ul>
        <li v-for="in_app in in_apps" :key="in_app.id">
                <div class="box_upper">
                    <div class="app_name">{{in_app.name}}</div>
                    <a class="app_url" :href="in_app.app_url">Open app</a>
                    <a class="heroku_url" :href="in_app.heroku_url">Open heroku</a>
                </div>
                <div class="box_lower">
                    <div class="org">Org:{{in_app.org}}</div>
                    <ul>
                        <li v-for="tag in in_app.tags">{{tag}}</li>
                    </ul>
                </div>
        </li>
    </ul>
</template>

<script>
    export default {
        data(){
            return {
            }
        },
        props:["in_apps"],
        methods: {
        }
    }
</script>