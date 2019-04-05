<template>
    <div class="profile-item-1">
        <div class="profile-content">
            <span class="edit-icon">
                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span>

            <div class="profile-title">Your Ideal Next Role</div>        
            <span class="bl-label-s14">(Visible only to you)</span>
            
            <span class="profile-intro">
                {{ input.nrole_info }}
            </span>

            <span class="bl-label-s15">When</span>
            <span class="bl-label-s14">
                {{ input.nrole_when }}
            </span>

            <span class="bl-label-s15">Maximum Distance from home</span>
            <span class="bl-label-s14">
                {{ input.nrole_travel_to_home }}
            </span>

            <span class="bl-label-s15">Willing to relocate to</span>
            <span class="bl-label-s14">
                {{ input.nrole_address }}
            </span>

            <span class="bl-label-s14">
                {{ input.nrole_state }}
            </span>

            <span class="bl-label-s15">Right to Work</span>
            <span class="bl-label-s14">
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