<template>
    <div class="profile-item-2">
        <div class="profile-content">
            <div class="bl-label-20-style-2">Create Job</div>

            <div class="emp-row mt-3" v-if="creating">
                <input type="text" class="form-control create-job-input" placeholder="Enter Name to save as a template" v-model="template_name">

                <span class="err-msg" v-if="errors.template_name">{{ errors.template_name }}</span>
            </div>

            <div class="emp-row mt-3" v-else>
                <input type="text" class="form-control create-job-input" placeholder="Search Jobs" @keyup="onSearchJobs">
            </div>

            <div v-if="creating" class="btn btn-link btn-delete mb-2" @click="onClickSaveAsTemplate">
                Save as new template
            </div>
            
            <div v-else>
                <label class="radio-cont">Saved Templates
                    <input type="checkbox" checked="true" ref="templates" @click="onClickShowJobs('templates')">
                    <span class="checkmark"></span>
                </label>

                <label class="radio-cont">Active Jobs
                    <input type="checkbox" ref="active" @click="onClickShowJobs('active')">
                    <span class="checkmark"></span>
                </label>

                <label class="radio-cont">Past Jobs
                    <input type="checkbox" ref="closed" @click="onClickShowJobs('closed')">
                    <span class="checkmark"></span>
                </label>
            </div>

            <button class="mt-4" style="width: 100%;" :disabled="disabled" @click="onClickPostJob">
                {{ creating ? 'Post Job' : 'Create New Job' }}
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
                creating: false,
                isTemplate: 0,
                template_name: '',
                input: {},
                errors: {
                    template_name: '',
                },
                keyword: '',
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
                vm.input.requirements = [
                    { title: 'Qualifications', items: input.qualifications },
                    { title: 'Experience', items: { min_exp: input.min_exp, experiences: input.experience } },
                    { title: 'Skills', items: input.skills },
                    { title: 'Tickets', items: input.tickets },
                ];
            });

            Bus.$on('newJobResponsibilities', function(input) {
                vm.input.responsibilities = input.responsibilities;

                if (vm.isTemplate) {
                    vm.input.template_name = vm.template_name;
                    vm.submit(vm.endpoints.save)
                
                } else {
                    vm.submit(vm.endpoints.post);
                }
            });

            Bus.$on('editJobPost', function(details) {
                vm.template_name = details.template_name;
                vm.creating = true;
            });
        },
        methods: {
            onClickShowJobs(refName) {
                this.$refs['templates'].checked = false;
                this.$refs['active'].checked = false;
                this.$refs['closed'].checked = false;

                this.$refs[refName].checked = true;

                Bus.$emit('getJobPosts', refName);
            },
            onSearchJobs(e) {
                let keyword = e.target.value;
            },
            onClickSaveAsTemplate() {
                this.isTemplate = 1;

                Bus.$emit('saveJob');
            },
            onClickPostJob() {
                if (this.creating) {
                    this.isTemplate = 0;
                    Bus.$emit('saveJob');

                } else {
                    this.creating = true;
                    Bus.$emit('createJob');
                }
            },
            async submit(endpoint) {
                let vm = this;

                this.disabled = true;

                await axios.post(endpoint, vm.$data.input, Utils.getBearerAuth())
                    
                .then(function(response) {
                    let data = response.data,
                        job = data.data.job;
                    
                    if (job.is_template) {
                        window.location.href = '/job/list';

                    } else {
                        window.location.href = '/job/view?cid=' + job.company_id + '&jid=' + job.id;
                    }
                
                }).catch(function(error) {
                    let inputErrors = Utils.handleError(error);

                    if (inputErrors) {
                        vm.errors.template_name = inputErrors.template_name;

                        Bus.$emit('newJobDetailsError', inputErrors);
                    }
                });

                this.disabled = false;
            },
        }
    }
</script>

<style scoped>
    .create-job-input {
        padding: 12px;
        font-size: 13px;
        border-radius: 4px;
        border: solid 1px rgba(0, 0, 0, 0.07);
        background-color: #ffffff;
        height: 46px;
    }
    .create-job-input::placeholder {
        color: #acbbbf;
    }

    /* Customize the label (the radio-cont) */
    .radio-cont {
        display: block;
        position: relative;
        padding-left: 35px;
        cursor: pointer;
        font-size: 15px;
        margin-top: 30px;
        line-height: normal;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default radio button */
    .radio-cont input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    /* Create a custom radio button */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 18px;
        width: 18px;
        border: solid 1px rgba(0, 87, 120, 0.17);
        border-radius: 50%;
    }

    /* When the radio button is checked, add a blue background */
    .radio-cont input:checked ~ .checkmark {
        background-color: #fff;
        border: 1px solid #00aeef;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .radio-cont input:checked ~ .checkmark:after {
        display: block;
    }

    /* Style the indicator (dot/circle) */
    .radio-cont .checkmark:after {
        top: 2px;
        left: 2px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #00aeef;
    }
</style>