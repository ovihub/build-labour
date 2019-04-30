<template>
    <main-modal id="modalEducation">

        <template slot="custom-modal-title">
            <h4 class="modal-title">Edit Education</h4>
            <div class="close" data-dismiss="modal" @click="close">&times;</div>
        </template>

        <template slot="custom-modal-content">
            <form class="modal-form" method="POST" @submit.prevent="submit">
                <div class="form-group">
                    <div class="emp-row">
                        <div class="modal-form-label">Course</div>
                        <input class="form-control" type="text" v-model="course" />
                        <span class="err-msg" v-if="errors.course">
                            {{ errors.course }}
                        </span>
                    </div>

                    <div class="emp-row">
                        <div class="modal-form-label">School</div>
                        <input class="form-control" type="text" v-model="school" />
                        <span class="err-msg" v-if="errors.school">
                            {{ errors.school }}
                        </span>
                    </div>
                </div>

                <div class="emp-row">
                    <div class="emp-col-left">
                        <div class="emp-form-label">Start Month</div>
                        <select v-model="start_month">
                            <option v-for="month in months" :key="month.id" v-bind:value="month.id">{{ month.name }}</option>
                        </select>
                        <span class="err-msg" v-if="errors.start_month">
                            {{ errors.start_month }}
                        </span>
                    </div>
                    <div class="emp-col-right">
                        <div class="emp-form-label">Start Year</div>
                        <select v-model="start_year">
                            <option v-for="(year, index) in years" :key="index" v-bind:value="year">{{ year }}</option>
                        </select>
                        <span class="err-msg" v-if="errors.start_year">
                            {{ errors.start_year }}
                        </span>
                    </div>
                </div>
                    <div class="emp-row">
                    <div class="emp-col-left">
                        <div class="emp-form-label">End Month</div>
                        <select v-model="end_month">
                            <option v-for="month in months" :key="month.id" v-bind:value="month.id">{{ month.name }}</option>
                        </select>
                        <span class="err-msg" v-if="errors.end_month">
                            {{ errors.end_month }}
                        </span>
                    </div>
                    <div class="emp-col-right">
                        <div class="emp-form-label">End Year</div>
                        <select v-model="end_year">
                            <option v-for="(year, index) in years" :key="index" v-bind:value="year">{{ year }}</option>
                        </select>
                        <span class="err-msg" v-if="errors.end_year">
                            {{ errors.end_year }}
                        </span>
                    </div>
                </div>
            </form>
        </template>

        <template slot="custom-modal-footer">
            <button class="mt-0" type="submit" @click="submit" :disabled="disabled">Save Changes</button>
        </template>

    </main-modal>
</template>

<script>
    export default {
        data() {
            return {
                disabled: false,
                months: Utils.getMonths(),
                years: Utils.getYears(),
                current: -1,
                /**
                 * Save Input
                 */
                id: '',
                course: '',
                school: '',
                start_month: '',
                start_year: '',
                end_month: '',
                end_year: '',
                errors: {
                    course: '', school: '', start_month: '', start_year: '', end_month: '', end_year: '',
                },
                endpoints: {
                    save: '/api/v1/user/education',
                },
            }
        },

        created() {
            let component = this;

            Bus.$on('showEducation', function(index, details) {
                component.current = index;
                component.setValues(details);
            });
        },

        methods: {

            setValues(details) {
                this.id = details ? details.id : '';
                this.course = details ? details.course : '';
                this.school = details ? details.school : '';
                this.start_month = details ? details.start_month : '';
                this.start_year = details ? details.start_year : '';
                this.end_month = details ? details.end_month : '';
                this.end_year = details ? details.end_year : '';
            },

            formatPeriod(edu) {
                return Utils.getMonth(edu.start_month - 1) + ' ' + edu.start_year + ' - ' + 
                       Utils.getMonth(edu.end_month - 1) + ' ' + edu.end_year;
            },

            close() {
                this.current = -1;

                Utils.setObjectValues(this.errors, '');
            },

            async submit() {
                let component = this;
                let saveEndpoint = this.id == 0 ? this.endpoints.save : this.endpoints.save + '/' + this.id;

                let saveInput = {
                    course: this.course,
                    school: this.school,
                    start_month: this.start_month,
                    start_year: this.start_year,
                    end_month: this.end_month,
                    end_year: this.end_year,
                };

                Utils.setObjectValues(this.errors, '');
                this.disabled = true;

                await axios.post(saveEndpoint, saveInput, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        let data = response.data;
                        
                        $('#modalEducation').modal('hide');
                        
                        Bus.$emit('updateEducation', component.current, data.data.education);
                    })
                    .catch(function(error) {
                        if (error.response) {
                            let data = error.response.data;

							for (let key in data.errors) {
								component.errors[key] = data.errors[key] ? data.errors[key][0] : '';
                            }
                        }

                        Utils.handleError(error);
                    });
                
                this.disabled = false;
            },
        }
    }
</script>