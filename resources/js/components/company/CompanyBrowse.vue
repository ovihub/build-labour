<template>
    <div class="profile-item-2">
        <div class="profile-content">
            <div class="company-header">
                Posts
            </div>
            <div class="company-header">
                People
            </div>
            <div class="company-header">
                Jobs
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
            let component = this;

            Bus.$on('ticketsDetails', function(detailsArray) {
                component.tickets = detailsArray;
            });
        },

        methods: {
         
        }
    }
</script>