<template>
    <div class="profile-item-1">
        <div class="profile-content">
            <div class="profile-content-p20 pt-3 pb-4">
                
                <main-modal id="modalAboutMe">
		
                    <template slot="custom-modal-title">
                        <h4 class="modal-title">Edit About Me</h4>
                        <div class="close" data-dismiss="modal">&times;</div>
                    </template>

                    <template slot="custom-modal-content">
                        <form class="modal-form" method="POST" @submit.prevent="submit">
                            <div class="form-group">
                                <div class="emp-row">
                                    <div class="modal-form-label">Gender</div>
                                    <input class="form-control" type="text" v-model="input.gender"/>
                                    <!-- <select v-model="input.gender">
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                    </select> -->
                                    <span class="err-msg" v-if="errors.gender">
                                        {{ errors.gender }}
                                    </span>
                                </div>

                                <div class="emp-row">
                                    <div class="modal-form-label">Date of Birth</div>
                                    <input class="form-control" type="text" placeholder="YYYY-MM-DD" v-model="input.date_of_birth" />
                                    <span class="err-msg" v-if="errors.date_of_birth">
                                        {{ errors.date_of_birth }}
                                    </span>
                                </div>

                                <div class="emp-row">
                                    <div class="modal-form-label">Marital Status</div>
                                    <input class="form-control" type="text" v-model="input.marital_status" />
                                    <!-- <select v-model="input.gender">
                                        <option>Single</option>
                                        <option>Married</option>
                                        <option>Other</option>
                                    </select> -->
                                    <span class="err-msg" v-if="errors.marital_status">
                                        {{ errors.marital_status }}
                                    </span>
                                </div>

                                <div class="emp-row">
                                    <div class="modal-form-label">English Skill</div>
                                    <input class="form-control" type="text" v-model="input.english_skill"/>
                                    <span class="err-msg" v-if="errors.english_skill">
                                        {{ errors.english_skill }}
                                    </span>
                                </div>
                                <div class="emp-row">
                                    <div class="modal-form-label">Driver's License</div>
                                    <input class="form-control" type="text" v-model="input.drivers_license"/>
                                    <span class="err-msg" v-if="errors.drivers_license">
                                        {{ errors.drivers_license }}
                                    </span>
                                </div>
                            </div>
                        </form>
                    </template>

                    <template slot="custom-modal-footer">
                        <button class="mt-0" type="submit" @click="submit" :disabled="disabled">Save Changes</button>
                    </template>

                </main-modal>
                
                <span class="edit-icon" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modalAboutMe">
                    <img src="/img/icons/editbutton.png"
                        srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
                </span>
            
                <div class="profile-title">About Me</div>

                <span class="bl-label-15 mt-2 pt-1" v-if="input.gender">Gender</span>
                <span class="bl-label-14">
                    {{ input.gender }}
                </span>

                <span class="bl-label-15 mt-2 pt-1" v-if="input.date_of_birth">Date of Birth</span>
                <span class="bl-label-14">
                    {{ formatDate(input.date_of_birth) }}
                </span>

                <span class="bl-label-15 mt-2 pt-1" v-if="input.marital_status">Marital Status</span>
                <span class="bl-label-14">
                    {{ input.marital_status }}
                </span>

                <span class="bl-label-15 mt-2 pt-1" v-if="input.english_skill">English Skill</span>
                <span class="bl-label-14">
                    {{ input.english_skill }}
                </span>

                <span class="bl-label-15 mt-2 pt-1" v-if="input.drivers_license">Driver's License</span>
                <span class="bl-label-14">
                    {{ input.drivers_license }}
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                disabled: false,
                input: {
                    gender: '', date_of_birth: '', marital_status: '', english_skill: '', drivers_license: ''
                },
                errors: {
                    gender: '', date_of_birth: '', marital_status: '', english_skill: '', drivers_license: ''
                },
                endpoints: {
                    save: '/api/v1/worker/optional'
                }
            }
        },

        created() {
            let component = this;

            Bus.$on('aboutMeDetails', function(details) {
                component.input = details;
            });
        },

        methods: {
            
            formatDate(d) {
                if (d != null) {
                    let date = new Date(d);

                    return date.getDate() + ' ' + Utils.getMonth(date.getMonth()) + ' ' + date.getFullYear();
                }
            },

            async submit() {
                let component = this;

				Utils.setObjectValues(component.errors, '');
                component.disabled = true;
                
                await axios.post(this.endpoints.save, component.$data.input, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        let data = response.data;
						
                        $('#modalAboutMe').modal('hide');
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