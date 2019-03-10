<template>
    <div class="animal-list">
        <form id="animal-choice-form" @submit.prevent="checkForm">
            <label for="selectedAnimal">Choice animal:</label>
            <select id="selectedAnimal" v-model.number="selected" required>
                <option v-for="animal in animals" :value="animal.id">{{animal.title}}</option>
            </select><br>
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
                selected: null,
                animals: [],
                name: null,
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
                if (this.selected) {
                    this.save();
                }

                this.errors = [];

                if (!this.selected) {
                    this.errors.push('Selected required.');
                }
            },
            save: function() {
                axios.post('/animal', {animal_id: this.selected, name: this.name})
                    .then((res) => {
                        if(res.data.success == true) {
                            window.location.href = '/animal';
                        }
                    })
                    .catch((e) => {
                        console.log(e.response.data.message);
                    });
            },
        }
    }
</script>
