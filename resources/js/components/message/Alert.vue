<template>
    <div v-bind:class="alert" v-if="alert != 'hidden'">
      <div class="container">
          <img v-bind:src="icon" class="alert-icon" />
          {{ message }}
          <img src="/img/icons/alert-close.png" class="alert-close" @click="hide" />
      </div>
    </div>
</template>

<script src="./Alert.js"></script>