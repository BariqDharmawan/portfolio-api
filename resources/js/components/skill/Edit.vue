<template>
    <div class="skills">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Edit skill
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="skillUpdate">
                                <div class="mb-3">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" v-model="skill.name"
                                    placeholder="Masukkan nama skill" pattern="^[A-Za-z - /]+$"
                                    title="Hanya boleh huruf, slash, dan spasi" required>
                                    <div v-if="validation.name">
                                        <div class="alert alert-danger mt-1" role="alert">
                                            {{ validation.name[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="category">Pick category</label>
                                    <select name="category_id" id="category" class="form-select" required>
                                      <option v-for="(category, index) in skill_category"
                                              v-bind:key="category.id"
                                              v-bind:value="category.id"
                                              v-bind:selected="index === 0">
                                            {{ category.category }}
                                      </option>
                                    </select>
<!--                                    <div v-if="validation.skill_category">-->
<!--                                      <div class="alert alert-danger mt-1" role="alert">-->
<!--                                        {{ validation.errors.skill_category[0] }}-->
<!--                                      </div>-->
<!--                                    </div>-->
                                </div>
                                <div class="mb-3">
                                    <label for="start-year">Year start</label>
                                    <input id="start-year" type="number" class="form-control" v-model="skill.start_from"
                                           placeholder="Ex: 2011" min="1900" max="2020" required>
                                    <div v-if="validation.name">
                                        <div class="alert alert-danger mt-1" role="alert">
                                            {{ validation.name[0] }}
                                        </div>
                                    </div>
                                </div>
                                <a href="" class="btn btn-link d-inline-flex align-items-center"
                                        style="text-decoration: none;">
                                        <img src="./../../assets/back-left.svg" alt="Back to skill">
                                        <span class="ml-2 mr-auto">Back</span>
                                    </a>
                                <button type="submit" class="btn btn-md float-right btn-success mr-2">
                                  Save
                                </button>
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
            skill_category: {},
            validation: [],
          }
        },
        created() {
          axios.get(`http://localhost:8000/api/skill/${this.$route.params.id}`).then((response) => {
            this.skill = response.data
          }).catch(error => {
            console.log(error)
          });
          axios.get('http://localhost:8000/api/skill-category').then(response => {
            this.skill_category = response.data
          });
        },
        methods: {
            skillUpdate() {
                axios.put(`http://localhost:8000/api/skill/${this.$route.params.id}`, this.skill).
                then(() => {
                  this.$router.push({name: 'skills'})
                }).catch(error => {
                  console.log(error.response.data)
                });
            }
        }
    }
</script>