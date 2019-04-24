<template>
    <div class="profile-item-1">
        <div class="profile-content">
            <div class="profile-content-p20 pt-3 pb-4">
                
                <record-form title="YourIdealNextRole" :record="input" save-endpoint="/api/v1/worker/next-role"></record-form>

                <span class="edit-icon" data-toggle="modal" data-target="#modalYourIdealNextRole">
                    <img src="/img/icons/editbutton.png"
                        srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
                </span>

                <div class="profile-title">Your Ideal Next Role</div>        
                <span class="bl-label-14">(Visible only to you)</span>
                
                <span class="profile-intro">
                    {{ input.introduction }}
                </span>

                <span class="bl-label-15">When</span>
                <span class="bl-label-14">
                    {{ input.when }}
                </span>

                <span class="bl-label-15">Maximum Distance from home</span>
                <span class="bl-label-14">
                    {{ input.max_distance }}
                </span>

                <span class="bl-label-15">Willing to relocate to</span>
                <span class="bl-label-14">
                    {{ input.address }}
                </span>

                <span class="bl-label-14">
                    {{ input.state }}
                </span>

                <span class="bl-label-15">Right to Work</span>
                <span class="bl-label-14">
                    {{ input.right_to_work }}
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
                    introduction: '', when: '', max_distance: '', address: '',  state: '', right_to_work: '',
                }
            }
        },

        created() {
            let component = this;

            Bus.$on('idealRoleDetails', function(details) {
                if (details) {
                    component.input = details;
                }
            });
        },

        methods: {
            
        }
    }
</script>