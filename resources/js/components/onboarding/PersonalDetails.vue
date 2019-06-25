<template>
    <form class="modal-form" method="POST" @submit.prevent="submit">
        <div class="me-label">Gender</div>
        <div class="me-row">
            <div class="role-col-left">
                <select v-model="input.gender" style="background-position:205px">
                    <option key="1" value="Male">Male</option>
                    <option key="2" value="Female">Female</option>
                    <option key="3" value="">Rather not say</option>
                </select>
                <span class="err-msg" v-if="errors.gender">
                    {{ errors.gender }}
                </span>
            </div>
        </div>

        <div class="me-label" style="margin-bottom:17px">Date of Birth</div>
        <div class="me-row">
            <div class="me-col-left">
                <div class="emp-form-label">Day</div>
                <select v-model="birthDay">
                    <option v-for="(day, index) in days" :key="index" v-bind:value="day">{{ day }}</option>
                </select>
            </div>
            <div class="me-col-mid">
                <div class="emp-form-label">Month</div>
                <select v-model="birthMonth" @change="onChangeBirthMonthYear">
                    <option v-for="(month, index) in months" :key="index" v-bind:value="month.id">{{ month.name }}</option>
                </select>
            </div>
            <div class="me-col-right">
                <div class="emp-form-label">Year</div>
                <select v-model="birthYear" @change="onChangeBirthMonthYear">
                    <option v-for="(year, index) in years" :key="index" v-bind:value="year">{{ year }}</option>
                </select>
            </div>
        </div>
        <span class="err-msg" v-if="errors.date_of_birth">
            {{ errors.date_of_birth }}
        </span>

        <div class="me-label">Country of Birth</div>
        <div class="me-row mb-3">
            <select style="background-position:465px" v-model="input.country_birth">
                <option v-for="country in countries" :key="country" :value="country">{{ country }}</option>
            </select>
        </div>
        <span class="err-msg" v-if="errors.country_birth">
            {{ errors.country_birth }}
        </span>
    </form>
</template>

<script>
    import Api from '@/api';

    export default {

        data() {
            return {
                days: [],
                months: Utils.getMonths(),
                years: Utils.getYears(new Date().getFullYear() - 18),
                birthDay: '',
                birthMonth: '',
                birthYear: '',
                countries: [],
                input: {
                    gender: '', date_of_birth: '', country_birth: '',
                },
                errors: {
                    gender: '', date_of_birth: '', country_birth: '',
                },
                endpoints: {
                    save: '/api/v1/worker/personal-details',
                },
            }
        },

        created() {
            let component = this;

            Bus.$on('onboardingSubmitPersonalDetails', function() {
                component.input.date_of_birth = component.birthYear + '-' + component.birthMonth + '-' + component.birthDay;

                if (! component.birthYear && ! component.birthMonth && ! component.birthDay) {
                    component.input.date_of_birth = '';
                }

                Api.submit(component.endpoints.save, component.$data.input);
            });

            this.days = Utils.getDaysInMonth(this.birthMonth, this.birthYear);
            
            Promise.resolve(Api.getCountries()).then(function(data) {
                component.countries = data.data.countries;
            });
        },

        methods: {

            onChangeBirthMonthYear() {
                this.days = Utils.getDaysInMonth(this.birthMonth, this.birthYear);
            },

        }
    }
</script>