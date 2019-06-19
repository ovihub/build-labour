<template>
    <form class="modal-form" method="POST" @submit.prevent="submit">
        <div class="skill-label">
            What formal qualifications have you completed?
        </div>
        <div class="skill-label-3">
            e.g. Certificate II in Construction
        </div>

        <div class="btn btn-link btn-delete"
            data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modalEducation"
            @click="action(-1)">
            
            Add Another
        </div>
        
        <education-list></education-list>

        <div class="bl-btn-group">
            <div class="btn btn-link btn-delete" @click="submit">
                Save and Finish later
            </div>

            <button type="button" @click="next">
                To Tickets
            </button>
        </div>
    </form>
</template>

<script>
    import Api from '@/api';

    export default {

        data() {
            return {
                input: {
                
                },
                errors: {

                },
            }
        },

        created() {
            
        },

        methods: {

            action(index) {
                Bus.$emit('showEducation', index, null);
            },

            next() {
                Bus.$emit('onboardingNext', 4);
            },

            async submit() {

            },
        }
    }
</script>

<style scoped>
    button {
        width: 200px;
        margin-left: 130px;
    }
    .btn-link {
        padding-top: 0px;
    }
</style>