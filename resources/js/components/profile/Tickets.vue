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
                    <span class="bl-label-15">
                        {{ first.title }}
                    </span>
                    <span class="bl-label-14">
                        {{ first.description }}
                    </span>
                </div>

                <div class="col-md-6 col-sm-6" v-for="second in secondColumn" v-bind:key="second.id">
                    <span class="bl-label-15">
                        {{ second.title }}
                    </span>
                    <span class="bl-label-14">
                        {{ second.description }}
                    </span>
                </div>
            </div>
            
            
            <!-- <span class="bl-label-15">
                TLILIC2001
            </span>
            <span class="bl-label-14">
                License to operate a Forklift Truck
            </span>
            <span class="bl-label-15">
                RIIHAN301D
            </span>
            <span class="bl-label-14">
                Elevating Work Platform Under 11m
            </span>
            <span class="bl-label-15">
                RIIWHS205D
            </span>
            <span class="bl-label-14">
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