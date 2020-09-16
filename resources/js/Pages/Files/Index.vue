<template>
    <div class="container mt-5 mb-5">
        <div class="alert alert-info" v-if="message">{{ message }}</div>
        <div class="alert alert-danger" v-if="errors">
            <p v-for="error in errors">
                {{ error }}
            </p>
        </div>

        <div class="card is-dashed" v-if="!fileMeta">
            <div class="card-body">
                <label for="file-upload" class="custom-file-upload" v-if="file">
                    {{ file.name }}
                </label>
                <label for="file-upload" class="custom-file-upload" v-else>
                    Drag or selected file here
                </label>
                <input @change="fileUpload($event.target)" id="file-upload" type="file"/>

                <div class="form-group">
                    <div class="progress" v-if="progressBar > 0">
                        <div class="progress-bar" role="progressbar"
                             :style="{width: progressBar + '%'}"
                             :aria-valuenow="progressBar"
                             aria-valuemin="0"
                             aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary btn-medium" @click="uploadSubmit"
                            :disabled="isLoading">{{ isLoading ? 'Loading...' : 'Upload' }}
                    </button>
                </div>
            </div>
        </div>
        <file-detail-component file-meta="fileMeta" v-else></file-detail-component>
    </div>
</template>
<script>
import axios from 'axios'
import FileDetailComponent from "../../Components/FileDetailComponent";

export default {
    components: {
        FileDetailComponent
    },
    data() {
        return {
            progressBar: 0,
            success: '',
            message: '',
            isLoading: false,
            file: '',
            fileMeta: '',
            errors: ''
        }
    },
    methods: {
        getAllFile() {
            axios.get('/api/files')
                .then((response) => {
                    this.files = response.data
                })
        },
        fileUpload(event) {
            this.file = event.files[0]
        },
        uploadSubmit() {
            this.isLoading = true
            this.message = ''
            let formData = new FormData();
            formData.append('file', this.file);

            axios.post('/api/upload', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
                onUploadProgress: function (progressEvent) {
                    this.progressBar = parseInt(Math.round((progressEvent.loaded * 100) / progressEvent.total))
                }.bind(this)
            })
                .then((response) => {
                        if (!response.data.success) {
                            this.reset()
                        }
                        this.message = response.data.message
                        this.fileMeta = response.data.data
                        setTimeout(() => {
                            this.isLoading = false
                            this.reset()
                        })
                    })
                .catch(error => {
                    this.errors = error.response.data.data.file
                    this.isLoading = false
                    this.reset()
                });
            setTimeout(() => {
                this.resetForm()
            })
        },
        resetForm() {
            this.message = ''
            this.errors = ''
            this.fileMeta = ''
            this.progressBar = 0
        }
        ,
        reset() {
            this.$refs.file.value = '';
        }
    }
}
</script>

<style>
input[type="file"] {
    display: none;
}
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
    width: 100%;
    height: 120px;
}
label.custom-file-upload {
    text-align: center !important;
}
</style>
