<template>
    <div class="profile-item-2" v-if="show">
        <ul class="list-job-items" v-for="n in 5" :key="n">
            <li class="job-items">
                <div class="profile-content">
                    
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                show: false,
            }
        },

        created() {
            let component = this;

            Bus.$on('showCompanyPeople', function(flag) {
                component.show = flag;
                
                Bus.$emit('hideCompanyJobs');
                Bus.$emit('hideCompanyPosts');
            });

            Bus.$on('hideCompanyPeople', function() {
                component.show = false;
            });
        },

        methods: {
         
        }
    }
</script>