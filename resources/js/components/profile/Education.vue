<template>
    <div class="profile-item-2">
        <div class="profile-content">

            <education-modal></education-modal>

            <span class="add-icon" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modalEducation" @click="action(-1)">
                <img src="/img/icons/plus.png"
                    srcset="/img/icons/plus@2x.png 2x, /img/icons/plus@3x.png 3x">
            </span>
            
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