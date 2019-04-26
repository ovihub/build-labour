<template>
    <div class="profile-item-2">
        <div class="profile-content">

            <main-modal id="modalAddEducation">
		
                <template slot="custom-modal-title">
                    <h4 class="modal-title">Add Education</h4>
                    <div class="close" data-dismiss="modal" @click="close">&times;</div>
                </template>

                <template slot="custom-modal-content">
                    <form class="modal-form" method="POST" @submit.prevent="submit">
                        <div class="form-group">
                            <div class="emp-row">
                                <div class="modal-form-label">Course</div>
                                <input class="form-control" type="text" v-model="input_add.course" />
                                <span class="err-msg" v-if="errors.course">
                                    {{ errors.course }}
                                </span>
                            </div>

                            <div class="emp-row">
                                <div class="modal-form-label">School</div>
                                <input class="form-control" type="text" v-model="input_add.school" />
                                <span class="err-msg" v-if="errors.school">
                                    {{ errors.school }}
                                </span>
                            </div>
                        </div>

                        <div class="emp-row">
                            <div class="emp-col-left">
                                <div class="emp-form-label">Start Month</div>
                                <select v-model="input_add.start_month">
                                    <option v-for="month in months" :key="month.id" v-bind:value="month.id">{{ month.name }}</option>
                                </select>
                                <span class="err-msg" v-if="errors.start_month">
                                    {{ errors.start_month }}
                                </span>
                            </div>
                            <div class="emp-col-right">
                                <div class="emp-form-label">Start Year</div>
                                <select v-model="input_add.start_year">
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
                                <select v-model="input_add.end_month">
                                    <option v-for="month in months" :key="month.id" v-bind:value="month.id">{{ month.name }}</option>
                                </select>
                                <span class="err-msg" v-if="errors.end_month">
                                    {{ errors.end_month }}
                                </span>
                            </div>
                            <div class="emp-col-right">
                                <div class="emp-form-label">End Year</div>
                                <select v-model="input_add.end_year">
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
                    <button class="mt-0" type="submit" @click="submit(0)" :disabled="disabled">Save Changes</button>
                </template>

            </main-modal>

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
                                <input class="form-control" type="text" v-model="input.course" />
                                <span class="err-msg" v-if="errors.course">
                                    {{ errors.course }}
                                </span>
                            </div>

                            <div class="emp-row">
                                <div class="modal-form-label">School</div>
                                <input class="form-control" type="text" v-model="input.school" />
                                <span class="err-msg" v-if="errors.school">
                                    {{ errors.school }}
                                </span>
                            </div>
                        </div>

                        <div class="emp-row">
                            <div class="emp-col-left">
                                <div class="emp-form-label">Start Month</div>
                                <select v-model="input.start_month">
                                    <option v-for="month in months" :key="month.id" v-bind:value="month.id">{{ month.name }}</option>
                                </select>
                                <span class="err-msg" v-if="errors.start_month">
                                    {{ errors.start_month }}
                                </span>
                            </div>
                            <div class="emp-col-right">
                                <div class="emp-form-label">Start Year</div>
                                <select v-model="input.start_year">
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
                                <select v-model="input.end_month">
                                    <option v-for="month in months" :key="month.id" v-bind:value="month.id">{{ month.name }}</option>
                                </select>
                                <span class="err-msg" v-if="errors.end_month">
                                    {{ errors.end_month }}
                                </span>
                            </div>
                            <div class="emp-col-right">
                                <div class="emp-form-label">End Year</div>
                                <select v-model="input.end_year">
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

            <span class="add-icon" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modalAddEducation" @click="add">
                <img src="/img/icons/plus.png"
                    srcset="/img/icons/plus@2x.png 2x, /img/icons/plus@3x.png 3x">
            </span>
            
            <span class="profile-title">
                <img src="/img/icons/education.png"
                    srcset="/img/icons/education@2x.png 2x, /img/icons/education@3x.png 3x">

                Education
            </span>
            
            <div v-for="(education, e) in educations" :key="e">
                <span class="edit-icon" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modalEducation" @click="edit(e)">
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
                educations: [],
                current: -1,
                input_add: {
                    id: '', course: '', school: '', start_month: '', start_year: '', end_month: '', end_year: '',
                },
                input: {
                    id: '', course: '', school: '', start_month: '', start_year: '', end_month: '', end_year: '',
                },
                errors: {
                    course: '', school: '', start_month: '', start_year: '', end_month: '', end_year: '',
                },
                endpoints: {
                    save: '/api/v1/user/education/',
                },
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

            add() {
                Utils.setObjectValues(this.input, '');
            },

            edit(index) {
                this.current = index;
                this.input = this.educations[index];
            },

            close() {
                Utils.setObjectValues(this.errors, '');
            },

            async submit(id) {
                let saveEndpoint = id == 0 ? this.endpoints.save : this.endpoints.save + this.input.id;
                let saveInput = id == 0 ? this.$data.input_add : this.$data.input;
                let component = this;

				Utils.setObjectValues(component.errors, '');
                component.disabled = true;
                
                await axios.post(saveEndpoint, saveInput, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        let data = response.data;
                        
                        $('#modalEducation').modal('hide');
                        $('#modalAddEducation').modal('hide');
                        
                        id == 0 ?
                            component.educations.push(data.data.education) : 
                            component.educations[component.current] = data.data.education;
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
                
                component.disabled = false;
            },
        }
    }
</script>