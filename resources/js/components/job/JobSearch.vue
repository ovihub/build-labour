<template>
    <div class="row">
        <div class="col-md-4">
            <div class="profile-item-2">
                <div class="profile-content">
                    <input class="page-search" id="search-key" type="text" placeholder="Search"
                        v-model="keyword" @keyup="onSearchJobPosts" />
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="profile-item-2">
                <div class="profile-content">
                    <input class="page-search" id="search-loc" type="text" placeholder="Location"
                        v-model="location" @keyup="onSearchJobPosts" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                keyword: '',
                location: '',
            }
        },

        created() {
        
        },

        methods: {

            onSearchJobPosts() {
                Bus.$emit('searchJobPosts', this.keyword, this.location);
            },

        }
    }
</script>