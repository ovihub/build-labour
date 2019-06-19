<template>
    <form class="modal-form" method="POST" @submit.prevent="submit">
        <div class="skill-label">
            What skills have you learnt in your profession?
        </div>
        
        <textarea rows="2" ref="skillsIntro" class="form-control" style="overflow:hidden"
            placeholder="Example: Worked on Rail link, saved $30,000 on budget, and delivered 2 weeks before project deadline."
            @keyup="textAreaAdjust('skillsIntro')" v-model="input.main_skill"></textarea>
        
        <span class="err-msg" v-if="errors.main_skill">
            {{ errors.main_skill }}
        </span>

        <div class="skill-label">
            What are your main industry skills?
        </div>
        <div class="skill-label-3">
            e.g. Time Management, Communication Skills
        </div>

        <div class="btn btn-link btn-delete" @click="addNewSkill">
            Add Another
        </div>

        <div class="emp-row row-center"
            :ref="'skillItem-' + index" 
            v-for="(skill, index) in input.skills"
            :key="index">
            
            <div class="emp-col-left">
                <input class="form-control" type="text" placeholder="Enter your Industry Skill" v-model="skill.skill_name" />
            </div>

            <div class="emp-col-mid">
                <select v-model="skill.level_id">
                    <option v-for="level in levels" :key="level.id" v-bind:value="level.id">{{ level.name }}</option>
                </select>  
            </div>

            <div class="emp-col-right">
                <span class="remove-skill-icon" @click="removeSkill(index)">
                    <img src="/img/icons/remove.png"
                        srcset="/img/icons/remove@2x.png 2x, /img/icons/remove@3x.png 3x">
                </span>
            </div>
        </div>

        <div class="bl-btn-group">
            <div class="btn btn-link btn-delete" @click="submit">
                Save and Finish later
            </div>

            <button type="button" @click="next">
                To Work Preferences
            </button>
        </div>
    </form>
</template>

<script>
    import Api from '@/api';

    export default {

        data() {
            return {
                is_empty: false,
                main_skill: '',
                user_skills: [],
                firstColumn: [],
                secondColumn: [],
                levels: [
                    { id: 1, name: 'Beginner' },
                    { id: 2, name: 'Competent' },
                    { id: 3, name: 'Expert' },
                ],
                input: {
                    main_skill: '', skills: [],
                },
                errors: {
                    main_skill: ''
                },
                endpoints: {
                    save: '/api/v1/user/skills',
                    delete: '/api/v1/user/skills',
                },
            }
        },

        created() {

        },

        methods: {

            display() {
                let len = this.user_skills.length;
                let half = Math.ceil(len / 2);

                this.firstColumn = this.user_skills.slice(0, half);
                this.secondColumn = this.user_skills.slice(half, len);
            },

            textAreaAdjust(refName) {
                Utils.textAreaAdjust(this.$refs[refName]);
            },

            close() {
                this.input.main_skill = this.main_skill;
                this.input.skills = this.user_skills.map(function(skill) {
                    return { 
                        skill_id: skill.sid,
                        skill_name: skill.sname,
                        level_id: skill.lid,
                        level_name: skill.lname
                    };
                });

                Utils.setObjectValues(this.errors, '');
            },

            deleteRecord() {
                $('#deleteRecordModal').modal('show');

                Bus.$emit('deleteIndustrySkill', this.endpoints.delete);
            },

            addNewSkill() {
                if (this.input.skills.length == 0 || this.input.skills.slice(-1)[0].skill_name !== '') {
                    this.input.skills.push({
                        skill_id: 0,
                        skill_name: '',
                        level_id: 1
                    });
                }
            },

            removeSkill(index) {
                this.input.skills.splice(index, 1);
            },

            next() {
                Bus.$emit('onboardingNext', 6);
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