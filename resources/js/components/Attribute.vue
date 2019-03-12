<template>
    <div class="animal-attribute" style="text-align: center">
        <h5 v-b-tooltip.hover :title="attribute.attribute.description">{{attribute.attribute.title}}</h5>
        <b-progress :value="current_value" :max="max_attribute_value" show-value class="mb-3"/>
        <button class="btn btn-primary" @click="updateValue(true)" type="submit">{{getButtonTitle()}}</button>
    </div>
</template>

<script>
    export default {
        props: {
            attribute: {
                type: Object,
                default: null
            },
            max_attribute_value: {
                type: Number,
                default: 0
            },
            animal: {
                type: Object,
                default: null
            }
        },
        data() {
            return {
                current_value: 0,
            }
        },
        mounted() {
            this.current_value = this.attribute.value;
            this.listenAttribute();
            this.listenAnimal();
        },
        created() {
            this.startInterval();
        },
        methods: {
            updateValue: function(full = false) {
                axios.put('/animal/attribute/'+this.attribute.id, {is_full: full})
                    .then((res) => {
                        if(res.data.success) {
                            this.current_value = res.data.attribute.value;
                        }
                    }).catch((e) => {});
            },
            getButtonTitle: function () {
                return "Update "+this.attribute.attribute.title;
            },
            startInterval: function() {
                setInterval(() => {
                    this.updateValue();
                }, this.attribute.attribute.timeout*1000)
            },
            listenAttribute: function () {
                Echo.private('attributes.' + this.attribute.id)
                    .listen('Attributes', (e) => {
                        console.log(e);
                    });
            },
            listenAnimal: function () {
                Echo.private('animals.' + this.animal.id)
                    .listen('UpdateAttribute', (e) => {
                        console.log(e);
                    });
            }
        }
    }
</script>
