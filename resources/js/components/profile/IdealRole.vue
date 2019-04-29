<template>
    <div class="profile-item-1">
        <div class="profile-content">
            <div class="profile-content-p20 pt-3 pb-4">
                
                <main-modal id="modalIdealRole">
            
                    <template slot="custom-modal-title">
                        <h4 class="modal-title">Edit Ideal Next Role</h4>
                        <div class="close" data-dismiss="modal">&times;</div>
                    </template>

                    <template slot="custom-modal-content">
                        <form class="modal-form" method="POST" @submit.prevent="submit">
                            <div class="skill-label">
                                What is your ideal next role?
                            </div>
                            
                            <textarea ref="idealIntro" class="form-control" style="overflow:hidden"
                                placeholder="Example: My ideal next role would be as a qualified plumber working on high-end residential jobs with an awesome team."
                                @keyup="textAreaAdjust" v-model="input.introduction"></textarea>
                            
                            <div class="skill-label">
                                When could this happen?
                            </div>
                            <div class="emp-row row-center">
                                <div class="emp-col-left">
                                    <input class="form-control" type="text" placeholder="Enter number of Months" v-model="input.when" />
                                </div>
                                <div class="emp-col-right">
                                    <label style="margin-bottom:0">{{ formatWhenMonth() }}</label>
                                </div>
                            </div>

                            <div class="skill-label">
                                Maximum Distance from home
                            </div>
                            <div class="emp-row-2 row-center">
                                <div class="emp-col-left-2">
                                    <input type="range" min="0" max="500" step="50" class="slider" v-model="input.max_distance">
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
                                    v-bind:value="state" v-model="selected" />
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
                                    v-model="input.nrole_right_to_work_au" />
                                <label for="styled-checkbox-yes">Yes</label>
                                <input class="styled-checkbox-round" id="styled-checkbox-no" type="checkbox"
                                    v-model="selected" />
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
                
                <div v-if="input.introduction">
                    <span class="profile-intro">
                        {{ input.introduction }}
                    </span>
                </div>

                <div v-if="input.when">
                    <span class="bl-label-15">When</span>
                    <span class="bl-label-14" v-if="input.when">
                        {{ formatWhen() }} ({{ formatWhenMonth() }})
                    </span>
                </div>

                <div v-if="input.max_distance">
                    <span class="bl-label-15">Maximum Distance from home</span>
                    <span class="bl-label-14">
                        {{ input.max_distance }}km
                    </span>
                </div>

                <div v-if="input.state">
                    <span class="bl-label-15">Willing to relocate to</span>
                    <span v-for="(state, index) in selected" :key="index" class="bl-label-14">
                        {{ state }}
                    </span>
                </div>

                <div v-if="input.right_to_work">
                    <span class="bl-label-15">Right to Work</span>
                    <span class="bl-label-14">
                        {{ input.right_to_work }}
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
                selected: [],
                states: [
                    'QLD', 'NSW', 'SA', 'VIC', 'WA', 'ACT', 'TAS', 'NT',
                ],
                input: { 
                    introduction: '', when: '', max_distance: '', state: '', right_to_work: '',
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
                    component.input = details;
                    
                    if (details.state) {
                        component.selected = details.state.split(',');
                    }
                }
            });
        },

        methods: {

            formatWhen() {
                return (this.input.when == 1) ? 'In 1 month' : 'In ' + this.input.when + ' months';
            },

            formatWhenMonth() {
                let m = this.input.when;
                let d = new Date();

                d.setMonth(d.getMonth() + m);

                return Utils.getMonth(d.getMonth()) + ' ' + d.getFullYear();
            },

            close() {
                
            },
            
            textAreaAdjust() {
                let o = this.$refs['idealIntro'];
                o.style.height = (o.scrollHeight) + 'px';
            },

            async submit(id) {
                let component = this;

                component.disabled = true;
                component.input.state = component.selected.toString();
                
                await axios.post(this.endpoints.save, this.input, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        let data = response.data;
                        
                        $('#modalIdealRole').modal('hide');
                    })
                    .catch(function(error) {
                        console.log(error)
                        // if (error.response) {
                        //     let data = error.response.data;

						// 	for (let key in data.errors) {
						// 		component.errors[key] = data.errors[key] ? data.errors[key][0] : '';
                        //     }
                        // }

                        // Utils.handleError(error);
                    });
                
                component.disabled = false;
            },
        }
    }
</script>