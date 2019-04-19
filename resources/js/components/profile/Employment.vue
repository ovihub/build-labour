<template>
    <div class="profile-item-2">
        <div class="profile-content">

            <record-form title="AddEmployment" :record="input" save-endpoint="/api/v1/work/experience"></record-form>
            
            <span class="edit-icon" data-toggle="modal" data-target="#modalAddEmployment">
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
                            Richmond, Victoria, Australia
                        </span>
                        <span class="bl-label-14-style-2 bl-mt13">
                            <img class="text-icon" src="/img/icons/dollarsign.png"
                                srcset="/img/icons/dollarsign@2x.png 2x, /img/icons/dollarsign@3x.png 3x">
                            ${{ employment.salary }}
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
                expanded: [],
                input: {
                    job_role: '', company_name: '', salary: '', start_date: '', end_date: '',
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

            Bus.$on('AddEmployment', function(details) {
                component.employments.push(details);
                
                component.expanded[component.employments.length-1] = false;
            });
        },

        methods: {
            toggle(index) {
                if (this.expanded[index] === true) {
                    this.$refs['boxCls-' + index][0].className = 'bl-box-2 hidden';
                    this.$refs['toggleCls-' + index][0].className = 'responsibilities hidden';
                    this.$refs['toggleImg-' + index][0].src = '/img/icons/expand.png';
                    this.$refs['toggleImg-' + index][0].srcset = '/img/icons/expand@2x.png 2x, /img/icons/expand@3x.png 3x';
                
                } else {
                    this.$refs['boxCls-' + index][0].className = 'bl-box-2';
                    this.$refs['toggleCls-' + index][0].className = 'responsibilities';
                    this.$refs['toggleImg-' + index][0].src = '/img/icons/collapse.png';
                    this.$refs['toggleImg-' + index][0].srcset = '/img/icons/collapse@2x.png 2x, /img/icons/collapse@3x.png 3x';
                }

                this.expanded[index] = ! this.expanded[index];
            },

            getPeriod(start, end) {
                let diff = (end === null) ? new Date() - new Date(start) : new Date(end) - new Date(start),
                    offset = new Date().getTimezoneOffset()/60,
                    hours = Math.abs(diff / 36e5) + offset,
                    years, months, days, period = '';
                
                hours = Math.floor(hours);
                days = Math.floor(hours/24);

                if (days > 29) {
                    months = Math.floor(days/30);

                    if (months > 11) {
                        years = Math.floor(months/12);
                        period = (years == 1) ? '1 year' : years + ' years';

                        months = months - (years * 12);
                        period += (months == 1) ? ' and 1 month' : '';
                        period += (months != 1 && months > 0) ? ' and ' + months + ' months' : '';
                    
                    } else {
                        period += (months == 1) ? '1 month' : months + ' months';
                    }

                } else {
                    period = '1 month';
                }

                return period;
            },
        }
    }
</script>