<template>
    <div class="select_stage">
        <form>
            <select>
                <option v-for="stage in stages">{{stage}}</option>
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
        props:["stages"],
        methods: {
        }
    }
</script>

