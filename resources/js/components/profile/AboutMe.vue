<template>
    <div class="profile-item-1">
        <div class="profile-content">
            <div class="profile-content-p20 pt-3 pb-4">
                
                <record-form title="AboutMe" :record="input" save-endpoint="/api/v1/worker/optional"></record-form>
                
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
                input: {
                    gender: null, date_of_birth: null, marital_status: null, english_skill: null, drivers_license: null
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
            }
        }
    }
</script>