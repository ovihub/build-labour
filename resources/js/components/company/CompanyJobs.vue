<template>
    <div class="profile-item-2">
        <div class="profile-content">

            <div class="save-icon">
                <img style="margin-top:-5px;margin-left:5px;margin-bottom:-5px" src="/img/icons/plus.png"
                    srcset="/img/icons/plus@2x.png 2x, /img/icons/plus@3x.png 3x">
                <div class="bl-label-14-style-2">
                    Save
                </div>
            </div>
            
            <ul class="list-job-items">
                <li class="job-items">
                    <div class="jobads-row">
                        <div class="bl-col-1">
                            <img class="bl-image-40" src="/img/logo/1.jpg">
                        </div>
                        <div class="bl-col-2">
                            <div class="bl-display">
                                <span class="bl-label-19 bl-ml14">
                                    Probuild
                                </span>

                                <span class="bl-label-14 bl-ml14" style="margin-top:-5px">
                                    Posted 2 days ago
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="job-summary">
                        <div class="bl-label-21">
                            Project Manager
                        </div>
                        <div class="bl-label-14-style-3">
                            Melbourne CBD<span class="text-style-1">Posted 3 days ago</span>
                        </div>
                        <div class="bl-label-15 bl-mt16">
                            An opportunity is available for a Construction Manager to work in and with the Melbourne
                            Asphalt team to take responsibility for delivery of a portfolio of projects whilst optimising performance.
                        </div>
                    </div>
                </li>
            </ul>

            <div class="profile-more mt-2">
                <a href="#">View Details<i class="fa fa-angle-right ml-2"></i></a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                input: {
                    ticket: '', description: ''
                },
                tickets: [],
                firstColumn: [],
                secondColumn: [],
            }
        },

        created() {
            let component = this;

            Bus.$on('ticketsDetails', function(detailsArray) {
                component.tickets = detailsArray;
                
                component.display();
            });

            Bus.$on('AddTicket', function(details) {
                component.tickets.push(details);

                component.display();
            });

            Bus.$on('passTickets', function(tickets) {
                component.tickets = tickets;
                
                component.display();
            });
        },

        methods: {
         
            display() {
                let len = this.tickets.length;
                let half = Math.ceil(len / 2);

                this.firstColumn = this.tickets.slice(0, half);
                this.secondColumn = this.tickets.slice(half, len);
            },
        }
    }
</script>