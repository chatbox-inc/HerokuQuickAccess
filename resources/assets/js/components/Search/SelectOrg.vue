<template>
    <div class="select_org">
        <form>
            <select>
                <option v-for="org in orgs">{{org}}</option>
            </select>
        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return {
            }
        },
        props:["orgs"],
        methods: {
        }
    }
</script>