<template>
    <div class="profile-item-2">
        <div class="profile-content">
            <span class="edit-icon">
                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span>
            
            <div class="profile-title">
                <img src="/img/icons/ticket.png"
                    srcset="/img/icons/ticket@2x.png 2x, /img/icons/ticket@3x.png 3x">

                Tickets
            </div>
            
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