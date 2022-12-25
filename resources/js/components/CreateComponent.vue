<template>
    <div class="container">
        <div class="row">
            <div class="d-flex flex-column w-25">
                <div class="mb-3">
                    <input type="text" class="form-control" v-model="name" id="name" placeholder="Name">
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control" v-model="age" id="age" placeholder="Age">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" v-model="job" id="job" placeholder="Job">
                </div>
                <div class="mb-3">
                    <input @click.prevent="addPerson()"  class="btn btn-primary"  placeholder="Добавить">
                </div>
            </div>
            <SomeComponent :obj="obj" ></SomeComponent>
        </div>
    </div>
</template>

<script>

import SomeComponent from "./SomeComponent.vue";
export default {
    name: "CreateComponent",
    data(){
        return {
            name: null,
            age: null,
            job: null,
            obj: {
                color: 'yellow',
                number: 50,
                isPublished: false

            }
        }
    },
    mounted() {
        console.log(this.$parent.$refs.index.indexLog(), 'create');

    },
    components:{
        SomeComponent
    },
    methods:{
        addPerson(){
            axios.post('/api/people', {name: this.name, age: this.age, job: this.job})
                .then(res =>{
                    this.name = null
                    this.age = null
                    this.job = null
                    this.$parent.$refs.index.getPeople()
                })
        }
    }
}
</script>

<style scoped>
    .btn.btn-primary::placeholder{
        color: #fff !important;
    }
</style>
