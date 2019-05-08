<template>
    <div class="profile-item-2">
        <div class="profile-content">

            <delete-modal></delete-modal>

            <main-modal id="modalIndustrySkill">
		
                <template slot="custom-modal-title">
                    <h4 class="modal-title">Edit Industry Skills & Achievements</h4>
                    <div class="close" data-dismiss="modal" @click="close">&times;</div>
                </template>

                <template slot="custom-modal-content">
                    <form class="modal-form" method="POST" @submit.prevent="submit">
                        <div class="skill-label">
                            What are your main industry work achievements?
                        </div>
                        
                        <textarea rows="3" ref="skillsIntro" class="form-control" style="overflow:hidden"
                            placeholder="Example: Worked on Rail link, saved $30,000 on budget, and delivered 2 weeks before project deadline."
                            @keyup="textAreaAdjust" v-model="input.main_skill"></textarea>
                        
                        <span class="err-msg" v-if="errors.main_skill">
                            {{ errors.main_skill }}
                        </span>

                        <div class="skill-label">
                            What are your main industry skills?
                        </div>

                        <div class="emp-row row-center"
                            :ref="'skillItem-' + index" 
                            v-for="(skill, index) in input.skills"
                            :key="index">
                            
                            <div class="emp-col-left">
                                <input class="form-control" type="text" placeholder="Enter your Industry Skill" v-model="skill.skill_name" />
                            </div>

                            <div class="emp-col-mid">
                                <select v-model="skill.level_id">
                                    <option v-for="level in levels" :key="level.id" v-bind:value="level.id">{{ level.name }}</option>
                                </select>  
                            </div>

                            <div class="emp-col-right">
                                <span class="close-icon" @click="removeSkill(index)">
                                    &times;
                                    <!-- <img src="/img/icons/plus.png"
                                        srcset="/img/icons/plus@2x.png 2x, /img/icons/plus@3x.png 3x"> -->
                                </span>
                            </div>
                        </div>

                        <center>
                            <div class="btn btn-link btn-delete" @click="addNewSkill">
                                Add Another
                            </div>
                        </center>

                    </form>
                </template>

                <template slot="custom-modal-footer">
                    <div class="btn btn-link btn-delete" data-dismiss="modal" @click="deleteRecord">
                        Delete
                    </div>

                    <button class="pull-right" type="submit" @click="submit" :disabled="disabled">
                        Save Changes
                    </button>
                </template>

            </main-modal>

            <span class="edit-icon"
                data-toggle="modal"
                data-backdrop="static"
                data-keyboard="false"
                data-target="#modalIndustrySkill">

                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span>

            <div class="profile-title">
                <img src="/img/icons/achieve.png"
                    srcset="/img/icons/achieve@2x.png 2x, /img/icons/achieve@3x.png 3x">

                Main Industry Skills & Achievements
            </div>
            
            <div class="row" v-if="! is_empty">
                <div class="col-md-12 col-sm-12 profile-intro">
                    {{ main_skill }}
                </div>
                <div class="col-md-6 col-sm-6" v-for="first in firstColumn" v-bind:key="first.id">
                    <span class="bl-label-15">
                        {{ first.skill_name }}
                    </span>
                    <span class="bl-label-14">
                        {{ first.level_name }}
                    </span>
                </div>
                <div class="col-md-6 col-sm-6" v-for="second in secondColumn" v-bind:key="second.id">
                    <span class="bl-label-15">
                        {{ second.skill_name }}
                    </span>
                    <span class="bl-label-14">
                        {{ second.level_name }}
                    </span>
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
                main_skill: '',
                is_empty: false,
                user_skills: [],
                firstColumn: [],
                secondColumn: [],
                input: {
                    main_skill: '', skills: [],
                },
                errors: {
                    main_skill: ''
                },
                endpoints: {
                    save: '/api/v1/user/skills',
                    delete: '/api/v1/user/skills',
                },
                levels: [
                    { id: 1, name: 'Beginner' },
                    { id: 2, name: 'Competent' },
                    { id: 3, name: 'Expert' },
                ],
            }
        },

        created() {
            let component = this;

            Bus.$on('industrySkillsDetails', function(detailsArray, skillsIntroduction) {
                component.main_skill = skillsIntroduction;

                if (detailsArray.length == 0) {
                    component.is_empty = true;
                    component.input.skills.push({
                        skill_id: 0,
                        skill_name: '',
                        level_id: 1
                    });

                } else {
                    component.input.main_skill = component.main_skill;
                    component.input.skills = detailsArray;
                    component.user_skills = detailsArray;
                }

                component.display();
            });

            Bus.$on('removeIndustrySkill', function() {
                component.main_skill = '';
                component.user_skills = [];
                component.display();
            });
        },

        methods: {
            
            display() {
                let len = this.user_skills.length;
                let half = Math.ceil(len / 2);

                this.firstColumn = this.user_skills.slice(0, half);
                this.secondColumn = this.user_skills.slice(half, len);
            },

            textAreaAdjust() {
                let o = this.$refs['skillsIntro'];
                o.style.height = '1px';
                o.style.height = (2 + o.scrollHeight) + 'px';
            },

            close() {
                this.input.main_skill = this.main_skill;
                this.input.skills = this.firstColumn.concat(this.secondColumn);

                Utils.setObjectValues(this.errors, '');
            },

            deleteRecord() {
                $('#deleteRecordModal').modal('show');

                Bus.$emit('deleteIndustrySkill', this.endpoints.delete);
            },

            addNewSkill() {
                if (this.input.skills.length == 0 || this.input.skills.slice(-1)[0].skill_name !== '') {
                    this.input.skills.push({
                        skill_id: 0,
                        skill_name: '',
                        level_id: 1
                    });
                }
            },

            removeSkill(index) {
                this.input.skills.splice(index, 1);
            },

            async submit() {
                let component = this;

				Utils.setObjectValues(component.errors, '');
                
                component.disabled = true;

                await axios.post(component.endpoints.save, component.$data.input, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        let data = response.data;
						
                        $('#modalIndustrySkill').modal('hide');
                        
                        component.is_empty = false;
                        
                        component.main_skill = data.data.main_skill;
                        component.input.skills = data.data.skills;
                        component.user_skills = data.data.skills;

                        component.display();
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