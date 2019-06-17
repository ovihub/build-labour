<template>
    <div class="profile-item-2">
        <div class="profile-content" style="padding-left:0;padding-right:0">

            <div class="form-sub-header">{{ subHeader }}</div>
            
            <div class="comp-progress">
                <div class="form-progress-2 bl-mr10 complete"></div>
                <div class="form-progress-2 bl-mr10" :class="progressCls[0]" @click="goToStep(1)"></div>
                <div class="form-progress-2 bl-mr10" :class="progressCls[1]" @click="goToStep(2)"></div>
                <div class="form-progress-2 bl-mr10" :class="progressCls[2]" @click="goToStep(3)"></div>
                <div class="form-progress-2 bl-mr10" :class="progressCls[3]" @click="goToStep(4)"></div>
                <div class="form-progress-2 bl-mr10" :class="progressCls[4]" @click="goToStep(5)"></div>
                <div class="form-progress-2 bl-mr10" :class="progressCls[5]" @click="goToStep(6)"></div>
                <div class="form-progress-2" :class="progressCls[6]" @click="goToStep(7)"></div>
            </div>
            
            <employment-modal></employment-modal>

            <education-modal></education-modal>

            <form>
                <ul class="comp-card-wrapper" ref="compCardWrapper">
                    <li><employment-history></employment-history></li>
                    <li><education-history></education-history></li>
                    <li><ticket-details></ticket-details></li>
                    <li><skill-details></skill-details></li>
                    <li><work-preferences></work-preferences></li>
                    <li><work-information></work-information></li>
                    <li><personal-details></personal-details></li>
                </ul>
            </form>
        </div>
    </div>
</template>

<script>
    import Api from '@/api';

    export default {

        data() {
            return {
                sections: null,
                step: 1,
                max: 1,
                orientation: '',
                subHeader: 'Employment History',
                progressCls: [],
                subHeaders: [
                    'Employment History',
                    'Education',
                    'Tickets',
                    'Main Industry Skills & Achievements',
                    'Work Preferences',
                    'Work Information',
                    'Personal Details'
                ],
                endpoints: {

                },
            }
        },

        computed: {
            isFirstStep: function(){
                return (this.step === 1);
            },

            isLastStep: function(){
                return (this.step === this.max);
            },
        },

        watch: {
            orientation: 'setCssVars',
        },

        created() {
            let component = this;

            setTimeout(function() {
                component.$sections = component.$refs['compCardWrapper'].querySelectorAll('li');
                component.max = component.$sections.length;
                component.goToStep(1);
            }, 1);

            this.progressCls[0] = 'active';
        },

        methods: {

            setCssVars() {
                this.$refs['compCardWrapper'].style.setProperty('--x', (((this.step * 100) - 100) * -1) + '%')
                this.$refs['compCardWrapper'].style.setProperty('--y', (((this.step * 100) - 100) * 0) + '%')
                this.$refs['compCardWrapper'].style.setProperty('--axis', 'row')
                this.$refs['compCardWrapper'].style.setProperty('--axis-reverse', 'row-reverse')
                this.$refs['compCardWrapper'].style.setProperty('--cross', 'column')
                this.$refs['compCardWrapper'].style.setProperty('--cross-reverse', 'column-reverse')
            },

            goToStep(step) {
                this.step = step > this.max ? this.max : step < 1 ? 1 : step;
                this.currentSection = this.$sections[this.step-1];

                this.$sections.forEach(function(section) {
                    section.classList.remove('current');
                });

                this.currentSection.classList.add('current');
                this.currentSection.scrollTop = 0;

                this.setCssVars();
                
                this.subHeader = this.subHeaders[step - 1];

                for (let i = 0; i < step - 1; i++) {
                    this.progressCls[i] = 'complete'
                }
                
                this.progressCls[step - 1] = 'active';
                
                for (let i = step; i < this.progressCls.length; i++) {
                    this.progressCls[i] = 'incomplete'
                }
            },

        }
    }
</script>

<style scoped>
    li {
        width: 570px;
        padding-left: 8px;
        padding-right: 8px;
    }
</style>