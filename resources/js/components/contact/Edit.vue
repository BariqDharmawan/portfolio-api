<template>
    <div class="contacts">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Edit contact
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="contactUpdate">
                                <div class="mb-3">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" v-model="contact.name"
                                    placeholder="Masukkan nama contact" pattern="^[A-Za-z -]+$" 
                                    title="Hanya boleh huruf dan spasi" required>
                                    <div v-if="validation.name">
                                        <div class="alert alert-danger mt-1" role="alert">
                                            {{ validation.name[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label id="category">URL</label>
                                    <input type="text" class="form-control" v-model="contact.url"
                                    placeholder="Contoh: https://twitter.com/BariqDharmawan" required>
                                    <div v-if="validation.url">
                                        <div class="alert alert-danger mt-1" role="alert">
                                            {{ validation.url[0] }}
                                        </div>
                                    </div>
                                </div>
                                <router-link :to="{name: 'contact.index'}"
                                class="btn btn-link d-inline-flex align-items-center">
                                    <img src="./../../assets/back-left.svg" alt="Back to contact">
                                    <span class="ml-2 mr-auto">Kembali</span>
                                </router-link>
                                <button type="submit" class="btn btn-md float-right btn-success mr-2">SIMPAN</button>
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
                contact: {},
                validation: []
            }
        },
        created() {
            axios.get(`http://localhost:8000/api/contact/${this.$route.params.slug}`).then((response) => {
                this.contact = response.data
            }).catch(error => {
                console.log(error)
            });
        },
        methods: {
            contactUpdate() {
                axios.put(`http://localhost:8000/api/contact/${this.$route.params.id}`, this.contact).then((response) => {
                    this.$router.push({name: 'contacts'})
                    console.log(response)
                }).catch(error => {this.validation = error.response.data});
            }
        }
    }
</script>