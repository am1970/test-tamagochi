<template>
    <div class="animal">
        <div class="animal-name">
            {{this.animal.animal.title}}
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            animal: {
                type: Object,
                default: null
            }
        },
        mounted() {
            console.log(this.animal);
        }
    }

</script>
