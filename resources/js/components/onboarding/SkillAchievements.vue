<template>
    <form class="modal-form" method="POST" @submit.prevent="submit">
        <div class="skill-label">
            What are your main industry work achievements?
        </div>
        
        <textarea rows="2" ref="skillsIntro" class="form-control" style="overflow:hidden"
            placeholder="Example: Worked on Rail link, saved $30,000 on budget, and delivered 2 weeks before project deadline."
            @focus="textAreaAdjust('skillsIntro')"
            @keyup="textAreaAdjust('skillsIntro')"
            v-model="input.main_skill">
        </textarea>
        
        <span class="err-msg" v-if="errors.main_skill">
            {{ errors.main_skill }}
        </span>
    </form>
</template>

<script>
    import Api from '@/api';

    export default {

        data() {
            return {
                is_empty: false,
                main_skill: '',
                input: {
                    main_skill: '',
                },
                errors: {
                    main_skill: '',
                },
                endpoints: {
                    save: '/api/v1/user/skills',
                },
            }
        },

        created() {
            let component = this;

            Bus.$on('onboardingSubmitAchievements', function() {
                Api.submit(component.endpoints.save, component.$data.input);
            });
        },

        methods: {

            textAreaAdjust(refName) {
                Utils.textAreaAdjust(this.$refs[refName]);
            },

        }
    }
</script>