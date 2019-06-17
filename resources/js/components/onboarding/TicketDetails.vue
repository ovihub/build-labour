<template>
    <form class="modal-form" method="POST" @submit.prevent="submit">
        <div class="me-label">
            I have a current valid White Card
        </div>
        <div class="bl-inline">
            <input id="white_card_1" class="styled-checkbox-round" type="checkbox"
                ref="white_card_1"
                @change="formatCheckbox('white_card', 1)" />
            <label for="white_card_1">Yes</label>
            
            <input id="white_card_0" class="styled-checkbox-round" type="checkbox"
                ref="white_card_0"
                @change="formatCheckbox('white_card', 0)" />
            <label for="white_card_0">No</label>
        </div>

        <div class="me-label">
            I have current valid licenses and/or tickets in
        </div>
        <div class="emp-row">
            <div class="ticket-col-left">
                <input class="form-control" type="text"  placeholder="Search" v-model="keyword" @keyup="onSearch(keyword)" />
            </div>
            <div class="ticket-col-right">
                <button class="add-button" type="button" @click="onAdd()">Add</button>
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
            <span>{{ ticket.ticket }} - {{ ticket.description }}</span>

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
                disabled: false,
                initTickets: [],
                tickets: [],
                searchedTickets: [],
                selectedTicket: false,
                timeOut: false,
                errors: { 
                    ticket: ''
                },
                input: {

                },
                errors: {

                },
            }
        },

        created() {
            let component = this;

            Bus.$on('', function() {
            
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

            formatCheckbox(refName, value) {
                Utils.formatCheckbox(this, refName, value);
            },

            async submit() {

            },
        }
    }
</script>