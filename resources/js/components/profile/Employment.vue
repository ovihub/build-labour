<template>
    <div class="profile-item-2">
        <div class="profile-content">
            
            <employment-modal></employment-modal>
            
            <div @click="action(-1)">
                <edit-icon cls="add-icon" data-target="#modalEmployment" icon-name="plus"></edit-icon>
            </div>
            
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