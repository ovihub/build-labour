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
                :value="sector.id" v-model="input.sectors" />

            <label :for="'sector-styled-checkbox-'+index" style="width:125px">{{ sector.business_type }}</label>
        </div>

        <div class="skill-label">
            In the following Tiers
        </div>
        <div class="bl-inline" v-for="(tier, index) in tiers" :key="index + sectors.length">
            <input :id="'tier-styled-checkbox-'+index" class="styled-checkbox" type="checkbox"
                :value="tier.id" v-model="input.tiers" />

            <label :for="'tier-styled-checkbox-'+index">{{ tier.tier_name }}</label>
        </div>

        <div class="btn btn-link btn-delete mt-3"
            data-toggle="modal"
            data-backdrop="static"
            data-keyboard="false"
            data-target="#modalEmployment"
            @click="action(-1)">
            
            Add new position
        </div>
        
        <employment-list></employment-list>

    </form>
</template>

<script>
    import Api from '@/api';

    export default {

        data() {
            return {
                disabled: false,
                sectors: [
                    { id: 1, business_type: 'Residential' },
                    { id: 2, business_type: 'Commercial' },
                    { id: 3, business_type: 'Civil' },
                ],
                tiers: [
                    { id: 1, tier_name: 'Tier 1' },
                    { id: 2, tier_name: 'Tier 2' },
                    { id: 3, tier_name: 'Tier 3' },
                    { id: 4, tier_name: 'Tier 4' },
                ],
                input: {
                    tiers: [], sectors: [],
                },
                endpoints: {
                    save: '/api/v1/worker/sectors',
                },
            }
        },

        created() {
            let component = this;

            Bus.$on('onboardingSubmitEmploymentHistory', function(saveInput) {
                Api.submit(component.endpoints.save, saveInput ? saveInput : component.$data.input);
            });
        },

        methods: {

            action(index) {
                Bus.$emit('showEmployment', index, null);
            },

        }
    }
</script>