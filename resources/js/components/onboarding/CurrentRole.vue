<template>
    <form class="modal-form" method="POST" @submit.prevent="submit">
        <div class="bl-label-16-style-2">
            Your Build Labour profile will mean you won't need to ever upload a resume or cover letter for our advertised jobs. So let's take some time to set up your profile correctly.
        </div>
        
        <div class="me-label">
            What is your current or most recent role/title?
        </div>
        <div class="emp-row">
            <input class="form-control" type="text" placeholder="Most Recent Role" />
        </div>
        <div class="emp-row">
            <input class="form-control" type="text" placeholder="Industry Area" />
        </div>

        <div class="me-label" style="margin-bottom:17px">Years Experience</div>
        <div class="me-row">
            <div class="role-col-left">
                <!-- <div class="emp-form-label">Years</div> -->
                <input class="form-control" type="text" placeholder="Years" />
            </div>
            <div class="role-col-right">
                <!-- <div class="emp-form-label">Months</div> -->
                <input class="form-control" type="text" placeholder="Months" />
            </div>
        </div>

        <div class="bl-btn-group">
            <div class="btn btn-link btn-delete" @click="submit">
                Save and Finish later
            </div>

            <button type="button" @click="next">
                To Employment History
            </button>
        </div>
    </form>
</template>

<script>
    import Api from '@/api';

    export default {

        data() {
            return {
                disabled: false,
            }
        },

        created() {

        },

        methods: {

            next() {
                Bus.$emit('onboardingNext', 2);
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
</style>