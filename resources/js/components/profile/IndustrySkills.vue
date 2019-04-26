<template>
    <div class="profile-item-2">
        <div class="profile-content">

            <main-modal id="modalIndustrySkill">
		
                <template slot="custom-modal-title">
                    <h4 class="modal-title">Edit Industry Skills & Achievements</h4>
                    <div class="close" data-dismiss="modal">&times;</div>
                </template>

                <template slot="custom-modal-content">
                    <form class="modal-form" method="POST" @submit.prevent="submit">
                        <div class="skill-label">
                            What are your main industry work achievements?
                        </div>
                        
                        <textarea ref="skillsIntro" class="form-control" style="overflow:hidden"
                            placeholder="Example: Worked on Rail link, saved $30,000 on budget, and delivered 2 weeks before project deadline."
                            @keyup="textAreaAdjust" v-model="skills_intro"></textarea>
                        
                        <div class="skill-label">
                            What are your main industry skills?
                        </div>

                        <div class="emp-row row-center" v-for="skill in user_skills" :key="skill.skill_id">
                            <label class="emp-col-left skill-form-label text-md-right">
                                {{ skill.skill_name }}
                            </label>

                            <div class="emp-col-right">
                                <select v-model="skill.level_id">
                                    <option v-for="level in levels" :key="level.id" v-bind:value="level.id">{{ level.name }}</option>
                                </select>  
                            </div>
                        </div>

                    </form>
                </template>

                <template slot="custom-modal-footer">
                    <button class="mt-0" type="submit" @click="submit" :disabled="disabled">Save Changes</button>
                </template>

            </main-modal>

            <span class="edit-icon" data-toggle="modal" data-target="#modalIndustrySkill">
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
                    {{ skills_intro }}
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
                skills_intro: '',
                is_empty: false,
                user_skills: [],
                firstColumn: [],
                secondColumn: [],
                endpoints: {
                    save: '/api/v1/user/skills',
                },
                levels: [
                    { id: 1, name: 'Beginner' },
                    { id: 2, name: 'Competent' },
                    { id: 3, name: 'Expert' },
                ],
                skills: [
                    { id: 1, name: 'Quality Control' },
                    { id: 2, name: 'Time Management' },
                    { id: 3, name: 'Teamwork' },
                    { id: 4, name: 'Communication Skills' },
                    { id: 5, name: 'Can Accept Criticism' },
                ],
            }
        },

        created() {
            let component = this;

            Bus.$on('industrySkillsDetails', function(detailsArray, skillsIntroduction) {
                component.skills_intro = skillsIntroduction;

                if (detailsArray.length == 0) {
                    component.is_empty = true;
                    component.skills.map(function(skill) {
                        component.user_skills.push({
                            skill_id: skill.id,
                            skill_name: skill.name,
                            level_id: 1
                        })
                    });

                } else {
                    component.user_skills = detailsArray;
                }

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
                o.style.height = (o.scrollHeight) + 'px';
            },

            async submit() {
                let component = this;

				Utils.setObjectValues(component.errors, '');
                
                component.disabled = true;

                let skills = {
                    main_skill: component.skills_intro,
                    skills: component.user_skills
                };

                await axios.post(component.endpoints.save, skills, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        let data = response.data;
						
						$('#modalIndustrySkill').modal('hide');
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