<template>
    <div class="profile-item-2">
        <div class="profile-content">
            
            <!-- <span class="edit-icon"
                data-toggle="modal"
                data-backdrop="static"
                data-keyboard="false"
                data-target="#modalJobResponsibilities">

                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span> -->
            
            <div class="profile-title">
                <img src="/img/icons/responsibilities-orange.png"
                    srcset="/img/icons/responsibilities-orange@2x.png 2x, /img/icons/responsibilities-orange@3x.png 3x">
                
                Responsibilities
            </div>
        
            <div v-if="qualities.length > 0">
                <div class="job-title">Quality Management</div>
                <div class="job-body">
                    <ul class="job-list-items">
                        <li v-for="(quality, index) in qualities" :key="index">
                            {{ quality }}
                        </li>
                    </ul>
                </div>
            </div>

            <div v-if="nextTitles.length > 0">
                <div class="job-title">Next Title</div>
                <div class="job-body">
                    <ul class="job-list-items" v-for="(nextTitle, index) in nextTitles" :key="index">
                        <li>
                            {{ nextTitle }}
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                qualities: [],
                nextTitles: [],
            }
        },

        created() {
            let component = this;

            Bus.$on('jobResponsibilitiesDetails', function(detailsArray) {
                if (detailsArray.length != 0) {
                    component.qualities = detailsArray[0].items;
                    component.nextTitles = detailsArray[1].items;
                }
            });
        },

        methods: {

        }
    }
</script>