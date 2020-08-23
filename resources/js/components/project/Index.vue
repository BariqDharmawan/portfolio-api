<template>
    <div class="projects" id="index-project">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">project</div>
                        <div class="card-body">
                            <router-link :class="['btn btn-md btn-success mb-2']" to="/project/create">Tambah project</router-link>
                            <hr>
                            <div class="table-responsive mt-2">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>title</th>
                                        <th>finished date</th>
                                        <th>is teamwork</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="project in projects" :key="project.id">
                                        <td>{{ project.title }}</td>
                                        <td>{{ project.finished_date }}</td>
                                        <td>{{ project.is_teamwork }} </td>
                                        <td class="text-center">
                                            <router-link :to="{name: 'project.edit', params: { id: project.id }}"
                                            class="btn btn-sm btn-primary mr-2">EDIT</router-link>
                                            <button @click.prevent="projectDelete(project.id)" class="btn btn-sm btn-danger">
                                                HAPUS
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
import axios from 'axios'
export default {
    data() {
        return {
            projects: []
        }
    },
    created() {
        axios.get('http://localhost:8000/api/project').then(response => {
            this.projects = response.data
        }).catch(error => console.log(`error: ${error}`));
    },
    methods: {
        projectDelete(id) {
            axios.delete(`http://localhost:8000/api/project/${id}`).then(response => {
                this.projects.splice(this.projects.indexOf(id));
                console.log(response);
            }).catch(error => {
                    console.log(error.response);
            });
        }
    }
}
</script>