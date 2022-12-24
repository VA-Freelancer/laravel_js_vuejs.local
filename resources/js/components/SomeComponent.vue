<template>
    <div class="container">

    </div>
</template>

<script>


export default {
    name: "SomeComponent",
    data(){
        return {

        }
    },
    mounted() {
        console.log(this.$parent.$parent.parentLog(), 'Some')
    },
    methods:{

    }
}
</script>

<style scoped>
</style>
