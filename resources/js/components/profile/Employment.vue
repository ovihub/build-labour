<template>
    <div class="profile-item-2">
        <div class="profile-content">

            <main-modal id="modalAddEmployment">
		
                <template slot="custom-modal-title">
                    <h4 class="modal-title">Add Employment</h4>
                    <div class="close" data-dismiss="modal" @click="close">&times;</div>
                </template>

                <template slot="custom-modal-content">
                    <form class="modal-form" method="POST" @submit.prevent="submit">
                        <div class="emp-label">Job Details</div>
                        
                        <div class="form-group">
                            <div class="emp-row">
                                <div class="modal-form-label">Your Role</div>
                                <input class="form-control" type="text" v-model="input_add.job_role"/>
                                <span class="err-msg" v-if="errors.job_role">
                                    {{ errors.job_role }}
                                </span>
                            </div>

                            <div class="emp-row">
                                <div class="modal-form-label">Company/Project Name</div>
                                <input class="form-control" type="text" v-model="input_add.company_name" />
                                <span class="err-msg" v-if="errors.company_name">
                                    {{ errors.company_name }}
                                </span>
                            </div>

                            <div class="emp-row">
                                <div class="modal-form-label">Location</div>
                                <input class="form-control" type="text" v-model="input_add.location" />
                                <span class="err-msg" v-if="errors.location">
                                    {{ errors.location }}
                                </span>
                            </div>

                            <div class="emp-row">
                                <div class="modal-form-label">Size of the Project</div>
                                <input class="form-control" type="text" placeholder="e.g. $1,000.00 | $1,000,000 | $100000 | 10,000.21" v-model="input_add.project_size"/>
                                <span class="err-msg" v-if="errors.project_size">
                                    {{ errors.project_size }}
                                </span>
                            </div>
                        </div>

                        <div class="emp-label">Duration of Employment</div>
                        <div class="emp-row">
                            <div class="emp-col-left">
                                <div class="emp-form-label">Start Month</div>
                                <select v-model="input_add.start_month">
                                    <option v-for="month in months" :key="month.id" v-bind:value="month.id">{{ month.name }}</option>
                                </select>
                                <span class="err-msg" v-if="errors.start_month">
                                    {{ errors.start_month }}
                                </span>
                            </div>
                            <div class="emp-col-right">
                                <div class="emp-form-label">Start Year</div>
                                <select v-model="input_add.start_year">
                                    <option v-for="(year, index) in years" :key="index" v-bind:value="year">{{ year }}</option>
                                </select>
                                <span class="err-msg" v-if="errors.start_year">
                                    {{ errors.start_year }}
                                </span>
                            </div>
                        </div>
                         <div class="emp-row">
                            <div class="emp-col-left">
                                <div class="emp-form-label">End Month</div>
                                <select v-model="input_add.end_month">
                                    <option v-for="month in months" :key="month.id" v-bind:value="month.id">{{ month.name }}</option>
                                </select>
                                <span class="err-msg" v-if="errors.end_month">
                                    {{ errors.end_month }}
                                </span>
                            </div>
                            <div class="emp-col-right">
                                <div class="emp-form-label">End Year</div>
                                <select v-model="input_add.end_year">
                                    <option v-for="(year, index) in years" :key="index" v-bind:value="year">{{ year }}</option>
                                </select>
                                <span class="err-msg" v-if="errors.end_year">
                                    {{ errors.end_year }}
                                </span>
                            </div>
                        </div>

                        <div class="emp-label" style="margin-bottom:17px">Responsibilities</div>
                        <textarea rows="1" ref="respItem--1" class="form-control" style="overflow:hidden"
                                placeholder="Add Another Responsibility"
                                @keyup="textAreaAdjust(-1)"></textarea>
                    </form>
                </template>

                <template slot="custom-modal-footer">
                    <button class="mt-0" type="submit" @click="submit(0)" :disabled="disabled">Save Changes</button>
                </template>

            </main-modal>

            <main-modal id="modalEmployment">
		
                <template slot="custom-modal-title">
                    <h4 class="modal-title">Edit Employment History</h4>
                    <div class="close" data-dismiss="modal" @click="close">&times;</div>
                </template>

                <template slot="custom-modal-content">
                    <form class="modal-form" method="POST" @submit.prevent="submit">
                        <div class="emp-label">Job Details</div>
                        
                        <div class="form-group">
                            <div class="emp-row">
                                <div class="modal-form-label">Your Role</div>
                                <input class="form-control" type="text" v-model="input.job_role"/>
                                <span class="err-msg" v-if="errors.job_role">
                                    {{ errors.job_role }}
                                </span>
                            </div>

                            <div class="emp-row">
                                <div class="modal-form-label">Company/Project Name</div>
                                <input class="form-control" type="text" v-model="input.company_name" />
                                <span class="err-msg" v-if="errors.company_name">
                                    {{ errors.company_name }}
                                </span>
                            </div>

                            <div class="emp-row">
                                <div class="modal-form-label">Location</div>
                                <input class="form-control" type="text" v-model="input.location" />
                                <span class="err-msg" v-if="errors.location">
                                    {{ errors.location }}
                                </span>
                            </div>

                            <div class="emp-row">
                                <div class="modal-form-label">Size of the Project</div>
                                <input class="form-control" type="text" placeholder="e.g. $1,000.00 | $1,000,000 | $100000 | 10,000.21" v-model="input.project_size"/>
                                <span class="err-msg" v-if="errors.project_size">
                                    {{ errors.project_size }}
                                </span>
                            </div>
                        </div>

                        <div class="emp-label">Duration of Employment</div>
                        <div class="emp-row">
                            <div class="emp-col-left">
                                <div class="emp-form-label">Start Month</div>
                                <select v-model="input.start_month">
                                    <option v-for="month in months" :key="month.id" v-bind:value="month.id">{{ month.name }}</option>
                                </select>
                                <span class="err-msg" v-if="errors.start_month">
                                    {{ errors.start_month }}
                                </span>
                            </div>
                            <div class="emp-col-right">
                                <div class="emp-form-label">Start Year</div>
                                <select v-model="input.start_year">
                                    <option v-for="(year, index) in years" :key="index" v-bind:value="year">{{ year }}</option>
                                </select>
                                <span class="err-msg" v-if="errors.start_year">
                                    {{ errors.start_year }}
                                </span>
                            </div>
                        </div>
                         <div class="emp-row">
                            <div class="emp-col-left">
                                <div class="emp-form-label">End Month</div>
                                <select v-model="input.end_month">
                                    <option v-for="month in months" :key="month.id" v-bind:value="month.id">{{ month.name }}</option>
                                </select>
                                <span class="err-msg" v-if="errors.end_month">
                                    {{ errors.end_month }}
                                </span>
                            </div>
                            <div class="emp-col-right">
                                <div class="emp-form-label">End Year</div>
                                <select v-model="input.end_year">
                                    <option v-for="(year, index) in years" :key="index" v-bind:value="year">{{ year }}</option>
                                </select>
                                <span class="err-msg" v-if="errors.end_year">
                                    {{ errors.end_year }}
                                </span>
                            </div>
                        </div>

                        <div class="emp-label" style="margin-bottom:17px">Responsibilities</div>
                        <div v-for="(res, index) in input.responsibilities" v-bind:key="index">
                            <textarea :ref="'respItem-' + index" class="form-control" style="overflow:hidden"
                                @focus="textAreaAdjust(index)" @keyup="textAreaAdjust(index)" >{{ res }}</textarea>
                        </div>


                        <textarea rows="1" ref="respItem--1" class="form-control" style="overflow:hidden"
                                placeholder="Add Another Responsibility"
                                @keyup="textAreaAdjust(-1)"></textarea>
                    </form>
                </template>

                <template slot="custom-modal-footer">
                    <button class="mt-0" type="submit" @click="submit(1)" :disabled="disabled">Save Changes</button>
                </template>

            </main-modal>
            
            <span class="add-icon" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modalAddEmployment" @click="add">
                <img src="/img/icons/plus.png"
                    srcset="/img/icons/plus@2x.png 2x, /img/icons/plus@3x.png 3x">
            </span>
            
            <div class="profile-title">
                <img src="/img/icons/employmenthistory.png"
                    srcset="/img/icons/employmenthistory@2x.png 2x, /img/icons/employmenthistory@3x.png 3x">
                
                Employment History
            </div>
        
            <ul class="list-main-items" v-if="employments.length > 0">
                <li class="main-items" v-for="(employment, index) in employments" v-bind:key="index">
                    <span class="edit-icon" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modalEmployment" @click="edit(index)">
                        <img src="/img/icons/editbutton.png"
                            srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
                    </span>
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
                                    {{ getPeriod(employment) }}
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
                            {{ employment.project_size }}
                        </span>
                        <span class="bl-label-14-style-2 bl-mt13" v-if="employment.responsibilities.length != 0">
                            <img class="text-icon" src="/img/icons/responsibilities.png"
                                srcset="/img/icons/responsibilities@2x.png 2x, /img/icons/responsibilities@3x.png 3x">
                            Responsibilities:
                        </span>
                        <div class="bl-label-15" v-if="employment.responsibilities.length != 0">
                            <ul class="list-items">
                                <div v-for="(res, idx) in employment.responsibilities" v-bind:key="idx">
                                    <li>{{ res }}</li>
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
                months: Utils.getMonths(),
                years: Utils.getYears(),
                current: -1,
                expanded: [],
                employments: [],
                input_add: {
                    job_role: '', company_name: '', location: '', project_size: '',
                    start_month: '', start_year: '', end_month: '', end_year: '', responsibilities: [],
                },
                input: {
                    id: '', job_role: '', company_name: '', location: '', project_size: '',
                    start_month: '', start_year: '', end_month: '', end_year: '', responsibilities: [],
                },
                errors: {
                    job_role: '', company_name: '', location: '', project_size: '',
                    start_month: '', start_year: '', end_month: '', end_year: '', responsibilities: [],
                },
                endpoints: {
                    save: '/api/v1/work/experience',
                },
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

            close() {
                Utils.setObjectValues(this.errors, '');
            },

            add() {
                Utils.setObjectValues(this.input_add, '');
            },

            edit(index) {
                this.current = index;
                this.input = this.employments[index];
            },

            getPeriod(emp) {
                return Utils.getPeriod(new Date(emp.start_year, emp.start_month-1, 1),
                                       new Date(emp.end_year, emp.end_month-1, 1));
            },

            textAreaAdjust(index) {
                let o = index == -1 ? this.$refs['respItem-' + index] : this.$refs['respItem-' + index][0];
                o.style.height = (o.scrollHeight) + 'px';
            },

            async submit(id) {
                let saveEndpoint = id == 0 ? this.endpoints.save : this.endpoints.save + '/' + this.input.id;
                let saveInput = id == 0 ? this.input_add : this.input;
                let component = this;

				Utils.setObjectValues(component.errors, '');
                component.disabled = true;
                
                for (let i = 0; i < this.input.responsibilities.length; i++) {
                    this.input.responsibilities[i] = this.$refs['respItem-' + i][0].value;
                }

                await axios.post(saveEndpoint, saveInput, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        let data = response.data;
						
                        $('#modalEmployment').modal('hide');
                        $('#modalAddEmployment').modal('hide');

                        id == 0 ?
                            component.employments.push(data.data.work_experience) : 
                            component.employments[component.current] = data.data.work_experience;
                    })
                    .catch(function(error) {
                        if (error.response) {
                            let data = error.response.data;

							for (let key in data.errors) {
								component.errors[key] = data.errors[key] ? data.errors[key][0] : '';
                            }
                        }

                        Utils.handleError(error);
                    });
                
                component.disabled = false;
            },
        }
    }
</script>