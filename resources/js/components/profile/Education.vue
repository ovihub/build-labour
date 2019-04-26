<template>
    <div class="profile-item-2">
        <div class="profile-content">

            <main-modal id="modalEducation">
		
                <template slot="custom-modal-title">
                    <h4 class="modal-title">Edit Education</h4>
                    <div class="close" data-dismiss="modal">&times;</div>
                </template>

                <template slot="custom-modal-content">
                    <form class="modal-form" method="POST" @submit.prevent="submitForm">
                        <!-- <div class="emp-label">Education Details</div> -->
                        
                        <div class="form-group">
                            <div class="emp-row">
                                <div class="modal-form-label">Degree</div>
                                <input class="form-control" type="text" v-model="input.course"/>
                            </div>

                            <div class="emp-row">
                                <div class="modal-form-label">University</div>
                                <input class="form-control" type="text" v-model="input.school" />
                            </div>
                        </div>

                        <div class="emp-row">
                            <div class="emp-col-left">
                                <div class="emp-form-label">Start Month</div>
                                <input type="hidden" v-model="input.start_month" />
                                <select v-model="input.start_month">
                                    <option v-for="month in months" :key="month.id" v-bind:value="month.id">{{ month.name }}</option>
                                </select>
                            </div>
                            <div class="emp-col-right">
                                <div class="emp-form-label">Start Year</div>
                                <input type="hidden" v-model="input.start_year" />
                                <select v-model="input.start_year">
                                    <option v-for="(year, index) in years" :key="index" v-bind:value="year">{{ year }}</option>
                                </select>
                            </div>
                        </div>
                         <div class="emp-row">
                            <div class="emp-col-left">
                                <div class="emp-form-label">End Month</div>
                                <input type="hidden" v-model="input.end_month" />
                                <select v-model="input.end_month">
                                    <option v-for="month in months" :key="month.id" v-bind:value="month.id">{{ month.name }}</option>
                                </select>
                            </div>
                            <div class="emp-col-right">
                                <div class="emp-form-label">End Year</div>
                                <input type="hidden" v-model="input.end_year" />
                                <select v-model="input.end_year">
                                    <option v-for="(year, index) in years" :key="index" v-bind:value="year">{{ year }}</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </template>

                <template slot="custom-modal-footer">
                    <button class="mt-0" type="submit" @click="submitForm" :disabled="disabled">Save Changes</button>
                </template>

            </main-modal>

            <span class="edit-icon" data-toggle="modal" data-target="#modalEducation" @click="addNew">
                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span>
            
            <span class="profile-title">
                <img src="/img/icons/education.png"
                    srcset="/img/icons/education@2x.png 2x, /img/icons/education@3x.png 3x">

                Education
            </span>
            
            <div v-for="(education, index) in educations" :key="index">
                <span class="edit-icon" data-toggle="modal" data-target="#modalEducation" @click="editDetails(index)">
                    <img src="/img/icons/editbutton.png"
                        srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
                </span>
                <div class="row mt-4">
                    <div class="bl-col-1">
                        <img class="bl-image-56" src="/img/logo/1.jpg">
                    </div>
                    <div class="bl-col-2">
                        <div class="bl-display">
                            <span class="bl-label-16 bl-ml15">
                                {{ education.course }}
                            </span>
                            <span class="bl-label-15 bl-ml15 mt-0 pt-0">
                                {{ education.school }}
                            </span>
                            <span class="bl-label-14 bl-ml15 mb-0 pb-0">
                                {{ getPeriod(education) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                disabled: false,
                months: Utils.getMonths(),
                years: Utils.getYears(),
                input: {
                    course: '', school: '', start_month: '', start_year: '', end_month: '', end_year: '',
                },
                educations: []
            }
        },

        created() {
            let component = this;

            Bus.$on('educationDetails', function(detailsArray) {
                component.educations = detailsArray;
            });
        },

        methods: {
            getPeriod(edu) {
                return Utils.getMonth(edu.start_month - 1) + ' ' + edu.start_year + ' - ' + 
                        Utils.getMonth(edu.end_month - 1) + ' ' + edu.end_year;
            },

            addNew() {
                this.input.course = '';
                this.input.school = '';
                this.input.start_month = '';
                this.input.start_year = '';
                this.input.end_month = '';
                this.input.end_year = '';
            },

            editDetails(index) {
                this.input = this.educations[index];
            },

            submitForm() {

            }
        }
    }
</script>