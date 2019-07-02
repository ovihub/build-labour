<template>
    <div class="profile-item-2">
        <div class="profile-content">
            
            <div class="profile-title">
                <img src="/img/icons/requirements.png"
                    srcset="/img/icons/requirements@2x.png 2x, /img/icons/requirements@3x.png 3x">
                
                Requirements
            </div>

            <div v-if="show">
                <div v-if="qualifications.length > 0">
                    <div class="job-title">Qualifications</div>
                    <div class="job-body">
                        <ul class="job-list-items">
                            <li v-for="(qualification, index) in qualifications" :key="index">
                                {{ qualification }}
                            </li>
                        </ul>
                    </div>
                </div>

                <div v-if="experience.length > 0">
                    <div class="job-title">Experience</div>
                    <div class="job-body">
                        <ul class="job-list-items">
                            <li v-for="(exp, index) in experience" :key="index">
                                {{ exp }}
                            </li>
                        </ul>
                    </div>
                </div>

                <div v-if="skills.length > 0">
                    <div class="job-title">Skills</div>
                    <div class="job-body">
                        <ul class="job-list-items">
                            <li v-for="(skill, index) in skills" :key="index">
                                {{ skill }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div v-else>
                <form method="POST">
                    <div class="form-group">
                        <div class="job-title">Qualifications</div>

                        <div class="form-group emp-row row-center">
                            <!-- v-for="(to, index) in input.qualifications"
                            :ref="'toItem-' + index"
                            :key="index"> -->

                            <div class="comp-col-left">
                                <input class="form-control" type="text" placeholder="Course Type"
                                    @keyup="onSearchCourse()"/>
                            </div>

                            <div class="comp-col-right">
                                <span @click="onRemoveQualification(index)">
                                    <img src="/img/icons/remove.png"
                                        srcset="/img/icons/remove@2x.png 2x, /img/icons/remove@3x.png 3x"
                                        style="cursor:pointer">
                                </span>
                            </div>

                            <div class="comp-col-left" style="margin-top:0;margin-left:-25px">
                                <ul class="list-group">
                                    <li class="list-group-item" v-for="(course, idx) in courses" :key="idx"
                                        @click="onSelectCourse(course)">
                                        
                                        {{ course.course_name }}
                                    </li>
                                </ul>
                            </div>

                            <div class="me-row mt-4">
                                <select>
                                    <option key="1" value="Bachelor's Degree">Bachelor's Degree</option>
                                    <option key="2" value="Master's Degree">Master's Degree</option>
                                    <option key="3" value="Doctor's Degree">Doctor's Degree</option>
                                </select>
                            </div>
                        </div>

                        <div class="btn btn-link btn-delete"  @click="onAddQualification">
                            Add new qualification
                        </div>

                        <div class="job-title">Experience</div>

                        <div class="form-group emp-row row-center">
                            <!-- v-for="(to, index) in input.experience"
                            :ref="'toItem-' + index"
                            :key="index"> -->

                            <div class="me-row mb-4">
                                <input class="form-control" type="text" placeholder="Minimum Experience" />
                            </div>

                            <div class="me-row">
                                <input class="form-control" type="text" placeholder="Start typing..." />
                            </div>
                        </div>

                        <div class="btn btn-link btn-delete">
                            Add another
                        </div>

                        <div class="job-title">Skills</div>

                        <div class="form-group emp-row row-center">
                            <!-- v-for="(to, index) in input.skills"
                            :ref="'toItem-' + index"
                            :key="index"> -->

                            <input class="form-control" type="text" placeholder="Start typing..." />
                        </div>

                        <div class="btn btn-link btn-delete">
                            Add another
                        </div>

                        <div class="job-title">Tickets</div>
                        
                        <div class="emp-row">
                            <div class="ticket-col-left">
                                <input class="form-control" type="text"  placeholder="Search" v-model="keyword" @keyup="onSearchTicket(keyword)" />
                            </div>
                            <div class="ticket-col-right">
                                <button style="margin-left:0px;width:100%" class="add-button" type="button" @click="onAddTicket()">Add</button>
                            </div>
                            <span class="err-msg" v-if="errors.ticket">
                                {{ errors.ticket }}
                            </span>
                        </div>

                        <div class="emp-row" style="margin-top:0" v-if="searchedTickets.length > 0">
                            <ul class="list-group">
                                <li class="list-group-item" v-for="(ticket, idx) in searchedTickets" :key="idx"
                                    @click="onSelectTicket(ticket)">
                                    {{ ticket.ticket }} - {{ ticket.description }}
                                </li>
                            </ul>
                        </div>

                        <div class="emp-row" v-for="(ticket, idx) in tickets" :key="idx">
                            <span class="ticket-label">{{ ticket.ticket }} - {{ ticket.description }}</span>

                            <span class="remove-ticket-icon" @click="onRemoveTicket(idx)">
                                <img src="/img/icons/remove.png"
                                    srcset="/img/icons/remove@2x.png 2x, /img/icons/remove@3x.png 3x">
                            </span>
                        </div>
                    </div>

                    
                </form>
            </div>
        </div>
    </div>
</template>

<script>

    import Api from '@/api';

    export default {
        data() {
            return {
                show: false,
                courses: [],
                keyword: '',
                has_whitecard: '',
                tickets: [],
                searchedTickets: [],
                selectedTicket: false,
                errors: { 
                    ticket: ''
                },
                qualifications: [],
                experience: [],
                skills: [],
            }
        },

        created() {
            let component = this;

            Bus.$on('jobRequirementsDetails', function(detailsArray) {
                if (detailsArray && detailsArray.length != 0) {
                    component.qualifications = detailsArray[0].items;
                    component.experience = detailsArray[1].items;
                    component.skills = detailsArray[2].items;
                    
                    component.show = true;
                }
            });
        },

        methods: {

            onSearchCourse(keyword) {
                let component = this;

                Promise.resolve(Api.getCourses(keyword)).then(function(data) {
                    component.courses = data.data.courses;
                });
            },

            onSelectCourse(course) {
                this.courses = [];
            },

            onAddQualification() {
                
            },

            onRemoveQualification(index) {
                
            },

            onSearchTicket(keyword) {
                let component = this;

                Promise.resolve(Api.getTickets(keyword)).then(function(data) {
                    component.searchedTickets = (component.keyword != '') ? data.data.tickets : [];
                });
            },

            onSelectTicket(ticket) {
                this.selectedTicket = ticket;
                this.keyword = ticket.ticket + ' - ' + ticket.description;
                this.searchedTickets = [];
            },

            onRemoveTicket(index) {
                this.tickets.splice(index, 1);
            },

            onAddTicket() {
                if (!this.selectedTicket) {
                    return false;
                }

                let isFound = false;

                for (let i in this.tickets) {
                    let ticket = this.tickets[i];

                    if (ticket.id == this.selectedTicket.id) {
                        isFound = true;
                    }
                }

                if (!isFound) {
                    this.tickets.push(this.selectedTicket);
                    this.keyword = '';
                    this.selectedTicket = false;
                    this.errors.ticket = '';

                } else {
                    this.errors.ticket = 'Ticket already exists on selected list';
                }
            },
        }
    }
</script>

<style scoped>
    .job-title {
        margin-bottom: -12px;
    }
</style>