<template>
    <div class="container">
        <div class="">Color: {{ obj.color }}</div>
        <div class="">Number: {{ obj.number > 10 ? 'more 10' : 'less 10' }}</div>
        <div class="">is published: {{ obj.isPublished  ? 'Published' : 'Not Published'}}</div>
    </div>
</template>

<script>


export default {
    name: "SomeComponent",
    data(){
        return {

        }
    },
    props: [
        'obj'
    ],
    mounted() {
        console.log(this.$parent.$parent.parentLog(), 'Some')
    },
    methods:{

    }
}
</script>

<style scoped>
</style>
