<template>
    <div class="profile-item-2">
        <div class="profile-content">

            <main-modal id="modalIndustrySkill">
		
                <template slot="custom-modal-title">
                    <h4 class="modal-title">Edit Industry Skills & Achievements</h4>

                    <div class="close" data-dismiss="modal">&times;</div>
                </template>

                <template slot="custom-modal-content">
                    <form class="modal-form" method="POST" @submit.prevent="submitForm">
                        <div class="skill-label">
                            What are your main industry work achievements?
                        </div>
                        
                        <textarea ref="skillsIntro" class="form-control" style="overflow:hidden"
                            placeholder="Example: Worked on Rail link, saved $30,000 on budget, and delivered 2 weeks before project deadline."
                            @keyup="textAreaAdjust"></textarea>
                        
                        <div class="skill-label">
                            What are your main industry skills?
                        </div>
                        
                        <div class="row skill-row" v-for="skill in skills" :key="skill.id">
                            <label class="col-md-6 col-sm-6 skill-form-label text-md-right">
                                {{ skill.name }}
                            </label>

                            <div class="col-md-6 col-sm-6">
                                <select @change="onChangeLevel($event, skill.id)">
                                    <option v-for="level in levels" v-bind:value="level.id">{{ level.name }}</option>
                                </select>  
                            </div>
                        </div>

                    </form>
                </template>

                <template slot="custom-modal-footer">
                    <button class="mt-0" type="submit" @click="submitForm" :disabled="disabled">Save Changes</button>
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
            
            <div class="row" v-if="industry_skills.length > 0">
                <div class="col-md-12 col-sm-12 profile-intro">
                    {{ skills_intro }}
                </div>
                <div class="col-md-6 col-sm-6" v-for="first in firstColumn" v-bind:key="first.id">
                    <span class="bl-label-15">
                        {{ first.skill }}
                    </span>
                    <span class="bl-label-14">
                        {{ first.description }}
                    </span>
                </div>
                <div class="col-md-6 col-sm-6" v-for="second in secondColumn" v-bind:key="second.id">
                    <span class="bl-label-15">
                        {{ second.skill }}
                    </span>
                    <span class="bl-label-14">
                        {{ second.description }}
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
                user_skills: [
                    { skill_id: 1, level_id: 1 },
                    { skill_id: 2, level_id: 2 },
                    { skill_id: 3, level_id: 3 },
                    { skill_id: 4, level_id: 1 },
                    { skill_id: 5, level_id: 2 },
                ],
                skills_intro: '',
                industry_skills: [],
                firstColumn: [],
                secondColumn: [],
                endpoints: {
                    get: 'api/v1/skills',
                    save: '/api/v1/user/skill',
                }
            }
        },

        created() {
            let component = this;

            Bus.$on('industrySkillsDetails', function(detailsArray, skillsIntroduction) {
                component.skills_intro = skillsIntroduction;
                component.industry_skills = detailsArray;

                component.display();
            });
        },

        methods: {
            
            display() {
                let len = this.industry_skills.length;
                let half = Math.ceil(len / 2);

                this.firstColumn = this.industry_skills.slice(0, half);
                this.secondColumn = this.industry_skills.slice(half, len);
            },

            textAreaAdjust() {
                let o = this.$refs['skillsIntro'];
                o.style.height = "1px";
                o.style.height = (25+o.scrollHeight)+"px";
            },

            onChangeLevel(e, skill_id) {
                this.user_skills.push({ skill_id: skill_id, level_id: parseInt(e.target.value) })
            },

            submitForm() {
                console.log(this.user_skills)
            },
            // async submitForm() {
            //     let component = this;

			// 	Utils.setObjectValues(component.errors, '');
            //     component.disabled = true;

            //     await axios.post(component.endpoints.save, component.$data.input, Utils.getBearerAuth())
                    
            //         .then(function(response) {
            //             let data = response.data;
						
			// 			$('#modalIndustrySkill').modal('hide');
            //         })
            //         .catch(function(error) {
            //             if (error.response) {
            //                 let data = error.response.data;

			// 				for (let key in data.errors) {
			// 					component.errors[key] = data.errors[key] ? data.errors[key][0] : '';
            //                 }
            //             }

            //             Utils.handleError(error);
            //         });
                
            //     component.disabled = false;
            // },

        }
    }
</script>