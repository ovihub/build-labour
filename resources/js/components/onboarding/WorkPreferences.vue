<template>
    <form class="modal-form" method="POST" @submit.prevent="submit">
        <div class="skill-label">
            How far are you willing to travel from home for employment?
        </div>
        <div class="emp-row-2 row-center">
            <div class="emp-col-left-2">
                <div class="bl-slider">
                    <input type="range" min="0" max="500" step="5" class="slider" :style="maxDistance" v-model="input.max_distance">
                </div>
            </div>
            <div class="emp-col-right-2">
                <label>
                    {{ input.max_distance }} km
                </label>
            </div>
        </div>

        <div class="skill-label">
            Would you work/relocate to another state? If Yes, tick states that apply.
        </div>
        <div class="skill-label-2">
            Relocation may be at own expense.
        </div>

        <div class="bl-inline" v-for="(state, index) in states" :key="index">
            <input class="styled-checkbox" :id="'styled-checkbox-'+index" type="checkbox"
                v-bind:value="state" v-model="input.selected" />
            <label :for="'styled-checkbox-'+index">{{ state }}</label>
        </div>

        <div class="skill-label">
            What is your ideal next role?
        </div>
        <textarea rows="3" ref="idealIntro" class="form-control" style="overflow:hidden"
            placeholder="Example: My ideal next role would be as a qualified plumber working on high-end residential jobs with an awesome team."
            @keyup="textAreaAdjust('idealIntro')" v-model="input.introduction"></textarea>
        
        <div class="me-label">
            Ideally this would happen in:
        </div>
        <div class="me-row">
            <div class="role-col-left">
                <select v-model="input.when" style="background-position:210px">
                    <option key="1" value="3">3 months</option>
                    <option key="2" value="6">6 months</option>
                    <option key="3" value="9">9 months</option>
                    <option key="4" value="12">12 months</option>
                    <option key="5" value="Other">Rather not say</option>
                </select>
                <span class="err-msg" v-if="errors.when">
                    {{ errors.when }}
                </span>
            </div>
        </div>

        <div class="bl-btn-group">
            <div class="btn btn-link btn-delete" @click="submit">
                Save and Finish later
            </div>

            <button type="button" @click="next">
                To Work Information
            </button>
        </div>
    </form>
</template>

<script>
    import Api from '@/api';

    export default {

        data() {
            return {
                states: [
                    'QLD', 'NSW', 'SA', 'VIC', 'WA', 'ACT', 'TAS', 'NT',
                ],
                input: {
                    max_distance: '', selected: [], introduction: '', when: '',
                },
                errors: {
                    max_distance: '', selected: '', introduction: '', when: '',
                },
            }
        },

        created() {
            let component = this;

            Bus.$on('', function() {
            
            });
        },

        computed: {
            maxDistance() {
                return {
                    background: `linear-gradient(to right, #ff7705 ${(this.input.max_distance / 500) * 100}%, 
                                #ff7705 ${(this.input.max_distance / 500) * 100}%, #fff 00%, #fff 100%)`
                }
            },
        },

        methods: {

            textAreaAdjust(refName) {
                Utils.textAreaAdjust(this.$refs[refName]);
            },

            next() {
                Bus.$emit('onboardingNext', 7);
            },

            async submit() {

            },
        }
    }
</script>

<style scoped>
    button {
        width: 200px;
        margin-left: 130px;
    }
    .btn-link {
        padding-top: 0px;
    }
</style>