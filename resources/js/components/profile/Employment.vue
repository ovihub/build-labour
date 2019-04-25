<template>
    <div class="profile-item-2">
        <div class="profile-content">

            <!-- <record-form title="AddEmployment" :record="input" save-endpoint="/api/v1/work/experience"></record-form> -->
            <main-modal id="modalEmployment">
		
                <template slot="custom-modal-title">
                    <h4 class="modal-title">Edit Employment History</h4>

                    <div class="close" data-dismiss="modal">&times;</div>
                </template>

                <template slot="custom-modal-content">
                    <form class="modal-form" method="POST" @submit.prevent="submitForm">
                        <div class="emp-label">Job Details</div>
                        
                        <div class="form-group">
                            <div class="emp-row">
                                <div class="modal-form-label">Your Role</div>
                                <input class="form-control" type="text" v-model="input.job_role"/>
                            </div>

                            <div class="emp-row">
                                <div class="modal-form-label">Company/Project Name</div>
                                <input class="form-control" type="text" v-model="input.company_name" />
                            </div>

                            <div class="emp-row">
                                <div class="modal-form-label">Location</div>
                                <input class="form-control" type="text" />
                            </div>

                            <div class="emp-row">
                                <div class="modal-form-label">Size of the Project</div>
                                <input class="form-control" type="text" v-model="input.project_size"/>
                            </div>
                        </div>

                        <div class="emp-label">Duration of Employment</div>
                        <div class="emp-row">
                            <div class="emp-col">
                                <div class="emp-form-label">Start Month</div>
                                <input class="form-control" type="text" v-model="input.start_date" />
                            </div>
                            <div class="emp-col">
                                <div class="emp-form-label">Start Year</div>
                                <input class="form-control" type="text" v-model="input.start_date" />
                            </div>
                        </div>
                         <div class="emp-row">
                            <div class="emp-col">
                                <div class="emp-form-label">Start Month</div>
                                <input class="form-control" type="text" v-model="input.end_date" />
                            </div>
                            <div class="emp-col">
                                <div class="emp-form-label">Start Year</div>
                                <input class="form-control" type="text" v-model="input.end_date" />
                            </div>
                        </div>

                        <div class="emp-label">Responsibilities</div>
                        <input class="form-control" placeholder="Add Another Responsibility" type="text" />
                    </form>
                </template>

                <template slot="custom-modal-footer">
                    <button class="mt-0" type="submit" @click="submitForm" :disabled="disabled">Save Changes</button>
                </template>

            </main-modal>
            
            <span class="edit-icon" data-toggle="modal" data-target="#modalEmployment">
                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span>
            
            <div class="profile-title">
                <img src="/img/icons/employmenthistory.png"
                    srcset="/img/icons/employmenthistory@2x.png 2x, /img/icons/employmenthistory@3x.png 3x">
                
                Employment History
            </div>
        
            <ul class="list-main-items" v-if="employments.length > 0">
                <li class="main-items" v-for="(employment, index) in employments" v-bind:key="index">
                    <span class="text-icon-2">
                        <img :src="imgSrc" :srcset="imgSrcSet" :ref="'toggleImg-' + index" @click="toggle(index)">
                    </span>
                    <div class="row mt-3" @click="toggle(index)">
                        <div class="bl-col-1">
                            <img class="bl-image-56" src="/img/logo/1.jpg">
                            <div class="bl-box"></div>
                        </div>
                        <div class="bl-col-2 ml-2">
                            <div class="bl-display">
                                <span class="bl-label-16 bl-ml15">
                                    {{ employment.job_role }}
                                </span>
                                <span class="bl-label-15 bl-ml15 mt-0 pt-0">
                                    {{ employment.company_name }}
                                </span>
                                <span class="bl-label-14 bl-ml15 mt-0 pt-0">
                                    {{ getPeriod(employment.start_date, employment.end_date) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div :class="getCls" :ref="'toggleCls-' + index">
                        <span class="bl-label-14-style-2 bl-mt13">
                            <img class="text-icon" src="/img/icons/pinlocation.png"
                                srcset="/img/icons/pinlocation@2x.png 2x, /img/icons/pinlocation@3x.png 3x">
                            {{ employment.location }}
                        </span>
                        <span class="bl-label-14-style-2 bl-mt13">
                            <img class="text-icon" src="/img/icons/dollarsign.png"
                                srcset="/img/icons/dollarsign@2x.png 2x, /img/icons/dollarsign@3x.png 3x">
                            ${{ employment.project_size }}
                        </span>
                        <span class="bl-label-14-style-2 bl-mt13">
                            <img class="text-icon" src="/img/icons/responsibilities.png"
                                srcset="/img/icons/responsibilities@2x.png 2x, /img/icons/responsibilities@3x.png 3x">
                            Responsibilities:
                        </span>
                        <div class="bl-label-15">
                            <ul class="list-items">
                                <div v-for="(responsibility, idx) in employment.responsibilities_detail" v-bind:key="idx">
                                    <li>{{ responsibility }}</li>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <div :class="getBox" :ref="'boxCls-' + index"></div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                disabled: false,
                is_empty: false,
                expanded: [],
                input: {
                    job_role: '', company_name: '', location: '', project_size: '', start_date: '', end_date: '',
                },
                employments: [],
                getBox: 'bl-box-2 hidden',
                getCls: 'responsibilities hidden',
                imgSrc: '/img/icons/expand.png',
                imgSrcSet: '/img/icons/expand@2x.png 2x, /img/icons/expand@3x.png 3x',
            }
        },

        created() {
            let component = this;

            Bus.$on('employmentDetails', function(detailsArray) {
                component.employments = detailsArray;

                for (let i = 0; i < component.employments.length; i++) {
                    component.expanded[i] = false;
                }
            });
        },

        methods: {
            toggle(index) {

                this.expanded[index] === true ? this.collapse(index) : this.expand(index);

                this.input = this.employments[index];
            },

            collapse(index) {
                this.$refs['boxCls-' + index][0].className = 'bl-box-2 hidden';
                this.$refs['toggleCls-' + index][0].className = 'responsibilities hidden';
                this.$refs['toggleImg-' + index][0].src = '/img/icons/expand.png';
                this.$refs['toggleImg-' + index][0].srcset = '/img/icons/expand@2x.png 2x, /img/icons/expand@3x.png 3x';

                this.expanded[index] = false;
            },

            expand(index) {
                this.$refs['boxCls-' + index][0].className = 'bl-box-2';
                this.$refs['toggleCls-' + index][0].className = 'responsibilities';
                this.$refs['toggleImg-' + index][0].src = '/img/icons/collapse.png';
                this.$refs['toggleImg-' + index][0].srcset = '/img/icons/collapse@2x.png 2x, /img/icons/collapse@3x.png 3x';

                this.expanded[index] = true;
            },

            collapseAll() {
                for (let index = 0; index < this.employments.length; index++) {
                    this.collapse(index);
                }
            },

            getPeriod(start, end) {
                return Utils.getPeriod(start, end);
            },

            submitForm() {

            },
        }
    }
</script>