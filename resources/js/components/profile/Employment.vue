<template>
    <div class="profile-item-2">
        <div class="profile-content">
            
            <employment-modal></employment-modal>

            <span class="add-icon"
                data-toggle="modal"
                data-backdrop="static"
                data-keyboard="false"
                data-target="#modalEmployment"
                @click="action(-1)">

                <img src="/img/icons/plus.png"
                    srcset="/img/icons/plus@2x.png 2x, /img/icons/plus@3x.png 3x">
            </span>
            
            <div class="profile-title">
                <img src="/img/icons/employmenthistory.png"
                    srcset="/img/icons/employmenthistory@2x.png 2x, /img/icons/employmenthistory@3x.png 3x">
                
                Employment History
            </div>
        
            <ul class="list-main-items" v-if="employments.length > 0">
                <li class="main-items"
                    v-for="(employment, index) in employments"
                    v-bind:key="index">

                    <span class="edit-icon edit-icon-3"
                        data-toggle="modal"
                        data-backdrop="static"
                        data-keyboard="false"
                        data-target="#modalEmployment"
                        @click="action(index)">

                        <img src="/img/icons/editbutton.png"
                            srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
                    </span>
                    <span class="text-icon-2">
                        <img :src="imgSrc" :srcset="imgSrcSet" :ref="'toggleImg-' + index" @click="toggle(index)">
                    </span>
                    <div class="jobads-row mt-3" @click="toggle(index)">
                        <div class="bl-col-1">
                            <img class="bl-image-56" src="/img/logo/1.jpg">
                            <div class="bl-box"></div>
                        </div>
                        <div class="bl-col-2 ml-2">
                            <div class="bl-display">
                                <span class="bl-label-16 bl-ml15" :ref="'empJobRole-' + index">
                                    {{ employment.job_role }}
                                </span>

                                <span class="bl-label-15 bl-ml15 mt-0 pt-0" :ref="'empCompanyName-' + index">
                                    {{ employment.company_name }}
                                </span>
                                
                                <span class="bl-label-14 bl-ml15 mt-0 pt-0" :ref="'empPeriod-' + index">
                                    {{ formatPeriod(employment) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div :class="getCls" :ref="'toggleCls-' + index">

                        <div class="empinfo-row">
                            <img style="margin-top:5px" class="text-icon bl-mt12" src="/img/icons/pinlocation.png"
                                srcset="/img/icons/pinlocation@2x.png 2x, /img/icons/pinlocation@3x.png 3x">
                                
                            <span style="display:inline" class="bl-label-14-style-2" :ref="'empLocation-' + index">
                                {{ employment.location }}
                            </span>
                        </div>

                        <div class="empinfo-row">
                            <img class="text-icon" src="/img/icons/dollarsign.png"
                                srcset="/img/icons/dollarsign@2x.png 2x, /img/icons/dollarsign@3x.png 3x">
                            <span style="display:inline" class="bl-label-14-style-2" :ref="'empProjectSize-' + index">
                                {{ employment.project_size }}
                            </span>
                        </div>
                        
                        <div class="empinfo-row" v-if="employment.responsibilities.length != 0">
                            <img class="text-icon" src="/img/icons/responsibilities.png"
                                    srcset="/img/icons/responsibilities@2x.png 2x, /img/icons/responsibilities@3x.png 3x">
                            <span style="display:inline" class="bl-label-14-style-2">
                                Responsibilities:
                            </span>
                        </div>

                        <div class="bl-label-15" v-if="employment.responsibilities.length != 0">
                            <ul class="list-items">
                                <div v-for="(res, idx) in employment.responsibilities" v-bind:key="idx">
                                    <li :ref="'empRespItem-' + index + '-' + idx">{{ res }}</li>
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
                expanded: [],
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

            Bus.$on('updateEmployment', function(index, details) {
                if (index == -1) {
                    component.employments.push(details);
                
                } else {
                    component.employments[index] = details;
                    
                    component.$refs['empJobRole-' + index][0].textContent = details.job_role;
                    component.$refs['empCompanyName-' + index][0].textContent = details.company_name;
                    component.$refs['empPeriod-' + index][0].textContent = component.formatPeriod(details);
                    component.$refs['empLocation-' + index][0].textContent = details.location;
                    component.$refs['empProjectSize-' + index][0].textContent = details.project_size;

                    for (let i = 0; i < details.responsibilities.length; i++) {
                        if (component.$refs['empRespItem-' + index + '-' + i] !== undefined) {
                            component.$refs['empRespItem-' + index + '-' + i][0].textContent = details.responsibilities[i];
                        
                        } else {
                            window.location.href = '/user/profile';
                        }
                    }
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

            formatPeriod(emp) {
                let endDate = (emp.end_month && emp.end_year) ?
                              new Date(emp.end_year, emp.end_month-1, 1) : new Date();

                return Utils.formatPeriod(new Date(emp.start_year, emp.start_month-1, 1), endDate);
            },

            action(index) {
                Bus.$emit('showEmployment', index, index != -1 ?  this.employments[index] : null);
            },

        }
    }
</script>