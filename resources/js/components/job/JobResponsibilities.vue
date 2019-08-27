<template>
    <div class="profile-item-2">
        <div class="profile-content">
            
            <span class="edit-icon"
                data-toggle="modal"
                data-backdrop="static"
                data-keyboard="false"
                data-target="#modalJobResponsibilities">

                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span>
            
            <div class="profile-title">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <g fill="none" fill-rule="evenodd">
                        <path d="M0 0h24v24H0z"/>
                        <path fill="#00aeef" d="M17.818 8.226a2.175 2.175 0 0 1-2.182-2.168c0-1.197.977-2.167 2.182-2.167S20 4.86 20 6.058a2.175 2.175 0 0 1-2.182 2.168zM4 1h10.182v5.95A5.907 5.907 0 0 0 12 8.066a6.142 6.142 0 0 0-1.57 1.924L4 9.671V1zm6.926 9.707c.606-.846 1.206-1.481 1.802-1.907.893-.638 2.515-1.19 3.636 0 .747.794.02 2.89-2.182 6.284l1.797 2.412-1.08 5.322h-2.171v-4.706c-1.681-.76-2.707-1.392-3.08-1.896-.371-.505-.371-1.195 0-2.07h1.594l2.618-1.874a.378.378 0 0 0 .077-.541.415.415 0 0 0-.567-.082l-2.444 1.741c-1.45-.17-2.742-.329-3.876-.479-1.7-.224-1.758-2.848.692-2.557 1.633.195 2.694.313 3.184.353zm-1.62 6.277a4.7 4.7 0 0 0 .876.652c.304.174.91.469 1.818.886l-1.705 4.296H8.364l.942-5.834z"/>
                    </g>
                </svg>
                
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
        name: "job-responsibilities",
        data() {
            return {
                qualities: [],
                nextTitles: [],
            }
        },
        created() {
            let vm = this;

            Bus.$on('jobResponsibilitiesDetails', function(detailsArray) {
                if (detailsArray && detailsArray.length != 0) {
                    vm.qualities = detailsArray[0].items;
                    vm.nextTitles = detailsArray[1].items;
                }
            });
        },
        methods: {

        },
    }
</script>