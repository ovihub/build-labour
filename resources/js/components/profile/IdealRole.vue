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
                                    <label>
                                        {{ formatWhenMonth() }}
                                    </label>
                                </div>
                            </div>

                            <div class="skill-label">
                                Maximum Distance from home
                            </div>
                            <div class="emp-row row-center">
                                <div class="emp-col-left">
                                    <div class="slidecontainer">
                                        <input type="range" min="1" max="500" value="50" class="slider" id="myRange">
                                    </div>
                                </div>
                                <div class="emp-col-right">
                                    <label>
                                        500 km
                                    </label>
                                </div>
                            </div>

                            <div class="skill-label">
                                Would you work/relocate to another state? If Yes, tick states that apply.
                            </div>

                            <div v-for="(state, index) in states" :key="index">
                                <input type="checkbox" id="myCheck" />
                                {{ state }}
                            </div>

                            <div class="skill-label">
                                I have the right to work in Australia
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
                
                <span class="profile-intro" v-if="input.introduction">
                    {{ input.introduction }}
                </span>

                <span class="bl-label-15" v-if="input.when">When</span>
                <span class="bl-label-14">
                    {{ formatWhen() }} ({{ formatWhenMonth() }})
                </span>

                <span class="bl-label-15" v-if="input.max_distance">Maximum Distance from home</span>
                <span class="bl-label-14">
                    {{ input.max_distance }}km
                </span>

                <span class="bl-label-15" v-if="input.state">Willing to relocate to</span>
                <span class="bl-label-14">
                    {{ input.state }}
                </span>

                <span class="bl-label-15" v-if="input.right_to_work">Right to Work</span>
                <span class="bl-label-14">
                    {{ input.right_to_work }}
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                disabled: false,
                states: [
                    'QLD', 'NSW', 'SA', 'VIC', 'WA', 'ACT', 'TAS', 'NT',
                ],
                input: { 
                    introduction: '', when: '', max_distance: '', state: '', right_to_work: '',
                }
            }
        },

        created() {
            let component = this;

            Bus.$on('idealRoleDetails', function(details) {
                if (details) {
                    component.input = details;
                }
            });
        },

        methods: {

            formatWhen() {
                let m = this.input.when;
                
                return (m == 1) ? 'In 1 month' : 'In ' + m + ' months';
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

            submit() {

            },
        }
    }
</script>