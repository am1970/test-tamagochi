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
            }
        },
        data() {
            return {
                current_value: 0,
            }
        },
        mounted() {
            this.current_value = this.attribute.value;

            Echo.private('update-attribute')
                .listen('UpdateAttribute', (e) => {
                    console.log(e);
                    this.handelIncoming(e.attribute);
                });

        },
        methods: {
            updateValue: (full = false) => {
                axios.put('/animal/attribute/'+this.attribute.id, {is_full: full})
                    .then((res) => {
                        if(res.data.success) {
                            this.current_value = res.data.value;
                        }
                    }).catch((e) => {

                });
            },
            handelIncoming: (attribute) => {
                this.current_value = attribute.value;
            },
            getButtonTitle: function () {
                return "Update "+this.attribute.attribute.title;
            }
        }
    }
</script>
