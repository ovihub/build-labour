<template>
    <div class="profile-item-2">
        <div class="profile-content">
            <div class="profile-title">
                <img src="/img/icons/ticket.png"
                    srcset="/img/icons/ticket@2x.png 2x, /img/icons/ticket@3x.png 3x">

                Main Industry Skills & Achievements
            </div>
            
            <span class="profile-intro">
                {{ skills_intro }}
            </span>

            <div class="row">
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

            <!-- <span class="bl-label-15">Quality Control</span>
            <span class="bl-label-14">
                Expert
            </span>

            <span class="bl-label-15">Communication Skills</span>
            <span class="bl-label-14">
                Expert
            </span>

            <span class="bl-label-15">Time Management</span>
            <span class="bl-label-14">
                Competent
            </span>

            <span class="bl-label-15">Can Accept Criticism</span>
            <span class="bl-label-14">
                Competent
            </span>

            <span class="bl-label-15">Teamwork</span>
            <span class="bl-label-14">
                Competent
            </span> -->
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
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

                let len = component.industry_skills.length;
                let half = Math.ceil(len / 2);

                component.firstColumn = detailsArray.slice(0, half);
                component.secondColumn = detailsArray.slice(half, len);
            });
        },

        methods: {
            
        }
    }
</script>