<template>
    <div class="profile-item-2">
        <div class="profile-content">
            
            <employment-modal></employment-modal>

            <span class="add-icon"
                data-toggle="modal"
                data-backdrop="static"
                data-keyboard="false"
                data-target="#modalEmployment"
                @click="action(-1)">

                <img src="/img/icons/plus.png"
                    srcset="/img/icons/plus@2x.png 2x, /img/icons/plus@3x.png 3x">
            </span>
            
            <div class="profile-title">
                <img src="/img/icons/employmenthistory.png"
                    srcset="/img/icons/employmenthistory@2x.png 2x, /img/icons/employmenthistory@3x.png 3x">
                
                Employment History
            </div>
        
            <employment-list></employment-list>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {

            }
        },

        created() {

        },

        methods: {

            action(index) {
                Bus.$emit('showEmployment', index, null);
            },

        }
    }
</script>