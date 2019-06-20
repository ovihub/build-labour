<template>
    <form class="modal-form" method="POST" @submit.prevent="submit">
        <div class="bl-label-16-style-2">
            Your Build Labour profile will mean you won't need to ever upload a resume or cover letter for our advertised jobs.
            So let's take some time to set up your profile correctly.
        </div>
        
        <div class="me-label">
            What is your current or most recent role/title?
        </div>
        <div class="emp-row">
            <div class="emp-form-label" v-if="input.job_role">Most Recent Role</div>

            <input class="form-control" type="text" placeholder="Most Recent Role" v-model="input.job_role"
                @keyup="onSearchJob(input.job_role)" />
            
            <span class="err-msg" v-if="errors.job_role">
                {{ errors.job_role }}
            </span>
        </div>

        <div class="emp-row" style="margin-top:0" v-if="job_roles.length > 0">
            <ul class="list-group">
                <li class="list-group-item" v-for="(job, idx) in job_roles" :key="idx"
                    @click="onSelectJob(job)">
                    
                    {{ job.job_role_name }}
                </li>
            </ul>
        </div>

        <div class="emp-row">
            <div class="emp-form-label" v-if="input.location">Industry Area</div>

            <input class="form-control" type="text" placeholder="Industry Area" v-model="input.location" />
        </div>

        <div class="me-label" style="margin-bottom:17px">Years Experience</div>
        <div class="me-row">
            <div class="role-col-left">
                <div class="emp-form-label" v-if="input.years">Years</div>
                
                <input class="form-control" type="text" placeholder="Years" v-model="input.years" />
            </div>

            <div class="role-col-right">
                <div class="emp-form-label" v-if="input.months">Months</div>
                
                <input class="form-control" type="text" placeholder="Months" v-model="input.months" />
            </div>
        </div>
    </form>
</template>

<script>
    import Api from '@/api';

    export default {

        data() {
            return {
                disabled: false,
                job_roles: [],
                input: {
                    job_role: '', location: '', years: '', months: '',
                },
                errors: {
                    job_role: '', location: '', years: '', months: '',
                },
                endpoints: {
                    save: '',
                },
            }
        },

        created() {

        },

        methods: {

            onSearchJob(keyword) {
                // this.job_id = '';

                let component = this;
                
                Promise.resolve(Api.getJobRoles(keyword)).then(function(data) {
                    component.job_roles = data.data.job_roles;
                });
            },

            onSelectJob(job) {
                // this.input.job_id = job.id;
                this.input.job_role = job.job_role_name;

                this.job_roles = [];
            },

            async submit() {

            },
        }
    }
</script>