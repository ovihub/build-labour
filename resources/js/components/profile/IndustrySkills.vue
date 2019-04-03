<template>
    <div class="profile-item-2">
        <div class="profile-content">
            <div class="profile-title">
                <img src="/img/icons/ticket.png"
                    srcset="/img/icons/ticket@2x.png 2x, /img/icons/ticket@3x.png 3x">

                Main Industry Skills and Achievements
            </div>
            
            <span class="profile-intro">
                Worked on Rail link, saved $30,000 on
                budget, and delivered 2 weeks before
                project deadline
            </span>

            <div v-for="industry_skill in industry_skills" v-bind:key="industry_skill.id">
                <span class="profile-label">
                    {{ industry_skill.name }}
                </span>
                <span class="profile-text">
                    {{ industry_skill.description }}
                </span>
            </div>

            <!-- <span class="profile-label">Quality Control</span>
            <span class="profile-text">
                Expert
            </span>

            <span class="profile-label">Communication Skills</span>
            <span class="profile-text">
                Expert
            </span>

            <span class="profile-label">Time Management</span>
            <span class="profile-text">
                Competent
            </span>

            <span class="profile-label">Can Accept Criticism</span>
            <span class="profile-text">
                Competent
            </span>

            <span class="profile-label">Teamwork</span>
            <span class="profile-text">
                Competent
            </span> -->
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                industry_skills: []
            }
        },

        created() {
            let component = this;

            Bus.$on('industrySkillsDetails', function(detailsArray) {
                component.industry_skills = detailsArray;
            });
        },

        methods: {
            
        }
    }
</script>