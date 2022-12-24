<template>
    <div class="">
        <SinglePostComponent></SinglePostComponent>
        <div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Jobs</th>
                </tr>
                </thead>
                <tbody >
                    <template v-for="person in persons">
                        <tr >
                            <th scope="row">{{ person.id }}</th>
                            <td></td>
                            <td>{{ person.age }}</td>
                            <td>{{ person.job }}</td>
                        </tr>
                    </template>
                </tbody>
            </table>

        </div>
    </div>
</template>

<script>
import SinglePostComponent from "./SinglePostComponent.vue";

export default {
    name: "PostComponent",

    data() {
        return {
            persons: null

        }
    },
    mounted() {
        this.getPersons()
    },
    methods: {
        getPersons(){
            axios.get('/persons')
                .then(res =>{
                    this.persons = res.data
                })
                .catch( error =>{

                })
                .finally({

                })
        }
    },
    components: {
        SinglePostComponent
    },
}
</script>

<style scoped>

</style>
