<template>
    <div class="profile-item-2">
        <div class="profile-content">

            <tickets-modal></tickets-modal>

            <edit-icon cls="edit-icon" data-target="#modalTickets"></edit-icon>
            
            <div class="profile-title">
                <img src="/img/icons/ticket.png"
                    srcset="/img/icons/ticket@2x.png 2x, /img/icons/ticket@3x.png 3x">

                Tickets
            </div>

            <div class="bl-label-16-style-2 mb-3" v-if="has_whitecard">
                <div class="cross-check-mark" style="font-size:1.2rem" v-if="mark_icon == 'check'">&#10003;</div>
                <div class="cross-check-mark" style="font-size:1rem" v-if="mark_icon == 'cross'">&#10005;</div>
                {{ has_whitecard }}
            </div>
            
            <div class="row">
                <div class="col-md-6 col-sm-6" v-for="first in firstColumn" v-bind:key="first.id">
                    <span class="bl-label-15">
                        {{ first.ticket }}
                    </span>
                    <span class="bl-label-14">
                        {{ first.description }}
                    </span>
                </div>

                <div class="col-md-6 col-sm-6" v-for="second in secondColumn" v-bind:key="second.id">
                    <span class="bl-label-15">
                        {{ second.ticket }}
                    </span>
                    <span class="bl-label-14">
                        {{ second.description }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                mark_icon: '',
                has_whitecard: '',
                tickets: [],
                firstColumn: [],
                secondColumn: [],
            }
        },

        created() {
            let component = this;

            Bus.$on('ticketsDetails', function(detailsArray, detail) {
                component.tickets = detailsArray;

                if (detail == 1) {
                    component.mark_icon = 'check';
                    component.has_whitecard = 'Has a valid and current White Card';
                
                } else {
                    component.mark_icon = 'cross';
                    component.has_whitecard = 'No valid and current White Card';
                }
                
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