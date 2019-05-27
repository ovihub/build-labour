<template>
    <div>
        <form :class="firstCardCls">
            <div class="form-text-header">Company Registration</div>

            <div class="form-group">
                <input id="first_name" type="text" name="first_name" class="form-control" style="padding-left:24px"
                    v-model="input.first_name" placeholder="First Name" required autofocus />

                <span class="err-msg" v-if="errors.first_name">
                    {{ errors.first_name }}
                </span>
            </div>

            <div class="form-group">
                <input id="last_name" type="text" name="last_name" class="form-control" style="padding-left:24px"
                    v-model="input.last_name" placeholder="Last Name" required autofocus />

                <span class="err-msg" v-if="errors.last_name">
                    {{ errors.last_name }}
                </span>
            </div>

            <div class="form-group disp-flex">
                <div class="form-col-1">
                    <img class="form-mobile-icon" src="/img/icons/au.png"
                        srcset="/img/icons/au@2x.png 2x, /img/icons/au@3x.png 3x">
                    
                    <span class="form-col-label">+61</span>
                </div>
                
                <div class="form-col-2">
                    <input id="mobile_number" type="text" name="mobile_number" class="form-control" style="padding-left:24px"
                        v-model="input.mobile_number" placeholder="Mobile Number" required />

                    <span class="err-msg" v-if="errors.mobile_number">
                        {{ errors.mobile_number }}
                    </span>
                </div>
            </div>

            <div class="form-group">
                <input id="email" type="email" name="email" class="form-control" style="padding-left:24px"
                    v-model="input.email" placeholder="Email Address" required />

                <span class="err-msg" v-if="errors.email">
                    {{ errors.email }}
                </span>
            </div>

            <div class="form-group">
                <password-eye ref-name="regTogglePassword"></password-eye>
                
                <input id="password" ref="regTogglePassword" type="password" name="password" class="form-control" 
                    style="padding-left:24px" v-model="input.password" placeholder="Password" required />

                <span class="err-msg" v-if="errors.password">
                    {{ errors.password }}
                </span>
            </div>

            <div class="form-group">
                <password-eye ref-name="regToggleConfirm"></password-eye>

                <input id="password-confirm" ref="regToggleConfirm" type="password" class="form-control"
                    style="padding-left:24px" name="password_confirmation" v-model="input.password_confirmation"
                    placeholder="Confirm Password" required>
            </div>

            <div class="form-group">
                <a class="btn btn-link" v-bind:href="endpoints.login">
                    Back to login
                </a>
                
                <button class="pull-right" type="button" :disabled="disabled" @click="onClickNext(1)">
                    Next
                </button>
            </div>
        </form>

        <form :class="secondCardCls">
            <div class="form-text-header">Company Registration</div>

            <div class="form-group">
                <input id="company_name" type="text" name="company_name" class="form-control" style="padding-left:24px"
                    v-model="input.company_name" placeholder="Company Name" required autofocus />

                <span class="err-msg" v-if="errors.company_name">
                    {{ errors.company_name }}
                </span>
            </div>

            <div class="form-group">
                <input id="sector" type="text" name="sector" class="form-control" style="padding-left:24px"
                    v-model="input.sector" placeholder="Business entity type" required />

                <span class="err-msg" v-if="errors.sector">
                    {{ errors.sector }}
                </span>
            </div>

            <div class="form-group">
                <a class="btn btn-link" href="#" @click="onClickPrevious(2)">
                    Previous
                </a>
                
                <button class="pull-right" type="button" :disabled="disabled" @click="onClickNext(2)">
                    Next
                </button>
            </div>
        </form>

        <form :class="thirdCardCls">
            <div class="form-text-header">Company Registration</div>

            <div class="skill-label">
                What are the secondary functions?
            </div>

            <div class="form-group emp-row row-center"
                :ref="'specItem-' + index" 
                v-for="(spec, index) in input.specialization"
                :key="index">

                <div class="comp-col-left">
                    <input class="form-control" type="text" placeholder="Business entity type"
                        v-model="input.specialization[index]"
                        @keyup="onKeyupSpecialization" />
                </div>

                <div class="comp-col-right">
                    <span @click="removeEntity(index)">
                        <img src="/img/icons/remove.png"
                            srcset="/img/icons/remove@2x.png 2x, /img/icons/remove@3x.png 3x">
                    </span>
                </div>
            </div>

            <center>
                <div class="btn btn-link btn-delete" @click="addNewEntity">
                    Add Another
                </div>
            </center>

            <div class="form-group">
                <a class="btn btn-link" href="#" @click="onClickPrevious(3)">
                    Previous
                </a>
                
                <button class="pull-right" type="button" :disabled="disabled" @click="onClickNext(3)">
                    Next
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    import Api from '@/api';

    export default {

        data() {
            return {
                firstCardCls: '',
                secondCardCls: 'hidden',
                thirdCardCls: 'hidden',
                fourthCardCls: 'hidden',
                disabled: false,
                input: {
                    first_name: '', last_name: '', mobile_number: '', email: '', password: '', password_confirmation: '',
                    company_name: '', sector: '', specialization: []
                },
                errors: {
                    first_name: '', last_name: '', mobile_number: '', email: '', password: '',
                    company_name: '', sector: '',
                },
                endpoints: {
                    login: '/login',
                }
            }
        },

        created() {
            let component = this;

            Bus.$on('regTogglePassword', function(type) {
                component.$refs['regTogglePassword'].type = type;
            });

            Bus.$on('regToggleConfirm', function(type) {
                component.$refs['regToggleConfirm'].type = type;
            });

            this.input.specialization.push('');
        },

        methods: {
            
            onClickPrevious(curPage) {
                switch(curPage) {
                    case 2:
                        this.firstCardCls = '';
                        this.secondCardCls = 'hidden';
                        this.thirdCardCls = 'hidden';
                        this.fourthCardCls = 'hidden';
                        break;
                    
                    case 3:
                        this.secondCardCls = '';
                        this.firstCardCls = 'hidden';
                        this.thirdCardCls = 'hidden';
                        this.fourthCardCls = 'hidden';
                        break;

                    case 4:
                        this.thirdCardCls = '';
                        this.firstCardCls = 'hidden';
                        this.secondCardCls = 'hidden';
                        this.fourthCardCls = 'hidden';
                        break;

                    default:
                        break;
                }
            },

            onClickNext(curPage) {
                console.log(this.input);

                switch(curPage) {
                    case 1:
                        this.firstCardCls = 'hidden';
                        this.secondCardCls = '';
                        break;

                    case 2:
                        this.secondCardCls = 'hidden';
                        this.thirdCardCls = '';
                        break;
                    
                    case 3:
                        this.thirdCardCls = 'hidden';
                        this.fourthCardCls = '';
                        break;

                    default:
                        break;
                }
            },

            onKeyupSpecialization() {
                this.input.specialization = this.input.specialization.filter(r => r!=='');

                if (this.input.specialization.length == 0) {
                    this.input.specialization.push('');
                }
            },

            addNewEntity() {
                this.input.specialization = this.input.specialization.filter(r => r!=='');
                this.input.specialization.push('');
            },

            removeEntity(index) {
                if (this.input.specialization.length > 1) {
                    this.input.specialization.splice(index, 1);
                }
            },
        }
    }
</script>