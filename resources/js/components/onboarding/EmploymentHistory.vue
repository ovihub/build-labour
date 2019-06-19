<template>
    <form class="modal-form" method="POST" @submit.prevent="submit">
        <div class="bl-label-16-style-2">
            Enter any previous experience you have had in construction related roles:
        </div>

        <div class="skill-label">
            I have worked in the following areas of construction
        </div>
        <div class="bl-inline" v-for="(sector, index) in sectors" :key="index">
            <input :id="'sector-styled-checkbox-'+index" class="styled-checkbox" type="checkbox"
                v-bind:value="sector.name" v-model="input.sectors" />
            <label :for="'sector-styled-checkbox-'+index" style="width:125px">{{ sector.name }}</label>
        </div>

        <div class="skill-label">
            In the following Tiers
        </div>
        <div class="bl-inline" v-for="(tier, index) in tiers" :key="index + sectors.length">
            <input :id="'tier-styled-checkbox-'+index" class="styled-checkbox" type="checkbox"
                v-bind:value="tier.name" v-model="input.tiers" />
            <label :for="'tier-styled-checkbox-'+index">{{ tier.name }}</label>
        </div>

        <div class="btn btn-link btn-delete"
            data-toggle="modal"
            data-backdrop="static"
            data-keyboard="false"
            data-target="#modalEmployment"
            @click="action(-1)">
            
            Add new position
        </div>
        
        <employment-list></employment-list>

        <div class="bl-btn-group">
            <div class="btn btn-link btn-delete" @click="submit">
                Save and Finish later
            </div>

            <button type="button" @click="next">
                To Education
            </button>
        </div>
    </form>
</template>

<script>
    import Api from '@/api';

    export default {

        data() {
            return {
                sectors: [
                    { id: 1, name: 'Residential' },
                    { id: 2, name: 'Civil' },
                    { id: 3, name: 'Commercial' },
                ],
                tiers: [
                    { id: 1, name: 'Tier 1' },
                    { id: 2, name: 'Tier 2' },
                    { id: 3, name: 'Tier 3' },
                    { id: 4, name: 'Tier 4' },
                ],
                input: {
                    tiers: [], sectors: [],
                },
            }
        },

        created() {
            
        },

        methods: {

            action(index) {
                Bus.$emit('showEmployment', index, null);
            },

            next() {
                Bus.$emit('onboardingNext', 3);
            },

            async submit() {

            },
        }
    }
</script>

<style scoped>
    button {
        width: 200px;
        margin-left: 130px;
    }
    .btn-link {
        padding-top: 0px;
    }
</style>