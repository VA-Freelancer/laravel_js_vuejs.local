<template>
    <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Job</th>
                        <th scope="col">Edit</th>
                        <th scope="col" :class="this.isDelete ? 'd-none' : ''">Delete</th>
                    </tr>
                </thead>
                <tbody>
                <template v-for="person in people">
                    <tr :class="isEdit(person.id) ? 'd-none' : ''">
                        <th scope="row">{{ person.id }}</th>
                        <td>{{ person.name }}</td>
                        <td>{{ person.age }}</td>
                        <td>{{ person.job }}</td>
                        <td><a href="#" @click.prevent="changeEditPersonId(person.id, person.name, person.age, person.job)" class="btn btn-success">Edit</a></td>
                        <td  :class="this.isDelete ? 'd-none' : ''"><a href="#" @click.prevent="deletePerson(person.id)" class="btn btn-danger" >Delete</a></td>
                    </tr>
                    <tr :class="isEdit(person.id) ? '' : 'd-none'">
                        <th scope="row">{{ person.id }}</th>
                        <th scope="row"> <input type="text" v-model="name" name="name" id="name" class="form-control"> </th>
                        <th scope="row"> <input type="number" v-model="age" name="age" id="age" class="form-control"> </th>
                        <th scope="row"> <input type="text" v-model="job" name="job" id="job" class="form-control"> </th>
                        <td><a href="#" @click.prevent="updatePerson(person.id)" class="btn btn-success" >Update</a></td>
                    </tr>
                </template>

                </tbody>
            </table>
        </div>
    </div>
</template>

<script>


export default {
    name: "IndexComponent",
    data(){
        return {
            people: null,
            editPersonId: null,
            isDelete: false,
            name: null,
            age: null,
            job: null
        }
    },
    mounted() {
        this.getPeople()
        console.log(this.$parent.parentLog());
    },
    methods:{
        getPeople(){
            axios.get('/api/people')
                .then(res =>{
                    this.people = res.data;
                })
        },
        updatePerson(id){
            this.editPersonId = null
            this.isDelete = false
            axios.patch(`/api/people/${id}`, {name: this.name, age: this.age, job: this.job})
                .then(res =>{
                    this.getPeople()
                })
        },
        deletePerson(id){
            axios.delete(`/api/people/${id}`)
                .then(res =>{
                    this.getPeople()
                })
        },
        changeEditPersonId(id, name, age, job){
            this.isDelete = true;
            this.editPersonId = id;
            this.name = name;
            this.age = age;
            this.job = job;
        },
        isEdit(id){
            return this.editPersonId === id
        },
        indexLog(){
            // console.log();
            return'this is index component';
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
