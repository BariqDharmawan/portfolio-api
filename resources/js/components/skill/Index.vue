<template>
    <div class="skills" id="index-skill">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Skill</div>
                        <div class="card-body">
                            <router-link :class="['btn btn-md btn-success mb-2']" :to="{name: 'skill.create'}">
                                Add new skill
                            </router-link>
                            <hr>
                            <div class="table-responsive mt-2">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Start From</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(skill, index) in skills" :key="skill.id">
                                        <td>{{ skill.name }}</td>
                                        <td>{{ skill.skill_category.category }}</td>
                                        <td>{{ skill.start_from }} </td>
                                        <td class="text-center">
                                            <router-link :to="{name: 'skill.edit', params: { id: skill.id }}"
                                            class="btn btn-sm btn-primary mr-2">EDIT</router-link>
                                            <button v-on:click.prevent="skillDelete(skill.id)" class="btn btn-sm btn-danger">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            skills: []
        }
    },
    created() {
        let uri = 'http://localhost:8000/api/skills';
        this.axios.get(uri).then(response => {
            this.skills = response.data.data;
        });
    },
    methods: {
        skillDelete(id) {
            axios.delete(`http://localhost:8000/api/skills/${id}`).then(() => {
                // this.skills.splice(this.skills.indexOf(id), 1);
                this.skills.splice(Array.from(this.skills).findIndex(id), 1);
            }).catch(error => console.log(error.response));
        }
    }
}
</script>
