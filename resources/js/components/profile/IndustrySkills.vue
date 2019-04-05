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

            <div class="row">
                <div class="col-md-6 col-sm-6" v-for="first in firstColumn" v-bind:key="first.id">
                    <span class="profile-label">
                        {{ first.name }}
                    </span>
                    <span class="profile-text">
                        {{ first.description }}
                    </span>
                </div>
                <div class="col-md-6 col-sm-6" v-for="second in secondColumn" v-bind:key="second.id">
                    <span class="profile-label">
                        {{ second.name }}
                    </span>
                    <span class="profile-text">
                        {{ second.description }}
                    </span>
                </div>
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
                industry_skills: [],
                firstColumn: [],
                secondColumn: [],
            }
        },

        created() {
            let component = this;

            Bus.$on('industrySkillsDetails', function(detailsArray) {
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