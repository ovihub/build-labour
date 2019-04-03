<template>
    <div class="profile-item-2">
        <div class="profile-content">
            <span class="edit-icon">
                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span>
            
            <span class="profile-title">
                <img src="/img/icons/education.png"
                    srcset="/img/icons/education@2x.png 2x, /img/icons/education@3x.png 3x">

                Education
            </span>
            
            <div v-for="education in educations" v-bind:key="education.id">
                <span class="profile-label">
                    {{ education.course }}
                </span>
                <span class="profile-text">
                    {{ education.start_date_formatted }} - {{ education.end_date_formatted }}
                </span>
            </div>

            <!-- <span class="profile-label">
                Masters in Construction Management
                </span>
            <span class="profile-text">
                March 2015 - November 2018
            </span>
            <span class="profile-label">
                Cert II - Construction
            </span>
            <span class="profile-text">
                June 2009 - April 2010
            </span>
            <span class="profile-label">
                Cert I - Construction
            </span>
            <span class="profile-text">
                November 2008 - June 2009
            </span> -->
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                educations: []
            }
        },

        created() {
            let component = this;

            Bus.$on('educationDetails', function(detailsArray) {
                component.educations = detailsArray;
            });
        },

        methods: {
            
        }
    }
</script>