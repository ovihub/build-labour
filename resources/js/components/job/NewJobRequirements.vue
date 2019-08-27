<template>
    <div class="profile-item-2">
        <div class="profile-content">
            
            <div class="profile-title">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23">
                    <g fill="none" fill-rule="evenodd">
                        <path d="M0 0h23v23H0z"/>
                        <path fill="#00aeef" fill-rule="nonzero" d="M10 3a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1h2a1 1 0 0 1 0 2H8a1 1 0 1 1 0-2h2zM6.525 4A1.25 1.25 0 0 0 7.75 5.5h7.5A1.25 1.25 0 0 0 16.475 4H17a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h.525zM6.5 7a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1h-1zm0 .5h1A.5.5 0 0 1 8 8v1a.5.5 0 0 1-.5.5h-1A.5.5 0 0 1 6 9V8a.5.5 0 0 1 .5-.5zm0 8.5a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1zm0 .5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1A.5.5 0 0 1 6 18v-1a.5.5 0 0 1 .5-.5zm0-5a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1zm0 .5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm4-4a.5.5 0 1 0 0 1h6a.5.5 0 1 0 0-1h-6zm0 4.5a.5.5 0 1 0 0 1h6a.5.5 0 1 0 0-1h-6zm0 4.5a.5.5 0 1 0 0 1h6a.5.5 0 1 0 0-1h-6z"/>
                    </g>
                </svg>

                Requirements
            </div>

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
</template>

<script>
    import Api from '@/api';

    export default {
        name: "new-job-requirements",
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
            let vm = this;

            Bus.$on('newJobDetails', function() {
                Bus.$emit('newJobRequirements', {
                    qualifications: vm.qualifications,
                    experience: vm.experience,
                    skills: vm.skills,
                });
            });
        },
        methods: {
            onSearchCourse(keyword) {
                let vm = this;

                Promise.resolve(Api.getCourses(keyword)).then(function(data) {
                    vm.courses = data.data.courses;
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
                let vm = this;

                Promise.resolve(Api.getTickets(keyword)).then(function(data) {
                    console.log(data)
                    vm.searchedTickets = (vm.keyword != '') ? data : [];
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
                if (! this.selectedTicket) return false;

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
        },
    }
</script>

<style scoped>
    .job-title {
        margin-bottom: -12px;
    }
</style>