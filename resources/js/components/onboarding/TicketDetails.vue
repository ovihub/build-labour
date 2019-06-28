<template>
    <form class="modal-form" method="POST" @submit.prevent="submit">
        <div class="me-label">
            I have a current valid White Card
        </div>
        <div class="bl-inline">
            <input id="has_whitecard_1" class="styled-checkbox-round" type="checkbox"
                ref="has_whitecard_1"
                @change="formatCheckbox('has_whitecard', 1)" />
            <label for="has_whitecard_1">Yes</label>
            
            <input id="has_whitecard_0" class="styled-checkbox-round" type="checkbox"
                ref="has_whitecard_0"
                @change="formatCheckbox('has_whitecard', 0)" />
            <label for="has_whitecard_0">No</label>
        </div>

        <div class="me-label" style="margin-bottom:-15px">
            I have current valid licenses and/or tickets in
        </div>
        <div class="emp-row">
            <div class="ticket-col-left">
                <input class="form-control" type="text"  placeholder="Search" v-model="keyword" @keyup="onSearch(keyword)" />
            </div>
            <div class="ticket-col-right">
                <button style="margin-left:0px;width:100%" class="add-button" type="button" @click="onAdd()">Add</button>
            </div>
            <span class="err-msg" v-if="errors.ticket">
                {{ errors.ticket }}
            </span>
        </div>

        <div class="emp-row" style="margin-top:0" v-if="searchedTickets.length > 0">
            <ul class="list-group">
                <li class="list-group-item" v-for="(ticket, idx) in searchedTickets" :key="idx"
                    @click="onSelect(ticket)">
                    {{ ticket.ticket }} - {{ ticket.description }}
                </li>
            </ul>
        </div>

        <div class="emp-row" v-for="(ticket, idx) in tickets" :key="idx">
            <span class="ticket-label">{{ ticket.ticket }} - {{ ticket.description }}</span>

            <span class="remove-ticket-icon" @click="onDelete(idx)">
                <img src="/img/icons/remove.png"
                    srcset="/img/icons/remove@2x.png 2x, /img/icons/remove@3x.png 3x">
            </span>
        </div>
    </form>
</template>

<script>
    import Api from '@/api';

    export default {

        data() {
            return {
                keyword: '',
                has_whitecard: '',
                tickets: [],
                searchedTickets: [],
                selectedTicket: false,
                errors: { 
                    ticket: ''
                },
                endpoints: {
                    save: '/api/v1/worker/tickets',
                },
            }
        },

        created() {
            let component = this;

            Bus.$on('ticketsDetails', function(detailsArray, detail) {
                component.tickets = detailsArray;
                
                component.formatCheckbox('has_whitecard', detail);
            });

            Bus.$on('onboardingSubmitTickets', function() {
                let saveInput = {
                    tickets: component.tickets.map(function (ticket) {
                                return { ticket_id: ticket.id };
                             }),
                    has_whitecard: component.has_whitecard
                };

                Api.submit(component.endpoints.save, saveInput);

                Bus.$emit('ticketsDetails', component.tickets, component.has_whitecard);
            });

            Bus.$on('refreshTicketDetails', function() {
                Promise.resolve(Api.getWorkerTickets()).then(function(data) {
                    component.tickets = data.data.tickets;
                });
            });
        },

        methods: {

            onSearch(keyword) {
                let component = this;

                Promise.resolve(Api.getTickets(keyword)).then(function(data) {
                    component.searchedTickets = (component.keyword != '') ? data.data.tickets : [];
                });
            },

            onSelect(ticket) {
                this.selectedTicket = ticket;
                this.keyword = ticket.ticket + ' - ' + ticket.description;
                this.searchedTickets = [];
            },

            onDelete(index) {
                this.tickets.splice(index, 1);
            },

            onAdd() {
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

            formatCheckbox(refName, value) {
                Utils.formatCheckbox(this.$refs, null, refName, value);

                this.has_whitecard = (value == 1 || value == 0) ? value : null;
                
                // if (value == 0) {
                //     this.tickets = [];
                // }
            },

        }
    }
</script>