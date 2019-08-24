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
                        
                        <input class="form-control" type="text" v-model="course_name"
                            @focus="hasFocusCourse(true)"
                            @keyup="onSearchCourse(course_name)"/>

                        <span class="err-msg" v-if="errors.course_name">
                            {{ errors.course_name }}
                        </span>
                    </div>

                    <div class="emp-row" style="margin-top:0" v-if="has_focus_course && courses && courses.length > 0">
                        <ul class="list-group">
                            <li class="list-group-item" v-for="(course, idx) in courses" :key="idx"
                                @click="onSelectCourse(course)">
                                {{ course.course_name }}
                            </li>
                        </ul>
                    </div>

                    <div class="emp-row">
                        <div class="modal-form-label">School</div>

                        <input class="form-control" type="text" v-model="school"
                            @focus="hasFocusSchool(true)"
                            @keyup="onSearchSchool(school)" />

                        <span class="err-msg" v-if="errors.school">
                            {{ errors.school }}
                        </span>
                    </div>

                    <div class="emp-row" style="margin-top:0" v-if="has_focus_school && schools && schools.length > 0">
                        <ul class="list-group">
                            <li class="list-group-item" v-for="(school, idx) in schools" :key="idx"
                                @click="onSelectSchool(school)">
                                {{ school.school_name }}
                            </li>
                        </ul>
                    </div>

                    <div class="emp-row">
                        <input id="education_status_0" class="styled-checkbox-round" type="checkbox"
                            ref="education_status_0" @change="formatEduStatus(0)"
                            @focus="hasFocus()" />
                        <label for="education_status_0">Completed Study</label>
                        
                        <input id="education_status_1" class="styled-checkbox-round" type="checkbox"
                            ref="education_status_1" @change="formatEduStatus(1)"
                            @focus="hasFocus()" />
                        <label for="education_status_1">Still Studying</label>
                    </div>
                </div>

                <div class="emp-row" v-if="education_status != statuses[0]">
                    <div class="role-col-left">
                        <div class="emp-form-label">Start Month</div>
                        <select v-model="start_month" @focus="hasFocus()">
                            <option v-for="month in months" :key="month.id" v-bind:value="month.id">{{ month.name }}</option>
                        </select>
                        <span class="err-msg" v-if="errors.start_month">
                            {{ errors.start_month }}
                        </span>
                    </div>
                    <div class="role-col-right">
                        <div class="emp-form-label">Start Year</div>
                        <select v-model="start_year" @focus="hasFocus()">
                            <option v-for="(year, index) in years" :key="index" v-bind:value="year">{{ year }}</option>
                        </select>
                        <span class="err-msg" v-if="errors.start_year">
                            {{ errors.start_year }}
                        </span>
                    </div>
                </div>
                <div class="emp-row">
                    <div class="role-col-left">
                        <div class="emp-form-label">End Month</div>
                        <select v-model="end_month" @focus="hasFocus()">
                            <option v-for="month in months" :key="month.id" v-bind:value="month.id">{{ month.name }}</option>
                        </select>
                        <span class="err-msg" v-if="errors.end_month">
                            {{ errors.end_month }}
                        </span>
                    </div>
                    <div class="role-col-right">
                        <div class="emp-form-label">End Year</div>
                        <select v-model="end_year" @focus="hasFocus()">
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
    import MainModal from '../common/MainModal';

    var currentYear = new Date().getFullYear();

    export default {
        name: "education-modal",
        data() {
            return {
                has_focus_course: false,
                has_focus_school: false,
                disabled: false,
                months: Utils.getMonths(),
                years: Utils.getYears(),
                current: -1,
                courses: [],
                schools: [],
                /**
                 * Save Input
                 */
                id: '',
                course_id: '',
                school_id: '',
                course_name: '',
                education_status: '',
                school: '',
                start_day: '',
                start_month: '',
                start_year: '',
                end_day: '',
                end_month: '',
                end_year: '',
                statuses: [
                    'Completed Study',
                    'Still Studying',
                ],
                errors: {
                    course_name: '', education_status: '', school: '',
                    start_month: '', start_year: '', end_month: '', end_year: '',
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

            hasFocus() {
                this.has_focus_course = false;
                this.has_focus_school = false;
            },

            hasFocusCourse(has_focus) {
                this.has_focus_course = has_focus;
                
                if (has_focus) {
                    this.has_focus_school = false;
                }
            },

            hasFocusSchool(has_focus) {
                this.has_focus_school = has_focus;

                if (has_focus) {
                    this.has_focus_course = false;
                }
            },

            setValues(details) {
                this.id = details ? details.id : '';
                this.course_name = details ? details.course_name : '';
                this.education_status = details ? details.education_status : '';
                this.school_id = details ? details.school_id : '';
                this.school = details ? details.school_name : '';
                this.start_day = details ? details.start_day : '';
                this.start_month = details ? details.start_month : '';
                this.start_year = details ? details.start_year : '';
                this.end_day = details ? details.end_day : '';
                this.end_month = details ? details.end_month : '';
                this.end_year = details ? details.end_year : '';

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

                if (keyword != '' && (keyword && keyword.length > 0)) {
                    this.courses = Api.getCourses(keyword);

                } else {
                    this.courses = [];
                }
            },

            onSelectCourse(course) {
                this.course_id = course.id;
                this.course_name = course.course_name;

                this.courses = [];
            },

            onSearchSchool(keyword) {
                this.school_id = '';

                if (keyword != '' && (keyword && keyword.length > 0)) {
                    this.schools = Api.getSchools(keyword);

                } else {
                    this.schools = [];
                }
            },

            onSelectSchool(school) {
                this.school_id = school.id;
                this.school = school.school_name;

                this.schools = [];
            },

            formatEduStatus(value) {
                // if (this.education_status == this.statuses[1]) {
                //     this.years = Utils.getYears(currentYear + 10, currentYear - 10);
                // }

                for (let i = 0; i < this.statuses.length; i++) {
                    this.$refs['education_status_' + i].checked = false;    
                }
                
                if (value >= 0) {
                    this.$refs['education_status_' + value].checked = true;

                    this.education_status = this.statuses[value];
                }
            },

            async submit() {
                let component = this;
                let saveEndpoint = this.id == 0 ? this.endpoints.save : this.endpoints.save + '/' + this.id;

                let saveInput = {
                    course_id: this.course_id,
                    course_name: this.course_name,
                    education_status: this.education_status ? this.education_status : null,
                    school_id: this.school_id,
                    school: (this.school != 'n/a' && this.school != 'N/A') ? this.school : null,
                    start_day: this.start_day ? this.start_day : 1,
                    start_month: this.start_month,
                    start_year: this.start_year,
                    end_day: this.end_day ? this.end_day : 1,
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
        },
        components: {
            MainModal,
        },
    }
</script>

<style scoped>
    .styled-checkbox-round + label {
        width: 100%;
        color: #383d3f;
        margin-top: 8px;
    }
</style>