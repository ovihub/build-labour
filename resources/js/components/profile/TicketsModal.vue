<template>
    <main-modal id="modalTickets">

        <template slot="custom-modal-title">
            <h4 class="modal-title">Edit Tickets</h4>
            <div class="close" data-dismiss="modal" @click="close">&times;</div>
        </template>

        <template slot="custom-modal-content">
            <form class="modal-form" method="POST" @submit.prevent="submit">

                <div class="form-group">
                    <div class="emp-row edit-tickets-search">
                        <div class="ticket-search">
                            <input class="form-control" type="text" v-model="keyword" v-on:input="onSearch" placeholder="search"/>
                        </div>
                        <div class="btn-wrapper">
                            <button class="pull-right" type="button" @click="onAdd()">
                                Add
                            </button>
                        </div>
                        <span class="err-msg" v-if="errors.ticket.length > 0">
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

                    <div class="emp-row" v-if="tickets.length > 0" v-for="(ticket, idx) in tickets">
                        <span>{{ ticket.ticket }} - {{ ticket.description }}</span>

                        <span class="ticket-delete" @click="onDelete(idx)">x</span>
                    </div>

                </div>
            </form>
        </template>

        <template slot="custom-modal-footer">
            <button class="pull-right" type="submit" @click="submit">
                Save Changes
            </button>
        </template>

    </main-modal>
</template>

<script>
    export default {
        data() {
            return {
                keyword: '',
                disabled: false,
                tickets: [],
                searchedTickets: [],
                selectedTicket: false,
                timeOut: false,
                errors: { ticket: '' },
                endpoints: {
                    save: '/api/v1/worker/tickets',
                    tickets: '/api/v1/worker/tickets',
                    search: '/api/v1/tickets/search'
                },
            }
        },

        created() {

            let component = this;

            axios.get(this.endpoints.tickets, Utils.getBearerAuth())
                .then( res => {
                   console.log(res);
                    component.tickets = res.data.data.tickets;
                });
        },

        methods: {

            close() {

                this.keyword = '';
            },

            onSearch() {

                let component = this;

                if (component.keyword.length <= 0) {
                    component.searchedTickets = [];
                }

                if (component.time_out) {

                    clearTimeout(component.time_out);
                }

                component.time_out = setTimeout(function() {

                    axios.get(this.endpoints.search + "?keyword=" + this.keyword, Utils.getBearerAuth())

                        .then(function(response) {

                            component.searchedTickets = (component.keyword != '') ? response.data.data.tickets : []
                        })
                        .catch(function(error) {

                            Utils.handleError(error);
                        });
                }.bind(this), 300);
            },

            onSelect(ticket) {

                this.selectedTicket = ticket;
                this.keyword = ticket.ticket + "-" + ticket.description;
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
            
            async submit() {

                let component = this;

                let tickets = component.tickets.map(function (ticket) {
                    return {ticket_id: ticket.id};
                });

                let saveInput = {tickets: tickets};

                await axios.post(component.endpoints.save, saveInput, Utils.getBearerAuth())

                    .then(function(response) {

                        let tickets = response.data.data.tickets;

                        console.log(tickets);

                        $('#modalTickets').modal('hide');
                        Bus.$emit('passTickets', tickets);

                    })
                    .catch(function(error) {

                    });


                this.disabled = false;
            },
        }
    }
</script>