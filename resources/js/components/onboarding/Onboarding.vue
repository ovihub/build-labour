<template>
    <div class="col-md-6">
        <div class="profile-item-2">
            <div class="profile-content" style="padding: 20px 0px 0px 0px">
                <!-- ; max-height: 650px; overflow: scroll; -->
                <div class="form-sub-header">{{ subHeader }}</div>
                
                <div class="comp-progress">
                    <div class="form-progress-2 bl-mr10" :class="progressCls[0]"></div>
                    <div class="form-progress-2 bl-mr10" :class="progressCls[1]"></div>
                    <div class="form-progress-2 bl-mr10" :class="progressCls[2]"></div>
                    <div class="form-progress-2 bl-mr10" :class="progressCls[3]"></div>
                    <div class="form-progress-2 bl-mr10" :class="progressCls[4]"></div>
                    <div class="form-progress-2 bl-mr10" :class="progressCls[5]"></div>
                    <div class="form-progress-2 bl-mr10" :class="progressCls[6]"></div>
                    <div class="form-progress-2 bl-mr10" :class="progressCls[7]"></div>
                    <div class="form-progress-2" :class="progressCls[8]"></div>
                </div>

                <employment-modal></employment-modal>

                <education-modal></education-modal>

                <ul class="comp-card-wrapper" ref="compCardWrapper">
                    <li class="comp-card-list"><current-role :most-recent-role="mostRecentRole"></current-role></li>
                    <li class="comp-card-list"><employment-history></employment-history></li>
                    <li class="comp-card-list"><education-history></education-history></li>
                    <li class="comp-card-list"><ticket-details></ticket-details></li>
                    <li class="comp-card-list"><skill-details></skill-details></li>
                    <li class="comp-card-list"><skill-achievements></skill-achievements></li>
                    <li class="comp-card-list"><work-preferences></work-preferences></li>
                    <li class="comp-card-list"><work-information></work-information></li>
                    <li class="comp-card-list"><personal-details></personal-details></li>
                </ul>
                
                <div class="modal-footer">
                    <div class="btn btn-link btn-delete" @click="save">
                        Save and Finish later
                    </div>

                    <button class="pull-right" type="button" @click="submit">
                        {{ nextButton }}
                    </button>
                </div>
            </div>
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
                currentSection: '',
                subHeaders: [
                    'Starting your profile',
                    'Employment History',
                    'Education',
                    'Tickets',
                    'Main Industry Skills',
                    'Main Industry Achievements',
                    'Work Preferences',
                    'Work Information',
                    'Personal Details'
                ],
                nextButtons: [
                    'To Employment History',
                    'To Education',
                    'To Tickets',
                    'To Industry Skills',
                    'To Achievements',
                    'To Work Preferences',
                    'To Work Information',
                    'To Personal Details',
                    'Complete Profile'
                ],
                submitForms: [
                    'CurrentRole',
                    'EmploymentHistory',
                    'Education',
                    'Tickets',
                    'IndustrySkills',
                    'Achievements',
                    'WorkPreferences',
                    'WorkInformation',
                    'PersonalDetails',
                ],
                endpoints: {
                    profile: '/user/profile',
                },
            }
        },

        props: {
            mostRecentRole: {
                type: String,
                required: false,
            },
        },

        computed: {
            isFirstStep() {
                return this.step === 1;
            },

            isLastStep() {
                return this.step === this.max;
            },

            nextButton() {
                return this.nextButtons[this.step - 1];
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
        },

        methods: {

            save() {
                this.submit();

                window.location.href = '/user/profile';
            },

            next() {
                Bus.$emit('alertHide');

                if (this.step == this.nextButtons.length) {
                    window.location.href = this.endpoints.profile;
                }

                this.goToStep(this.step + 1);
            },

            submit() {
                Bus.$emit('onboardingSubmit' + this.submitForms[this.step - 1]);

                this.next();
            },

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
        width: 565px;
    }
    button {
        width: 200px;
    }
    @media (max-width: 460px) {
        .modal-footer {
            padding-left: 16px;
            text-align: center;
        }
        button {
            width: 100%;
            margin-bottom: 20px;
        }
    }
    @media (width: 320px) {
        li {
            width: 280px;
        }
    }
    @media (width: 360px) {
        li {
            width: 320px;
        }
    }
    @media (width: 375px) {
        li {
            width: 335px;
        }
    }
    @media (width: 411px) {
        li {
            width: 371px;
        }
    }
    @media (width: 414px) {
        li {
            width: 374px;
        }
    }
    @media (min-width: 768px) {
        .col-md-6, .col-sm-6 {
            flex: 0 0 74%;
            max-width: 74%;
        }
    }
    @media (min-width: 960px), (max-width: 1024) {
        .col-md-6, .col-sm-6 {
            flex: 0 0 59%;
            max-width: 59%;
        }
    }
</style>