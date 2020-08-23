<template>
    <div class="contacts" id="index-contact">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">All Contact</div>
                        <div class="card-body">
                            <router-link :class="['btn btn-md btn-success mb-2']" :to="{name: 'contact.create'}">
                                Tambah contact
                            </router-link>
                            <hr>
                            <div class="table-responsive mt-2">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>URL</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="contact in contacts" v-bind:key="contact.id">
                                        <td>{{ contact.name }}</td>
                                        <td>{{ contact.url }}</td>
                                        <td class="text-center">
                                            <router-link :to="{name: 'contact.edit',
                                            params: { id: contact.id }}"
                                            class="btn btn-sm btn-primary mr-2">EDIT</router-link>
                                            <button v-on:click.prevent="contactDelete(contact.slug)" class="btn btn-sm btn-danger">
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
import axios from 'axios';
export default {
    data() {
        return {
            contacts: []
        }
    },
    created() {
        axios.get('http://localhost:8000/api/contact').then(response => {
            this.contacts = response.data;
        });
    },
    methods: {
        contactDelete(id) {
            axios.delete(`http://localhost:8000/api/contact${id}`).then(() => {
                // this.contacts.splice(this.contacts.indexOf(id), 1);
                this.contacts.splice(Array.from(this.contacts).findIndex(id), 1);
            }).catch(error => console.log(error.response));
        }
    }
}
</script>