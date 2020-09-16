<template>
    <div>

        <div class="container mt-5 mb-5">
            <div class="alert alert-info" v-if="message">{{ message }}</div>
            <div class="alert alert-danger" v-if="errors">
                <p v-for="error in errors">
                    {{ error }}
                </p>
            </div>

            <div class="card is-dashed" v-if="!fileMeta">
                <div class="card-body">
                    <div class="form-group text-center">
                        <h1>Upload and Share</h1>
                        <p>Up to 10GB every file (100MB for guest & 2GB for free user)</p>
                    </div>
                    <label for="file-upload" class="custom-file-upload" v-if="file">
                        {{ file.name }}
                    </label>
                    <label for="file-upload" class="custom-file-upload" v-else>
                        <svg class="icon line" width="68" height="68" id="upload" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,16v4a1.08,1.08,0,0,1-1.14,1H5.14A1.08,1.08,0,0,1,4,20V16" style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path><path d="M12,16V3m4,4L12,3,8,7" style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path></svg>
                        <br>
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

            <file-detail-component v-bind:file-meta="fileMeta" v-else></file-detail-component>

        </div>
        <div class="bg-primary">
            <div class="container">
                <div class="row py-5">
                    <div class="col-md-6">
                        <h1 class="py-3 text-capitalize text-justify font-weight-bold text-white">Simplify how you download and sharing</h1>
                        <h2 class="text-justify font-weight-light text-white">
                            We're not like regular file storage, it's the world's first smart workspace. We combine everything you want.
                            We help save your time, electricity and energy, then generate excitement.
                        </h2>
                    </div>
                    <div class="col-md-6 hero-landing-one">
                    </div>
                </div>
                <div class="pb-3"></div>
            </div>
        </div>
        <pricing-component></pricing-component>
    </div>
</template>
<script>
import axios from 'axios'
import FileDetailComponent from "../Components/FileDetailComponent";
import PricingComponent from "../Components/PricingComponent";

export default {
    components: {
        FileDetailComponent,
        PricingComponent
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
    background: #f6f4f4;
    border-radius: 5px;
}
label.custom-file-upload {
    text-align: center !important;
}
.hero-landing-one {
    background: url("/images/hero.png");
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain;
    width: 100%;
}
</style>
