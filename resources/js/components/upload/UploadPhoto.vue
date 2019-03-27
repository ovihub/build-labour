<template>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-2 mb-2">
                <img :src="photo" class="img-responsive">
            </div>
            <div class="col-md-6 mb-2">
                <input type="file" v-on:change="onFileChange" class="form-control">

                <button class="btn btn-primary" @click="uploadPhoto">Upload</button>
            </div>
            <!-- <div class="col-md-2"> -->
                <!-- <button class="btn btn-primary" @click="uploadPhoto">Upload</button> -->
            <!-- </div> -->
        </div>
    </div>
</template>

<style scoped>
    img {
        max-height: 36px;
    }
</style>

<script src="./UploadPhoto.js"></script>