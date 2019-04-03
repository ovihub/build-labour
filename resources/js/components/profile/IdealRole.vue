<template>
    <div class="profile-item-1">
        <div class="profile-content">
            <span class="edit-icon">
                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span>

            <div class="profile-title">Your Ideal Next Role</div>        
            <span class="profile-text">(Visible only to you)</span>
            
            <span class="profile-intro">
                {{ input.nrole_info }}
            </span>

            <span class="profile-label">When</span>
            <span class="profile-text">
                {{ input.nrole_when }}
            </span>

            <span class="profile-label">Maximum Distance from home</span>
            <span class="profile-text">
                {{ input.nrole_travel_to_home }}
            </span>

            <span class="profile-label">Willing to relocate to</span>
            <span class="profile-text">
                {{ input.nrole_address }}
            </span>

            <span class="profile-text">
                {{ input.nrole_state }}
            </span>

            <span class="profile-label">Right to Work</span>
            <span class="profile-text">
                {{ input.nrole_right_to_work_au_desc }}
            </span>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                input: { 
                    nrole_info: '', nrole_when: '', nrole_travel_to_home: '', nrole_address: '',  nrole_state: '',
                    nrole_right_to_work_au: '', nrole_right_to_work_au_desc: '',
                }
            }
        },

        created() {
            let component = this;

            Bus.$on('idealRoleDetails', function(details) {
                component.input = details;
            });
        },

        methods: {
            
        }
    }
</script>