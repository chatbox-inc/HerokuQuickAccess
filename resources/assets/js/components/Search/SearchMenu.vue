<template>
    <div class="search">
        <select-org class="select_org" :orgs="search_data.orgs"></select-org>
        <select-stage class="select_stage" :stages="search_data.stages"></select-stage>
        <select-tag class="select_tag" :tags="search_data.tags"></select-tag>
    </div>
</template>

<script>
    export default {
        props: ["search_data"],
        data(){
            return {
            }
        }
    }
</script>

<style>
    .search {
        font-size: 1.4rem;
        position: fixed;
        top: 0;
        left: 0;
        width: 400px;
        padding: 0 50px;
        height: 100vh;
        background: var(--search-bg);
        z-index: 100;
        border-right: 1px solid #d5d6dc;
    }
    .select_org {
        display: block;
        margin: 100px auto 0;
    }
</style>