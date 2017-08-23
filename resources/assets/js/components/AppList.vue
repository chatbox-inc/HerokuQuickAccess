<template>
    <div class="app_list">
        <ul>
            <li v-for="app_list in app_lists" :key="app_list.id">
                <div class="type_app" v-if="chengeType(app_list.type)">
                    <div class="box_upper">
                        <div class="app_name">{{app_list.name}}</div>
                        <a class="app_url" :href="app_list.app_url">Open app</a>
                        <a class="heroku_url" :href="app_list.heroku_url">Open heroku</a>
                    </div>
                    <div class="box_lower">
                        <div class="org">Org:{{app_list.org}}</div>
                        <ul>
                            <li v-for="tag in app_list.tags">{{tag}}</li>
                        </ul>
                    </div>
                </div>
                <div class="type_pipe" v-else>
                    <div class="box_upper">
                        <div class="app_name">{{app_list.name}}</div>
                        <a class="app_url" :href="app_list.app_url">Open app</a>
                        <a class="heroku_url" :href="app_list.heroku_url">Open heroku</a>
                    </div>
                    <div class="box_lower">
                        <div class="org">Org:{{app_list.org}}</div>
                        <ul>
                            <li v-for="tag in app_list.tags">{{tag}}</li>
                        </ul>
                    </div>
                    <div class="box_app_list">
                        <in-apps :in_apps="app_list.in_apps"></in-apps>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: ["app_lists"],
        data(){
            return {
            }
        },
        methods: {
            chengeType(type){
                return (type == "app")
            }
        }
    }
</script>

<style>
    .app_list{
        margin-left: 400px;
    }
</style>