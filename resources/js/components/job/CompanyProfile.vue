<template>
    <div class="profile-item-1">
        <div class="company-image">

        </div>

        <div class="profile-content">
            <span class="edit-icon"
                data-toggle="modal"
                data-backdrop="static"
                data-keyboard="false"
                data-target="#modalCompanyProfile">

                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span>

            <div class="profile-content-p20 pb-4">
                <div class="company-title">ProBuild</div>
            
                <div class="company-address">
                    Melbourne, Australia
                </div>
                
                <div class="company-body">
                    At Probuild, we understand that from every strong foundation through to the tip of every tower,
                    our built environment demands the utmost quality. So for 30 years and counting, we’ve created
                    major projects for clients nationwide.

                    Creators that work hard to realise our clients’ visions everyday. If you can imagine it, we can do it.
                </div>

                <div class="company-view">
                    View Business
                </div>
            </div>
        
        </div>

        <button style="width:100%">
            Apply
        </button>
    </div>
</template>

<script>
    export default {
        data() {
            return {

            }
        },

        created() {
            let component = this;

        },

        methods: {

        }
    }
</script>