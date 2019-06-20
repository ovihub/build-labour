<template>
    <div class="profile-item-2">
        <div class="profile-content">

            <education-modal></education-modal>

            <div @click="action(-1)">
                <edit-icon cls="add-icon" data-target="#modalEducation" icon-name="plus"></edit-icon>
            </div>
            
            <span class="profile-title">
                <img src="/img/icons/education.png"
                    srcset="/img/icons/education@2x.png 2x, /img/icons/education@3x.png 3x">

                Education
            </span>
            
            <education-list></education-list>
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
                Bus.$emit('showEducation', index, null);
            },
        }
    }
</script>