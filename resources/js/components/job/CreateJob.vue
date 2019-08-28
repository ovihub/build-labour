<template>
    <div class="profile-item-2">
        <div class="profile-content">
            
            <div class="bl-label-20-style-2">
                Create Job
            </div>

            <div class="emp-row mt-3">
                <input type="text" class="form-control"
                    style="padding: 12px; font-size: 13px; border-radius: 4px; border: solid 1px rgba(0, 0, 0, 0.07); background-color: #ffffff; height: 46px; color: #acbbbf;"
                    placeholder="Enter Name to save as a template"
                    v-model="template_name">
            </div>

            <!-- <div class="btn btn-link btn-delete mb-2" @click="onClickSaveAsTemplate">
                Save as new template
            </div> -->

            <button style="width: 100%;" :disabled="disabled" @click="onClickPostJob">
                Create New Job
            </button>
        </div>
    </div>
</template>

<script>
    import Api from '@/api';

    export default {
        name: "create-job",
        data() {
            return {
                disabled: false,
                isTemplate: 0,
                template_name: '',
                input: {},
                endpoints: {
                    post: '/api/v1/job',
                    save: '/api/v1/job/save-template',
                },
            }
        },
        created() {
            let vm = this;

            Bus.$on('newJobDetails', function(input) {
                vm.input = input;
            });

            Bus.$on('newJobRequirements', function(input) {
                vm.input.qualifications = input.qualifications;
                vm.input.experience = input.experience;
                vm.input.skills = input.skills;
            });

            Bus.$on('newJobResponsibilities', function(input) {
                vm.input.categories = input.categories;

                if (vm.isTemplate) {
                    vm.input.template_name = vm.template_name;
                    vm.submit(vm.endpoints.save)
                
                } else {
                    vm.submit(vm.endpoints.post);
                }
            });
        },
        methods: {
            onClickSaveAsTemplate() {
                this.isTemplate = 1;

                Bus.$emit('saveJob');
            },
            onClickPostJob() {
                this.isTemplate = 0;

                Bus.$emit('saveJob');
            },
            async submit(endpoint) {
                let vm = this;

                this.disabled = true;

                await axios.post(endpoint, vm.$data.input, Utils.getBearerAuth())
                    
                .then(function(response) {
                    let data = response.data,
                        job = data.data.job;
                    
                    if (job.is_template) {
                        Bus.$emit('alertSuccess', data.message);
                        
                        Utils.setObjectValues(vm.input, '');

                    } else {
                        window.location.href = '/job/view?cid=' + job.company_id + '&jid=' + job.id;
                    }
                
                }).catch(function(error) {
                    let inputErrors = Utils.handleError(error);

                    if (inputErrors) Bus.$emit('newJobDetailsError', inputErrors);
                });

                this.disabled = false;
            },
        }
    }
</script>