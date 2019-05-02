<template>
    <div class="profile-item-1">
        <div class="profile-content">
            <div class="profile-content-p20 pt-3 pb-4">
                
                <main-modal id="modalIdealRole">
            
                    <template slot="custom-modal-title">
                        <h4 class="modal-title">Edit Ideal Next Role</h4>
                        <div class="close" data-dismiss="modal" @click="close">&times;</div>
                    </template>

                    <template slot="custom-modal-content">
                        <form class="modal-form" method="POST" @submit.prevent="submit">
                            <div class="skill-label">
                                What is your ideal next role?
                            </div>
                            
                            <textarea rows="3" ref="idealIntro" class="form-control" style="overflow:hidden"
                                placeholder="Example: My ideal next role would be as a qualified plumber working on high-end residential jobs with an awesome team."
                                @keyup="textAreaAdjust" v-model="input.introduction"></textarea>
                            
                            <div class="skill-label" style="margin-bottom:0">
                                When could this happen?
                            </div>
                            <div class="emp-row row-center" style="margin-top:17px">
                                <div class="emp-col-left">
                                    <input class="form-control" type="text" placeholder="Enter number of Months" v-model="input.when" />
                                </div>
                                <div class="emp-col-right">
                                    <label style="margin-bottom:0">{{ formatWhenMonth(input.when) }}</label>
                                </div>
                            </div>

                            <div class="skill-label">
                                Maximum Distance from home
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
                                I have the right to work in Australia
                            </div>
                            <div class="skill-label-3">
                                See legal requirements
                            </div>
                            <div class="bl-inline">
                                <input class="styled-checkbox-round" id="styled-checkbox-yes" type="checkbox"
                                    ref="styled-checkbox-1"
                                    @change="formatRightToWork(1)" />
                                <label for="styled-checkbox-yes">Yes</label>
                                
                                <input class="styled-checkbox-round" id="styled-checkbox-no" type="checkbox"
                                    ref="styled-checkbox-0"
                                    @change="formatRightToWork(0)" />
                                <label for="styled-checkbox-no">No</label>
                            </div>
                        </form>
                    </template>

                    <template slot="custom-modal-footer">
                        <button class="mt-0" type="submit" @click="submit" :disabled="disabled">Save Changes</button>
                    </template>

                </main-modal>

                <span class="edit-icon" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modalIdealRole">
                    <img src="/img/icons/editbutton.png"
                        srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
                </span>

                <div class="profile-title">Your Ideal Next Role</div>        
                <span class="bl-label-14">(Visible only to you)</span>
                
                <div v-if="introduction">
                    <span class="profile-intro">
                        {{ introduction }}
                    </span>
                </div>

                <div v-if="when">
                    <span class="bl-label-15">When</span>
                    <span class="bl-label-14">
                        {{ formatWhen(when) }} ({{ formatWhenMonth(when) }})
                    </span>
                </div>

                <div v-if="max_distance && max_distance != 0">
                    <span class="bl-label-15">Maximum Distance from home</span>
                    <span class="bl-label-14">
                        {{ max_distance }}km
                    </span>
                </div>

                <div v-if="state">
                    <span class="bl-label-15">Willing to relocate to</span>
                    <span v-for="(s, index) in selected" :key="index" class="bl-label-14">
                        {{ s }}
                    </span>
                </div>

                <div v-if="right_to_work">
                    <span class="bl-label-15">Right to Work</span>
                    <span class="bl-label-14">
                        {{ right_to_work }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                disabled: false,
                introduction: '',
                when: '',
                max_distance: '',
                state: '',
                right_to_work: '',
                selected: [],
                states: [
                    'QLD', 'NSW', 'SA', 'VIC', 'WA', 'ACT', 'TAS', 'NT',
                ],
                input: { 
                    introduction: '', when: '', max_distance: '', state: '', right_to_work: '', selected: [],
                },
                endpoints: {
                    save: '/api/v1/worker/next-role',
                },
            }
        },

        created() {
            let component = this;
            
            Bus.$on('idealRoleDetails', function(details) {
                if (details) {
                    component.setValues(component, details);
                    component.setValues(component.input, details);
                }
            });
        },

        computed: {
            maxDistance() {
                return {
                    background: `linear-gradient(to right, #ff7705 ${(this.input.max_distance / 500) * 100}%, #ff7705 ${(this.input.max_distance / 500) * 100}%, #fff 00%, #fff 100%)`
                }
            },
        },

        methods: {

            setValues(val, details) {
                val.introduction = details.introduction;
                val.when = details.when;
                val.max_distance = details.max_distance && details.max_distance != '' ? details.max_distance : 0;
                val.state = details.state;
                val.selected = val.state ? val.state.split(',') : [];

                if (! Utils.isNullOrEmpty(details.right_to_work)) {
                    val.right_to_work = details.right_to_work == 1 ? 
                        'Yes, I have right to work in Australia' : 'No, I don\'t have right to work in Australia';
                    
                    this.formatRightToWork(details.right_to_work);
                
                } else {
                    val.right_to_work = null;
                }
            },

            formatWhen(m) {
                return (m == 1) ? 'In 1 month' : 'In ' + m + ' months';
            },

            formatWhenMonth(m) {
                if (m && m != '') {
                    let d = new Date();
                    d.setMonth(d.getMonth() + parseInt(m));

                    return Utils.getMonth(d.getMonth()) + ' ' + d.getFullYear();
                }
            },

            formatRightToWork(index) {
                if (index == 1) {
                    this.$refs['styled-checkbox-1'].checked = true;
                    this.$refs['styled-checkbox-0'].checked = false;
                    this.input.right_to_work = 1;

                } else {
                    this.$refs['styled-checkbox-1'].checked = false;
                    this.$refs['styled-checkbox-0'].checked = true;
                    this.input.right_to_work = 0;
                }
            },

            close() {
                this.setValues(this.input, this);
            },
            
            textAreaAdjust() {
                let o = this.$refs['idealIntro'];
                o.style.height = '1px';
                o.style.height = (2 + o.scrollHeight) + 'px';
            },

            async submit(id) {
                let component = this;

                component.disabled = true;
                component.input.state = component.input.selected.toString();
                
                await axios.post(component.endpoints.save, component.$data.input, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        let data = response.data;
                        
                        $('#modalIdealRole').modal('hide');
                        
                        component.setValues(component, data.data.worker_detail);
                    })
                    .catch(function(error) {

                        Utils.handleError(error);
                    });
                
                component.disabled = false;
            },
        }
    }
</script>