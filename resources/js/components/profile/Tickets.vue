<template>
    <div class="profile-item-2">
        <div class="profile-content">
            <span class="edit-icon">
                <a href="#">Edit</a>
            </span>
            
            <div class="profile-title">Tickets</div>
            
            <div v-for="ticket in tickets" v-bind:key="ticket.id">
                <span class="profile-label">
                    {{ ticket.title }}
                </span>
                <span class="profile-text">
                    {{ ticket.description }}
                </span>
            </div>
            
            <!-- <span class="profile-label">
                TLILIC2001
            </span>
            <span class="profile-text">
                License to operate a Forklift Truck
            </span>
            <span class="profile-label">
                RIIHAN301D
            </span>
            <span class="profile-text">
                Elevating Work Platform Under 11m
            </span>
            <span class="profile-label">
                RIIWHS205D
            </span>
            <span class="profile-text">
                Control Traffic with Stop - Slow Bat
            </span> -->
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tickets: []
            }
        },

        created() {
            let component = this;

            Bus.$on('ticketsDetails', function(detailsArray) {
                component.tickets = detailsArray;
            });
        },

        methods: {
            
        }
    }
</script>