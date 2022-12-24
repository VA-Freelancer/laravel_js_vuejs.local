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
                    </tr>
                </thead>
                <tbody>
                <template v-for="person in people">
                    <tr>
                        <th scope="row">{{ person.id }}</th>
                        <td>{{ person.name }}</td>
                        <td>{{ person.age }}</td>
                        <td>{{ person.job }}</td>
                        <td><a href="#" @click.prevent="changeEditPersonId(person.id)" class="btn btn-success">Edit</a></td>
                    </tr>
                    <tr :class="isEdit(person.id) ? '' : 'd-none'">
                        <th scope="row">{{ person.id }}</th>
                        <th scope="row"> <input type="text" name="" id="" class="form-control"> </th>
                        <th scope="row"> <input type="number" name="" id="" class="form-control"> </th>
                        <th scope="row"> <input type="text" name="" id="" class="form-control"> </th>
                        <td><a href="#" @click.prevent="changeEditPersonId(null)" class="btn btn-success" >Update</a></td>
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
            editPersonId: null
        }
    },
    mounted() {
        this.getPeople()
    },
    methods:{
        getPeople(){
            axios.get('/api/people')
                .then(res =>{
                    this.people = res.data;
                })
        },
        changeEditPersonId(id){
            console.log(id);
            this.editPersonId = id;
        },
        isEdit(id){
            return this.editPersonId === id
        }

    }
}
</script>

<style scoped>
    .btn.btn-primary::placeholder{
        color: #fff !important;
    }
</style>
