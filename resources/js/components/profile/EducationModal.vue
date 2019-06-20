<template>
    <main-modal id="modalEducation">

        <template slot="custom-modal-title">
            <h4 class="modal-title">{{ current == -1 ? 'Add' : 'Edit' }} Education</h4>
            <div class="close" data-dismiss="modal" @click="close">&times;</div>
        </template>

        <template slot="custom-modal-content">
            <form class="modal-form" method="POST" @submit.prevent="submit">
                <div class="form-group">
                    <div class="emp-row">
                        <div class="modal-form-label">Course</div>
                        
                        <input class="form-control" type="text" v-model="course_name" @keyup="onSearchCourse(course_name)"/>

                        <span class="err-msg" v-if="errors.course_name">
                            {{ errors.course_name }}
                        </span>
                    </div>

                    <div class="emp-row" style="margin-top:0" v-if="courses.length > 0">
                        <ul class="list-group">
                            <li class="list-group-item" v-for="(course, idx) in courses" :key="idx"
                                @click="onSelectCourse(course)">
                                {{ course.course_name }}
                            </li>
                        </ul>
                    </div>

                    <div class="emp-row">
                        <div class="modal-form-label">School</div>
                        <input class="form-control" type="text" v-model="school" />
                        <span class="err-msg" v-if="errors.school">
                            {{ errors.school }}
                        </span>
                    </div>

                    <div class="emp-row">
                        <input id="education_status_0" class="styled-checkbox-round" type="checkbox"
                            ref="education_status_0" @change="formatEduStatus(0)" />
                        <label for="education_status_0">Completed Study</label>
                        
                        <input id="education_status_1" class="styled-checkbox-round" type="checkbox"
                            ref="education_status_1" @change="formatEduStatus(1)" />
                        <label for="education_status_1">Still Studying</label>

                        <input id="education_status_2" class="styled-checkbox-round" type="checkbox"
                            ref="education_status_2" @change="formatEduStatus(2)" />
                        <label for="education_status_2">Incomplete</label>
                    </div>
                </div>

                <div class="emp-row">
                    <div class="role-col-left">
                        <div class="emp-form-label">Start Month</div>
                        <select v-model="start_month">
                            <option v-for="month in months" :key="month.id" v-bind:value="month.id">{{ month.name }}</option>
                        </select>
                        <span class="err-msg" v-if="errors.start_month">
                            {{ errors.start_month }}
                        </span>
                    </div>
                    <div class="role-col-right">
                        <div class="emp-form-label">Start Year</div>
                        <select v-model="start_year">
                            <option v-for="(year, index) in years" :key="index" v-bind:value="year">{{ year }}</option>
                        </select>
                        <span class="err-msg" v-if="errors.start_year">
                            {{ errors.start_year }}
                        </span>
                    </div>
                </div>
                <div class="emp-row" v-if="education_status != statuses[1]">
                    <div class="role-col-left">
                        <div class="emp-form-label">End Month</div>
                        <select v-model="end_month">
                            <option v-for="month in months" :key="month.id" v-bind:value="month.id">{{ month.name }}</option>
                        </select>
                        <span class="err-msg" v-if="errors.end_month">
                            {{ errors.end_month }}
                        </span>
                    </div>
                    <div class="role-col-right">
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
            <div class="btn btn-link btn-delete" data-dismiss="modal" v-if="current != -1" @click="deleteRecord">
                Delete
            </div>

            <button class="pull-right" type="submit" @click="submit" :disabled="disabled">
                Save Changes
            </button>
        </template>

    </main-modal>
</template>

<script>
    import Api from '@/api';

    export default {
        data() {
            return {
                disabled: false,
                months: Utils.getMonths(),
                years: Utils.getYears(),
                current: -1,
                courses: [],
                /**
                 * Save Input
                 */
                id: '',
                course_id: '',
                course_name: '',
                education_status: '',
                school: '',
                start_month: '',
                start_year: '',
                end_month: '',
                end_year: '',
                statuses: [
                    'Completed Study',
                    'Still Studying',
                    'Incomplete'
                ],
                errors: {
                    course_name: '', education_status: '', school: '', start_month: '', start_year: '', end_month: '', end_year: '',
                },
                endpoints: {
                    save: '/api/v1/user/education',
                    delete: '/api/v1/user/education/',
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
                this.course_name = details ? details.course_name : '';
                this.education_status = details ? details.education_status : '';
                this.school = details ? details.school : '';
                this.start_month = details ? details.start_month : '';
                this.start_year = details ? details.start_year : '';
                this.end_month = details && details.education_status != this.statuses[1] ? details.end_month : '';
                this.end_year = details && details.education_status != this.statuses[1] ? details.end_year : '';

                this.formatEduStatus(this.statuses.indexOf(this.education_status));
            },

            formatPeriod(edu) {
                return Utils.getMonth(edu.start_month - 1) + ' ' + edu.start_year + ' - ' + 
                       Utils.getMonth(edu.end_month - 1) + ' ' + edu.end_year;
            },

            close() {
                this.current = -1;

                Utils.setObjectValues(this.errors, '');
            },

            deleteRecord() {
                $('#deleteRecordModal').modal('show');
                
                Bus.$emit('deleteEducation', this.current, this.endpoints.delete + this.id);
            },

            onSearchCourse(keyword) {
                this.course_id = '';

                let component = this;

                Promise.resolve(Api.getCourses(keyword)).then(function(data) {
                    component.courses = data.data.courses;
                });
            },

            onSelectCourse(course) {
                this.course_id = course.id;
                this.course_name = course.course_name;

                this.courses = [];
            },

            formatEduStatus(value) {
                for (let i = 0; i < this.statuses.length; i++) {
                    this.$refs['education_status_' + i].checked = false;    
                }

                this.$refs['education_status_' + value].checked = true;

                this.education_status = this.statuses[value];
            },

            async submit() {
                let component = this;
                let saveEndpoint = this.id == 0 ? this.endpoints.save : this.endpoints.save + '/' + this.id;

                let saveInput = {
                    course_id: this.course_id,
                    course_name: this.course_name,
                    education_status: this.education_status,
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

<style scoped>
    .styled-checkbox-round + label {
        width: 100%;
        color: #383d3f;
        margin-top: 8px;
    }
</style>