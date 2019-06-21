<template>
    <form class="modal-form" method="POST" @submit.prevent="submit">
        <div class="skill-label">
            I have the right to work in Australia
        </div>
        <div class="skill-label-3">
            <a href="#">See legal requirements</a>
        </div>
        <div class="bl-inline">
            <input id="right_to_work_1" class="styled-checkbox-round" type="checkbox"
                ref="right_to_work_1" @change="formatCheckbox('right_to_work', 1)" />
            <label for="right_to_work_1">Yes</label>
            
            <input id="right_to_work_0" class="styled-checkbox-round" type="checkbox"
                ref="right_to_work_0" @change="formatCheckbox('right_to_work', 0)" />
            <label for="right_to_work_0">No</label>
        </div>

        <div class="me-label">
            I have an Australian Tax File Number (TFN)
        </div>
        <div class="bl-inline">
            <input id="has_tfn_1" class="styled-checkbox-round" type="checkbox"
                ref="has_tfn_1" @change="formatCheckbox('has_tfn', 1)" />
            <label for="has_tfn_1">Yes</label>
            
            <input id="has_tfn_0" class="styled-checkbox-round" type="checkbox"
                ref="has_tfn_0" @change="formatCheckbox('has_tfn', 0)" />
            <label for="has_tfn_0">No</label>
        </div>

        <div class="me-label">
            I have an Australian Business Number (ABN)
        </div>
        <div class="bl-inline">
            <input id="has_abn_1" class="styled-checkbox-round" type="checkbox"
                ref="has_abn_1" @change="formatCheckbox('has_abn', 1)" />
            <label for="has_abn_1">Yes</label>
            
            <input id="has_abn_0" class="styled-checkbox-round" type="checkbox"
                ref="has_abn_0" @change="formatCheckbox('has_abn', 0)" />
            <label for="has_abn_0">No</label>
        </div>

        <div class="me-label">
            I am competent in WRITTEN and SPOKEN english
        </div>
        <div class="bl-inline">
            <input id="english_skill_1" class="styled-checkbox-round" type="checkbox"
                ref="english_skill_1" @change="formatCheckbox('english_skill', 1)" />
            <label for="english_skill_1">Yes</label>
            
            <input id="english_skill_0" class="styled-checkbox-round" type="checkbox"
                ref="english_skill_0" @change="formatCheckbox('english_skill', 0)" />
            <label for="english_skill_0">No</label>
        </div>

        <div class="me-label">
            I have a valid driver's license
        </div>
        <div class="bl-inline">
            <input id="drivers_license_1" class="styled-checkbox-round" type="checkbox"
                ref="drivers_license_1" @change="formatCheckbox('drivers_license', 1)" />
            <label for="drivers_license_1">Yes</label>
            
            <input id="drivers_license_0" class="styled-checkbox-round" type="checkbox"
                ref="drivers_license_0" @change="formatCheckbox('drivers_license', 0)" />
            <label for="drivers_license_0">No</label>
        </div>

        <div class="me-label">
            I own/have access to a registered vehicle on a permanent basis
        </div>
        <div class="bl-inline">
            <input id="has_registered_vehicle_1" class="styled-checkbox-round" type="checkbox"
                ref="has_registered_vehicle_1" @change="formatCheckbox('has_registered_vehicle', 1)" />
            <label for="has_registered_vehicle_1">Yes</label>
            
            <input id="has_registered_vehicle_0" class="styled-checkbox-round" type="checkbox"
                ref="has_registered_vehicle_0" @change="formatCheckbox('has_registered_vehicle', 0)" />
            <label for="has_registered_vehicle_0">No</label>
        </div>

        <div class="me-label-2">
            Note: Some jobs may require the use of your own registered vehicle.
        </div>
    </form>
</template>

<script>
    import Api from '@/api';

    export default {

        data() {
            return {
                input: {
                    right_to_work: '', has_tfn: '', has_abn: '',
                    english_skill: '', drivers_license: '', has_registered_vehicle: '',
                },
                errors: {
                    right_to_work: '', has_tfn: '', has_abn: '',
                    english_skill: '', drivers_license: '', has_registered_vehicle: '',
                },
                endpoints: {
                    save: '/api/v1/worker/affirmations',
                },
            }
        },

        created() {
            let component = this;

            Bus.$on('onboardingSubmitWorkInformation', function() {
                Api.submit(component.endpoints.save, component.$data.input);
            });
        },

        methods: {

            formatCheckbox(refName, value) {
                Utils.formatCheckbox(this, refName, value);
            },

        }
    }
</script>