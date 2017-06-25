<template>

  <transition name="modal">
    <div class="modal-mask" v-if="display">
      <div class="modal-wrapper">
        <div class="modal-container brand-bt">

          <div class="modal-header">
            <strong :class="headerColor">
              <slot name="header">
                <span class="fa fa-warning"></span> Atención
              </slot>
            </strong>
            <div class="modal-commands">
              <button class="modal-button-close" @click="$emit('close')"></button>
            </div>
          </div>

          <div class="modal-body">
            <slot name="body">
              // contenido
            </slot>
          </div>

          <div class="modal-footer">
            <slot name="footer">
              <button class="btn btn-primary" @click="$emit('close')">cerrar</button>
            </slot>
          </div>
        </div>
      </div>
    </div>
  </transition>

</template>

<script>
  export default {
    props: {
      display: {
        type: Boolean,
        required: false
      },
      headerColor: {
        type: String,
        default: 'brand-text'
      },
    },
    data: function () {
      return {
          //
      }
    },
    methods: {
      //
    },
    watch: {
      //
    },
    mounted: function () {
      //
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, .8);
    display: table;
    transition: opacity .3s ease;
  }

  .modal-wrapper {
    display: table-cell;
    vertical-align: middle;
  }

  .modal-container {
    min-width: 548px;
    max-width: 600px;
    margin: 0px auto;
    padding: 0px;
    background-color: #fff;
    border-radius: 6px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
    transition: all .3s ease;
    font-family: Helvetica, Arial, sans-serif;
  }

  .modal-header {
    margin-top: 0;
    padding: 16px 24px;
    border-bottom: 1px solid #e5e5e5;
  }

  .modal-body {
    padding: 16px 24px;
    /*margin: 20px 0;*/
  }

  .modal-footer {
    padding: 16px 24px;
    border-top: 1px solid #e5e5e5;
  }

  .modal-commands {
    position: relative;
    z-index: 2;
  }

  .modal-default-button {
    /*float: right;*/
  }

  .modal-button-close {
    
    display: inline-block;
    height: 10px;
    margin-left: 10px;
    padding: 10px;
    border: 0;
    background-color: transparent;
    background-repeat: no-repeat;
    background-position: center;
    cursor: pointer;
  }

  /*
   * The following styles are auto-applied to elements with
   * transition="modal" when their visibility is toggled
   * by Vue.js.
   *
   * You can easily play with the modal transition by editing
   * these styles.
   */

  .modal-enter {
    opacity: 0;
  }

  .modal-leave-active {
    opacity: 0;
  }

  .modal-enter .modal-container,
  .modal-leave-active .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
  }
</style>
