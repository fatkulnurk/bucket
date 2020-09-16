<template>
    <div class="container my-5">
        <file-detail-component v-bind:file-meta=file></file-detail-component>
    </div>
</template>

<script>
import FileDetailComponent from "../../Components/FileDetailComponent";
export default {
    components: {
        FileDetailComponent
    },
    name: "Show",
    props: [
        'file'
    ]
}
</script>

<style scoped>

</style>
