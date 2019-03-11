<template>
    <div class="animal-list">
        <form id="animal-choice-form" @submit.prevent="checkForm">
            <label for="selectedAnimal">Select animal:</label>
            <select id="selectedAnimal" @change="setAnimal" v-model.number="animal_id" required>
                <option v-for="animal in animals" :value="animal.id">{{animal.title}}</option>
            </select><br>
            <div class="image-animal" v-if="!!this.animal_id">
                <img :src="this.animal.image_path" width="200" height="200">
            </div>
            <br>
            <label for="name">Name:</label>
            <input  id="name" v-model.trim="name" type="text">
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                errors: [],
                animal_id: null,
                animals: [],
                name: null,
                animal: null,
            }
        },
        mounted() {
            axios.get('/animals')
                .then((res) => {
                    console.log(res.data);
                    this.animals = res.data;
                })
                .catch((e) => {
                    console.log(e);
                });
        },
        methods: {
            checkForm: function () {
                if (this.animal_id) {
                    this.save();
                }

                if (!this.animal_id) {
                    this.errors.push('Select animal, please. This field is required.');
                }

                if(this.errors.length) {
                    this.showError();
                }
            },
            save: function() {
                // this.selected = 10;
                axios.post('/animal', {animal_id: this.animal_id, name: this.name})
                    .then((res) => {
                        if(res.data.success) {
                            window.location.href = '/animal';
                        }
                    })
                    .catch((e) => {
                        if(!e.response.data.success) {
                            alert(e.response.data.errors);
                        }
                    });
            },
            showError: function () {
                alert(this.errors);
            },
            setAnimal: function () {
                this.animal = this.animals.find(animal => animal.id === this.animal_id);
            },
        }
    }
</script>
