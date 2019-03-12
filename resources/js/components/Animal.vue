<template>
    <div class="animal">
        <div class="animal-name" style="text-align: center">
            <h2>{{getTitle()}}</h2>
        </div>
        <div class="animal-image" style="text-align: center" v-if="!!animal.animal.image_path">
            <img :src="animal.animal.image_path" width="350" height="350">
        </div>
        <div v-for="attribute in animal.animal_attributes">
            <br>
            <Attribute :attribute="attribute" :animal="animal" :max_attribute_value="max_attribute_value"></Attribute>

        </div>

    </div>
</template>

<script>
    import Attribute from './Attribute';

    export default {
        props: {
            animal: {
                type: Object,
                default: null
            },
            max_attribute_value: {
                type: Number,
                default: 0
            }
        },
        mounted() {
            console.log(this.animal);
        },
        methods: {
            getTitle: function () {
                return this.animal.name ? this.animal.name : this.animal.animal.title;
            }
        },
        components: {Attribute}
    }

</script>
