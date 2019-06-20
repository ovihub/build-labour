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

            async submit() {

            },
        }
    }
</script>