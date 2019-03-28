<template>
    <form method="POST" @submit.prevent="saveProfile">

        <div class="form-group row">
            <label for="first_name" class="col-md-2 col-form-label text-md-left">First Name</label>

            <div class="col-md-5">
                <input id="first_name" type="text" name="first_name" class="form-control" v-model="input.first_name" :disabled="disabled_input" required autofocus />

                <span class="err-msg" v-if="errors.first_name">
                    {{ errors.first_name }}
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="last_name" class="col-md-2 col-form-label text-md-left">Last Name</label>

            <div class="col-md-7">
                <input id="last_name" type="text" name="last_name" class="form-control" v-model="input.last_name" :disabled="disabled_input" required autofocus />

                <span class="err-msg" v-if="errors.last_name">
                    {{ errors.last_name }}
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-2 col-form-label text-md-left">E-Mail Address</label>

            <div class="col-md-7">
                <input id="email" type="email" name="email" class="form-control" v-model="input.email" :disabled="disabled_input" required />

                <span class="err-msg" v-if="errors.email">
                    {{ errors.email }}
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="dob" class="col-md-2 col-form-label text-md-left">Birth Date</label>

            <div class="col-md-7">
                <input id="dob" type="text" name="dob" class="form-control" v-model="input.dob" :disabled="disabled_input" required />

                <span class="err-msg" v-if="errors.dob">
                    {{ errors.dob }}
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="country" class="col-md-2 col-form-label text-md-left">Country</label>

            <div class="col-md-7">
                <input id="country" type="text" name="country" class="form-control" v-model="input.country" :disabled="disabled_input" required />

                <span class="err-msg" v-if="errors.country">
                    {{ errors.country }}
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="address" class="col-md-2 col-form-label text-md-left">Address</label>

            <div class="col-md-7">
                <input id="address" type="text" name="address" class="form-control" v-model="input.address" :disabled="disabled_input" required />

                <span class="err-msg" v-if="errors.address">
                    {{ errors.address }}
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="mobile_number" class="col-md-2 col-form-label text-md-left">Mobile Number</label>

            <div class="col-md-7">
                <input id="mobile_number" type="text" name="mobile_number" class="form-control" v-model="input.mobile_number" :disabled="disabled_input" required />

                <span class="err-msg" v-if="errors.mobile_number">
                    {{ errors.mobile_number }}
                </span>
            </div>
        </div>
        
        <div class="form-group row mb-0">
            <div class="col-md-7 offset-md-4">
                <button type="button" class="btn btn-primary" @click="resendEmail" :disabled="disabled_resend">
                    Resend Verification Code
                </button>
            </div>
        </div>
    </form>
</template>

<script src="./Profile.js"></script>