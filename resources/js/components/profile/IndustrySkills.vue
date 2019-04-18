<template>
    <div class="profile-item-2">
        <div class="profile-content">

            <record-form title="AddSkills" :record="input" save-endpoint="/api/v1/user/skill"></record-form>

            <span class="edit-icon" data-toggle="modal" data-target="#modalAddSkills">
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
                        {{ first.name }}
                    </span>
                    <span class="bl-label-14">
                        {{ first.description }}
                    </span>
                </div>
                <div class="col-md-6 col-sm-6" v-for="second in secondColumn" v-bind:key="second.id">
                    <span class="bl-label-15">
                        {{ second.name }}
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
                input: {
                    name: '', description: ''
                },
                skills_intro: '',
                industry_skills: [],
                firstColumn: [],
                secondColumn: [],
            }
        },

        created() {
            let component = this;

            Bus.$on('industrySkillsDetails', function(detailsArray, skillsIntroduction) {
                component.skills_intro = skillsIntroduction;
                component.industry_skills = detailsArray;

                component.display();
            });

            Bus.$on('AddSkills', function(details) {
                component.industry_skills.push(details);

                component.display();
            });
        },

        methods: {
            
            display() {
                let len = this.industry_skills.length;
                let half = Math.ceil(len / 2);

                this.firstColumn = this.industry_skills.slice(0, half);
                this.secondColumn = this.industry_skills.slice(half, len);
            }

        }
    }
</script>