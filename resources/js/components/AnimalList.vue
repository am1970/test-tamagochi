<template>
    <div class="animal-list">
        <select v-model="selected">
            <option v-for="animal in animals" :value="animal.id">{{animal.title}}</option>
        </select>
        <br><br>
        <input type="button" value="Choice" @click="save(selected)">
    </div>
</template>

<script>
    export default {
        data() {
            return {
                selected: null,
                animals: []
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
            save: (selected) => {
                axios.post('/animal', {animal_id: selected})
                    .then((res) => {
                        if(res.data.success == true) {
                            window.location.href = '/animal';
                        }
                    })
                    .catch((e) => {
                        console.log(e);
                    });
            }
        }
    }
</script>
