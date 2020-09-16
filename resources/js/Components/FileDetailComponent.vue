<template>
    <div class="card is-dashed">
        <div class="card-body">
            <div class="form-group text-center">
                <h1>Download {{ fileMeta.client_original_name }}</h1>
            </div>
            <div class="form-group">
                <div class="table-responsive mb-0">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <td style="width: 130px">Name</td>
                            <td style="width: 10px">:</td>
                            <td>{{ fileMeta.client_original_name }}</td>
                        </tr>
                        <tr>
                            <td>Mime Type</td>
                            <td>:</td>
                            <td>{{ fileMeta.mime_type}}</td>
                        </tr>
                        <tr>
                            <td>Extension</td>
                            <td>:</td>
                            <td>{{ fileMeta.client_original_extension}}</td>
                        </tr>
                        <tr>
                            <td>Size</td>
                            <td>:</td>
                            <td>{{ fileMeta.size_format }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="form-group text-center mb-5">
                <div class="btn btn-primary">DOWNLOAD FILE</div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>URL</label>
                            <input type="text" class="form-control" v-bind:value="fileMeta.link">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>HTML</label>
                            <input type="text" class="form-control" v-bind:value="fileMeta.link_html">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>FORUM LINK</label>
                            <input type="text" class="form-control" v-bind:value="fileMeta.link_forum">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>DELETE FILE</label>
                            <input type="text" class="form-control" v-bind:value="fileMeta.link_delete">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "FileDetailComponent",
    props: {
        'fileMeta': Object
    }
}
</script>

<style scoped>

</style>
