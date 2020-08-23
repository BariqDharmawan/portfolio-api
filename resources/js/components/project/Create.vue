<template>
    <div class="projects">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Tambah project baru
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="projectStore" id="form-add-project">
                                <div class="mb-3">
                                    <label>Title</label>
                                    <input type="text" class="form-control" v-model="project.name"
                                    placeholder="Masukkan nama project" pattern="^[A-Za-z -]+$" 
                                    title="Hanya boleh huruf dan spasi" required>
                                    <div v-if="validation.name">
                                        <div class="alert alert-danger mt-1" role="alert">
                                            {{ validation.name[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="category">Kategori</label>
                                    <select name="category" id="category" class="form-select" v-model="project.category" required>
                                        <option value="frontend-framework">
                                            frontend framework
                                        </option>
                                        <option value="backend-framework">
                                            backend framework
                                        </option>
                                        <option value="basic-stack">
                                            basic stack
                                        </option>
                                        <option value="tools">
                                            tools
                                        </option>
                                        <option value="preprocessor">
                                            preprocessor
                                        </option>
                                    </select>
                                    <div v-if="validation.category">
                                        <div class="alert alert-danger mt-1" role="alert">
                                            {{ validation.category[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Tahun mulai</label>
                                    <input type="number" class="form-control" v-model="project.start_from"
                                           placeholder="Contoh: 2011" min="1900" max="2020" required>
                                    <div v-if="validation.name">
                                        <div class="alert alert-danger mt-1" role="alert">
                                            {{ validation.name[0] }}
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-md btn-success mr-2">SIMPAN</button>
                                <button type="reset" class="btn btn-md btn-danger">RESET</button>
                            </form>
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
            project: {},
            validation: []
        }
    },
    methods: {
        projectStore() {
            axios.post('http://localhost:8000/api/project', this.project).then(() => {
                this.$router.push({ name: 'project.index' });
            }).catch(error => this.validation = error.response.data);
        }
    }
}
</script>