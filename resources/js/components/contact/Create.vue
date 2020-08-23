<template>
    <div class="skills">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Tambah skill baru
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="skillStore" id="form-add-skill">
                                <div class="mb-3">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" v-model="skill.name"
                                    placeholder="Masukkan nama skill" pattern="^[A-Za-z -]+$" 
                                    title="Hanya boleh huruf dan spasi" required>
                                    <div v-if="validation.name">
                                        <div class="alert alert-danger mt-1" role="alert">
                                            {{ validation.name[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label id="category">Kategori</label>
                                    <select name="category" id="category" class="form-select" v-model="skill.category" required>
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
                                            toolsrk
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
                                    <input type="number" class="form-control" v-model="skill.start_from"
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
            skill: {},
            validation: []
        }
    },
    methods: {
        skillStore() {
            axios.post('http://localhost:8000/api/skill', this.skill).then(response => {
                this.$router.push({ name: 'skill.index' });
                console.log(response.data.data);
            }).catch(error => {
                this.validation = error.response.data.data;
            });
        }
    }
}
</script>