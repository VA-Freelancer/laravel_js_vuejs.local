<template>
    <tr :class="this.$parent.isEdit(person.id) ? '' : 'd-none'">
        <th scope="row">{{ person.id }}</th>
        <th scope="row"> <input type="text" v-model="name" name="name" id="name" class="form-control"> </th>
        <th scope="row"> <input type="number" v-model="age" name="age" id="age" class="form-control"> </th>
        <th scope="row"> <input type="text" v-model="job" name="job" id="job" class="form-control"> </th>
        <td><a href="#" @click.prevent="updatePerson(person.id)" class="btn btn-success" >Update</a></td>
    </tr>
</template>

<script>


export default {
    name: "EditComponent",
    props:[
        'person'
    ],
    data(){
        return {
            name: null,
            age: null,
            job: null
        }
    },
    mounted() {
    },
    methods:{
        updatePerson(id){
            this.$parent.editPersonId = null
            this.$parent.isDelete = false
            axios.patch(`/api/people/${id}`, {name: this.name, age: this.age, job: this.job})
                .then(res =>{
                    this.$parent.getPeople()
                })
        }
    }
}
</script>

<style scoped>
    .btn.btn-primary::placeholder{
        color: #fff !important;
    }
    .row .form-control{
        max-width: max-content;
    }
</style>
