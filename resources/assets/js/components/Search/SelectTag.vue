<template>
    <div class="select_tag">
        <div class="select_tag_list">
            <ul>
                <li class="tag_list_item" :class="{active: isActive(tag)}" v-for="tag in tags" :key="tag.id"><a @click="tagSwitching(tag)">{{tag}}</a></li>
            </ul>
        </div>
        <p>all tags de-selection</p>
    </div>
</template>

<script>
    export default {
        data(){
            return {
            }
        },
        props:["tags"],
        methods: {
            isActive(tag) {
                if(this.$parent.active_tag == tag){
                    return true;
                }
                else {
                    return false;
                }
            },
            tagSwitching(tag) {
                if(this.$parent.active_tag == tag){
                    this.$parent.active_tag = null;
                }
                else {
                    this.$parent.active_tag = tag;
                }
            }
        }
    }
</script>

<style>
    .select_tag_list {
        margin: 0;
        width: 100%;
        text-align: left;
    }
    .tag_list_item {
        display: inline-block;
        background: #98cbe8;
        min-width: 65px;
        border-radius: 13px;
        margin: 0 5px;
    }
    .tag_list_item a{
        display:block;
        padding: 3px 13px;
        font-size: 0.9rem;
        color: #1f648b;
        text-align: center;
    }
    .active {
        background: #1f648b;
    }
    .active a {
        color: white;
    }
</style>