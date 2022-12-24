<template>
    <div class="">
        <CreateComponent></CreateComponent>
        <IndexComponent ref="index"></IndexComponent>
        <div>
<!--            <table class="table">-->
<!--                <thead>-->
<!--                <tr>-->
<!--                    <th scope="col">#</th>-->
<!--                    <th scope="col">Name</th>-->
<!--                    <th scope="col">Age</th>-->
<!--                    <th scope="col">Jobs</th>-->
<!--                </tr>-->
<!--                </thead>-->
<!--                <tbody >-->
<!--                    <template v-for="person in persons">-->
<!--                        <tr >-->
<!--                            <th scope="row">{{ person.id }}</th>-->
<!--                            <td></td>-->
<!--                            <td>{{ person.age }}</td>-->
<!--                            <td>{{ person.job }}</td>-->
<!--                        </tr>-->
<!--                    </template>-->
<!--                </tbody>-->
<!--            </table>-->

        </div>
    </div>
</template>

<script>
import CreateComponent from "./CreateComponent.vue";
import IndexComponent from "./IndexComponent.vue";

export default {
    name: "PostComponent",

    data() {
        return {
            persons: null

        }
    },
    mounted() {
        console.log(this.$refs.index.indexLog());
    },
    methods: {
        parentLog(){
            return 'this is parent component';
        }
    },
    components: {
        CreateComponent,
        IndexComponent
    },
}
</script>

<style scoped>

</style>
