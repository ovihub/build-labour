<template>
    <form class="modal-form" method="POST" @submit.prevent="submit">
        <div class="me-label">
            I have a current valid White Card
        </div>
        <div class="bl-inline">
            <input id="has_whitecard_1" class="styled-checkbox-round" type="checkbox"
                ref="has_whitecard_1"
                @focus="hasFocus(false)"
                @change="formatCheckbox('has_whitecard', 1)" />
            <label for="has_whitecard_1">Yes</label>
            
            <input id="has_whitecard_0" class="styled-checkbox-round" type="checkbox"
                ref="has_whitecard_0"
                @focus="hasFocus(false)"
                @change="formatCheckbox('has_whitecard', 0)" />
            <label for="has_whitecard_0">No</label>
        </div>

        <div class="me-label" style="margin-bottom:-15px">
            I have current valid licenses and/or tickets in
        </div>
        <div class="skill-label-3 mt-3">
            e.g. RIIMPO317E - Conduct Roller Operations
        </div>
        <div class="emp-row mt-3">
            <div class="ticket-col-left">
                <input class="form-control" type="text"  placeholder="Search" v-model="keyword"
                    @focus="hasFocus(true)"
                    @keyup="onSearch(keyword)" />
            </div>
            <div class="ticket-col-right">
                <button style="margin-left:0px;width:100%" class="add-button" type="button" @click="onAdd()">Add</button>
            </div>
            <span class="err-msg" v-if="errors.ticket">
                {{ errors.ticket }}
            </span>
        </div>

        <div class="emp-row" style="margin-top:0" v-if="has_focus && searchedTickets && searchedTickets.length > 0">
            <ul class="list-group">
                <li class="list-group-item" v-for="(ticket, idx) in searchedTickets" :key="idx"
                    @click="onSelect(ticket)">
                    {{ ticket.ticket }} {{ ticket.description ? ('- ' + ticket.description) : '' }}
                </li>
            </ul>
        </div>

        <div class="emp-row" v-for="(ticket, idx) in tickets" :key="idx">
            <span class="ticket-label">{{ ticket.ticket }} {{ ticket.description ? ('- ' + ticket.description) : '' }}</span>

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
        name: "ticket-details",
        data() {
            return {
                has_focus: false,
                keyword: '',
                has_whitecard: '',
                tickets: [],
                searchedTickets: [],
                selected: false,
                errors: { 
                    ticket: ''
                },
                endpoints: {
                    save: '/api/v1/worker/tickets',
                },
            }
        },

        created() {
            let vm = this;

            Bus.$on('ticketsDetails', function(detailsArray, detail) {
                vm.tickets = detailsArray;
                
                vm.formatCheckbox('has_whitecard', detail);
            });

            Bus.$on('onboardingSubmitTickets', function() {
                let saveInput = {
                    tickets: vm.tickets.map(function (ticket) {
                                if (ticket.id) {
                                    return { ticket_id: ticket.id };
                                }
                                
                                return { ticket: ticket.ticket, description: ticket.description };
                             }),
                    has_whitecard: vm.has_whitecard
                };

                Api.submit(vm.endpoints.save, saveInput);

                Bus.$emit('ticketsDetails', vm.tickets, vm.has_whitecard);
            });

            Bus.$on('refreshTicketDetails', function() {
                Promise.resolve(Api.getWorkerTickets()).then(function(data) {
                    vm.tickets = data.data.tickets;
                });
            });
        },

        methods: {
            hasFocus(has_focus) {
                this.has_focus = has_focus;
            },
            onSearch(keyword) {
                this.errors.ticket = '';

                if (keyword != '' && (keyword && keyword.length > 0)) {
                    this.searchedTickets = Api.getTickets(keyword);

                } else {
                    this.searchedTickets = [];
                }
            },
            onSelect(ticket) {
                this.selected = ticket;
                this.keyword = ticket.ticket + (ticket.description ? (' - ' + ticket.description) : '');
                this.searchedTickets = [];
            },
            onDelete(index) {
                this.tickets.splice(index, 1);
            },
            onAdd() { // TODO: Need to improve algo
                if (! this.selected) {
                    this.keyword = this.keyword.trim();

                    let description = this.keyword.substr(this.keyword.indexOf(' ') + 1);

                    this.selected = {
                        id: null,
                        ticket: this.keyword.split(' ')[0],
                        description: description ? description.replace(/^[^a-zA-Z]+/, '') : null,
                    }
                }

                if (! this.tickets.find(el => (this.selected.id && el.id === this.selected.id) ||
                                                (! this.selected.id && (el.ticket == this.selected.ticket)
                                                    && (el.description == this.selected.description)))) {
                                                
                    this.tickets.unshift(this.selected);
                    this.keyword = '';
                    this.errors.ticket = '';

                } else {
                    this.errors.ticket = 'Ticket already exists on selected list';
                }

                this.selected = false;
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