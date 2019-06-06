<template>
    <div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-item-2">
                    <div class="profile-content">
                        <input class="page-search" id="search-key" type="text" placeholder="Search" />
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="profile-item-2">
                    <div class="profile-content">
                        <input class="page-search" id="search-loc" type="text" placeholder="Location" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="profile-item-2">
                    <job-posts company-id="1"></job-posts>
                </div>
            </div>
            <div class="col-md-4">
                <job-ads></job-ads>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                
            }
        },

        created() {
        
        },

        methods: {

        }
    }
</script>