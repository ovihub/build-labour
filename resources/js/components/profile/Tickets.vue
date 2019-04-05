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
            
            <div class="row">
                <div class="col-md-6 col-sm-6" v-for="first in firstColumn" v-bind:key="first.id">
                    <span class="profile-label">
                        {{ first.title }}
                    </span>
                    <span class="profile-text">
                        {{ first.description }}
                    </span>
                </div>

                <div class="col-md-6 col-sm-6" v-for="second in secondColumn" v-bind:key="second.id">
                    <span class="profile-label">
                        {{ second.title }}
                    </span>
                    <span class="profile-text">
                        {{ second.description }}
                    </span>
                </div>
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
                tickets: [],
                firstColumn: [],
                secondColumn: [],
            }
        },

        created() {
            let component = this;

            Bus.$on('ticketsDetails', function(detailsArray) {
                component.tickets = detailsArray;
                
                let len = component.tickets.length;
                let half = Math.ceil(len / 2);

                component.firstColumn = detailsArray.slice(0, half);
                component.secondColumn = detailsArray.slice(half, len);
            });
        },

        methods: {
            
        }
    }
</script>