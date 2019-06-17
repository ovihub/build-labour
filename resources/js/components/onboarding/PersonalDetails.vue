<template>
    <form class="modal-form" method="POST" @submit.prevent="submit">
        <div class="me-label">Gender</div>
        <div class="me-row">
            <div class="role-col-left">
                <select v-model="input.gender" style="background-position:210px">
                    <option key="1" value="Male">Male</option>
                    <option key="2" value="Female">Female</option>
                    <option key="3" value="Other">Rather not say</option>
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
        <div class="me-row">
            <!-- <div class="role-col-left"> -->
                <select v-model="input.country">
                    <option key="1" value="Single">Single</option>
                    <option key="2" value="Married">Married</option>
                    <option key="3" value="Other">Other</option>
                </select>
            <!-- </div> -->
        </div>
        <span class="err-msg" v-if="errors.country">
        {{ errors.country }}
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
                input: {
                    gender: '', date_of_birth: '', country: '',
                },
                errors: {
                    gender: '', date_of_birth: '', country: '',
                },
            }
        },

        created() {
            let component = this;

            Bus.$on('', function() {
            
            });

            this.days = Utils.getDaysInMonth(this.birthMonth, this.birthYear);
        },

        methods: {

            onChangeBirthMonthYear() {
                this.days = Utils.getDaysInMonth(this.birthMonth, this.birthYear);
            },

            async submit() {

            },
        }
    }
</script>