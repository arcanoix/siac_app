<template>
  <div class="container-fluid">
    <section class="content-header">
         <h1>

           <small></small>
         </h1>
         <ol class="breadcrumb">
           <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
           <li class="active">Falla</li>
         </ol>
       </section>
<div class="tabled">
    <br>

    <h3 style="text-align: center;">Fallas</h3>

    <div style="padding: 5px">

      <a class="btn-t btn-primary pull-left" href="#" v-on:click.prevent
      ="showModal=true"> <i class="fa fa-user-plus" aria-hidden="true"></i>Nueva Falla</a>

    </div>

    <!-- For markup truncated -->

    <table class="table table-striped">
      <tr  class="row-name">
        <th>#</th>
        <th>Numero telefonico</th>
        <th>Tipo De Falla</th>
        <th>Estatus</th>
        <th>Cliente</th>
        <th>Direccion</th>
        <th>Tecnico Asignado</th>
        <th>Editar</th>

      </tr>
      <tr v-for="b in falla"  class="row-content">
        <td>{{ b.id }}</td>
        <td>{{ b.number.number }}</td>
        <td>{{ b.type_failure }} </td>
        <td>{{ b.status }}</td>
        <td>{{ b.cliente.name }}</td>
        <td>{{ b.address }}</td>
        <td>{{ b.users.name }}</td>

        <td v-on:click.prevent="onEdit(b)"><a class="btn-top  btn btn-primary"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
      <!--  <td v-on:click.prevent="onDelete(b)"><a class="btn-top btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i></a></td>-->
      </tr>

    </table>

    <nav>
                <ul class="pagination">
                    <li v-if="pagination.current_page > 1">
                        <a  aria-label="Previous"
                           v-on:click.prevent="changePage(pagination.current_page - 1)">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li v-for="page in pagesNumber"
                        :class="[ page == isActived ? 'active' : '']">
                        <a  v-on:click.prevent="changePage(page)">{{ page }}</a>
                    </li>
                    <li v-if="pagination.current_page < pagination.last_page">
                        <a aria-label="Next" v-on:click.prevent="changePage(pagination.current_page + 1)">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
    <br>



      <modal :display="showModal" @close="showModal = false">
        <div slot="header">
          <i class="fa fa-user"></i> Registro de Fallas

        </div>
        <div slot="body">
          <form class="form">

            <div class="form-group inner-addon left-addon">

              <v-select :value="numero.id" placeholder="Selecciona un numero" v-model="newFalla.number_telephone_id"  :options="Selectnumber" :on-change="onChange"><span slot="no-options">Carga datos en el modulo numero telefonico</span></v-select>
            </div>
             <div class="form-group inner-addon left-addon">
               <i class="fa fa-envelope" aria-hidden="true"></i>
              <input v-validate="'required'" :class="{'input': true, 'is-danger': errors.has('type_failure') }" v-model="newFalla.type_failure" type="text" class="form-control" placeholder="Tipo de falla" name="type_failure">
             <span v-show="errors.has('type_failure')" class="help is-danger">{{ errors.first('type_failure') }}</span>

            </div>
            <div class="form-group inner-addon left-addon">
                <v-select v-model="newFalla.status" placeholder="Selecciona un Estatus" :options="Estatus" ></v-select>
            </div>
            <div class="form-group inner-addon left-addon">
                <v-select :value="cliente.id" v-model="newFalla.customer_id" placeholder="Selecciona un Cliente" :options="SelectCliente" :on-change="onChangeCliente"><span slot="no-options">Porfavor Carga un cliente en su modulo</span></v-select>
            </div>
            <div class="form-group inner-addon left-addon">
             <i class="fa fa-key" aria-hidden="true"></i>
             <input v-model="place" type="text" class="form-control" placeholder="Direccion">

            </div>

            <div class="form-group inner-addon left-addon">
              <v-select :value="user.id" v-model="newFalla.user_id" placeholder="Selecciona un Usuario" :options="SelectUser" :on-change="onChangeUser"><span slot="no-options">Porfavor Carga un Tecnico en su modulo</span></v-select>

            </div>

            <div class="col-md-6 Map" style=""><h3> Latitude : {{ latitude }}</h3></div>
                <div class="col-md-6 Map" style=""><h3> Longitude : {{ longitude }}</h3></div>
                <div class="col-md-12 Map" style="display:none" v-bind:class="{ 'not-visible' : active }" >
                    <!-- ADD_YOUR_API_KEY hear 
                    <iframe frameborder="0" style="width: 100%; height: 350px; border:0" :src="'https://www.google.com/maps/embed/v1/place?key=AIzaSyCEyxtNeLPsOWjABwIKLWrA4gDnm0sRUv0&q='+ place" allowfullscreen></iframe>-->
                </div>


          </form>

        </div>
        <div slot="footer">

        <a href="#" class="btn btn-primary" v-on:click.prevent="saveFalla()">Guardar</a>

          <a href="#" class="btn btn-default" v-on:click.prevent="showModal=false">Cerrar</a>

        </div>
      </modal>



      <modal :display="showModal1" @close="showModal1 = false">
        <div slot="header">
          <i class="fa fa-user"></i> Actualizacion de Registro de Fallas

        </div>
        <div slot="body">
          <form class="form">

            <div class="form-group inner-addon left-addon">
               <i class="fa fa-user" aria-hidden="true"></i>

              <v-select :value="numero.id" v-model="editFalla.number_telephone_id"  :options="Selectnumber" :on-change="onChange"></v-select>


             <span v-show="errors.has('number_telephone_id')" class="help is-danger">{{ errors.first('number_telephone_id') }}</span>

            </div>
             <div class="form-group inner-addon left-addon">
               <i class="fa fa-envelope" aria-hidden="true"></i>
              <input v-validate="'required'" :class="{'input': true, 'is-danger': errors.has('type_failure') }" v-model="editFalla.type_failure" type="text" class="form-control" placeholder="Tipo de falla" name="type_failure">
             <span v-show="errors.has('type_failure')" class="help is-danger">{{ errors.first('type_failure') }}</span>

            </div>
            <div class="form-group inner-addon left-addon">
              <v-select v-model="editFalla.status"  :options="Estatus" ></v-select>
            </div>
            <div class="form-group inner-addon left-addon">
                <v-select :value="cliente.id" v-model="editFalla.customer_id"  :options="SelectCliente" :on-change="onChangeCliente"></v-select>
            </div>
            <div class="form-group inner-addon left-addon">
             <i class="fa fa-globe" aria-hidden="true"></i>
             <input v-model="editFalla.address" type="text" class="form-control" placeholder="Direccion">

            </div>

            <div class="form-group inner-addon left-addon">
              <v-select :value="user.id" v-model="editFalla.user_id"  :options="SelectUser" :on-change="onChangeUser"></v-select>

            </div>

          </form>

        </div>
        <div slot="footer">

        <a href="#" class="btn btn-primary" v-on:click.prevent="updateFalla()">Guardar</a>

          <a href="#" class="btn btn-default" v-on:click.prevent="showModal1=false">Cerrar</a>

        </div>
      </modal>

  </div>
</div>

</template>


<script>
 import Vue from 'vue';
import vSelect from 'vue-select'
import * as VueGoogleMaps from 'vue2-google-maps'

window.axios = require('axios');

window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};


Vue.use(VueGoogleMaps, {
    load:{
        key: 'AIzaSyCEyxtNeLPsOWjABwIKLWrA4gDnm0sRUv0'
    }
});

Vue.component('v-select', vSelect)

var getFalla = 'fallas';
var postFalla = 'falla_save';

export default {

  data(){
      return {
        latitude: '',
        place: '',
        active : true,
        longitude: '',
        falla: [],
        showModal:false,
        showModal1:false,
        Estatus:['En proceso', 'Listo'],
        customer:{
          id:'',
          name:''
        },
        users:{
          id:'',
          name:''
        },
        numero:{
          id:''
        },
        cl:{
          id:''
        },
        user:{
          id:''
        },
        selected:null,
        number:[],
        cliente:[],
        u:[],
        newFalla:{
          number_telephone_id:'',
          type_failure:'',
          status:'',
          customer_id:'',
          address:'',
          user_id:'',
          latitude:'',
          longitude:''
        },
        editFalla:{
          number_telephone_id:'',
          type_failure:'',
          status:'',
          customer_id:'',
          address:'',
          user_id:'',
          latitude:'',
          longitude:''
        },

        pagination:{
          total:0,
          per_page : 7,
          from:1,
          to:0,
          current_page:1
        },
        offset: 4,

      }
  },
   watch: {
    place(){
      this.longitude = '';
      this.latitude = '';      
      this.active = true;
      if (this.place.length >= 4) {
        this.lookupCoordinates(); 
        this.active = false;        
      }
    }
  },
  created(){
    this.fetchFallas(this.pagination.current_page);
    this.fetchCustomer();
    this.fetchNumber();
    this.fetchUser();

  },
  computed:{
    SelectUser(){
      return this.u.map(g =>(
        {
          label:g.name,
           value:g.id
         }
      ));
    },
    SelectCliente(){
      return this.cliente.map(g =>(
        {
          label:g.name,
           value:g.id
         }
      ));
    },
      Selectnumber(){
        return this.number.map(g =>(
          {
            label:g.number,
             value:g.id
           }
        ));

      },
      isActived(){
        return this.pagination.current_page;
      },
      pagesNumber(){
        if (!this.pagination.to) {
                 return [];
             }
             var from = this.pagination.current_page - this.offset;
             if (from < 1) {
                 from = 1;
             }
             var to = from + (this.offset * 2);
             if (to >= this.pagination.last_page) {
                 to = this.pagination.last_page;
             }
             var pagesArray = [];
             while (from <= to) {
                 pagesArray.push(from);
                 from++;
             }
             return pagesArray;
      }
  },

  methods:{


     lookupCoordinates() {
      var app = this;
      app.longitude = "Ubicando.....";
      app.latitude = "Ubicando.....";     

     

      axios.get('https://maps.googleapis.com/maps/api/geocode/json?address=' + app.place)
            .then(response => {
              //console.log(response);
              app.longitude = response.data.results[0].geometry.location.lng;
              app.latitude = response.data.results[0].geometry.location.lat;              
            })
            .catch( error => {
              app.longitude = "Ubicacion no Valida";
              app.latitude = "Ubicacion no Valida";              
            })
    }, 


    onChangeUser(obj){
      this.user.id = obj.value;
    },
      onChange(obj){
          this.numero.id = obj.value;
          //this.newFalla.number_telephone_id = obj.value;
      },
      onChangeCliente(obj){
          this.cl.id = obj.value;
              },
    fetchFallas(page){

         axios.get('/fallas?page=' + page).then(response => {

           this.falla = response.data.data.data;
           this.pagination = response.data.pagination;
        });

      },
      changePage(page){
          //console.log(page);
          this.pagination.current_page = page;
          this.fetchFallas(page);
      },
      fetchCustomer(){
          axios.get('clientes').then(response => {
            this.cliente = response.data.data.data;
          })
      },
      fetchNumber(){
          axios.get('numero_telefonico').then(response => {

            this.number = response.data.data.data;
            //console.log(response.data.data.data);
          })
      },
      fetchUser(){
        axios.get('tecnicos').then(response => {

            this.u = response.data;
      })
      },
      saveFalla(newFalla){
        var input = this.newFalla;
        var type_failure = input['type_failure']
        var status = input['status']
        var address = input['address']
        var lat = input['lat']
        var longitud = input['longitud']


         if((status && type_failure && address && lat && longitud) == ""){
         
          this.hasError = false;
          this.hasDeleted = true;
          
          swal({
            title: "Oops...",
              text:  'Tiene campos en blanco!',
               type: 'error' 
              })
        }
        else
        {
            this.newFalla.user_id = this.user.id;
            this.newFalla.customer_id = this.cl.id;
            this.newFalla.number_telephone_id = this.numero.id;
            this.newFalla.address = this.place;
            this.newFalla.latitude = this.latitude;
            this.newFalla.longitude = this.longitude;
              this.hasError=true;
               axios.post(postFalla, this.newFalla).then(response => {

                  swal({
                title: "Success",
                text: 'Registro Guardado',
                type: 'success',
                animation: 'slide-from-bottom',
                timer: 3000
            });

               this.fetchFallas();
               this.showModal= false;
               });
        }

      },
      updateFalla(editFalla){
        var input = this.editFalla;
        var update = '/update_f/' + input.id;
        axios.put(update, input).then(response => {
          swal({
                title: "Success",
                text: 'Registro actualizado',
                type: 'success',
                animation: 'slide-from-bottom',
                timer: 3000
            });
            this.fetchFallas();
            this.showModal1= false;
        });
      },
      onEdit(b){
        var showUser = '/show_f/';
        var that = this;
        that.showModal1 = true;
        axios.get(showUser + b.id).then(response => {
            this.editFalla = response.data;
        });
      },
      onDelete(b){
        var that = this;
        var delFalla = '/falla_del/';
        //console.log(delFalla + "/"+ b.id);

        swal({
          title: '¿Estas seguro de eliminar el registro?',
          text: 'Luego de eliminar no podras recuperar el registro',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Si',
          cancelButtonText: 'No'
        }).then(function(){
          axios.delete(delFalla +  b.id).then(response => {
            //console.log("eliminado");
            that.fetchFallas();
          });
        })
      }
  }
}
</script>


<style>

.simple-root {
  margin-top: 20%;
  margin-left: auto;
  margin-right: auto;
}
.help.is-danger {
  color: red;
}
.form-control.is-danger {
  border: 1px solid red;
}



/* enable absolute positioning */
.inner-addon {
    position: relative;
}

/* style icon */
.inner-addon .fa {
  position: absolute;
  padding: 10px;
  pointer-events: none;
}

/* align icon */
.left-addon .fa  { left:  0px;}
.right-addon .fa { right: 0px;}

/* add padding  */
.left-addon input  { padding-left:  30px; }
.right-addon input { padding-right: 30px; }


.tabled{
    background-color: white;
     opacity:0.9; /* Opacidad 90% */
     border-radius: 2px;
     border-bottom: 2px;
}
/* Table css Start */
a.del
{
    background:#d9534f;
    border-radius: 2px;
    width: 35px;
    height:28px;
    padding-left:12px;
    line-height:10px;
}

a.edit
{
    padding-left:10px;
    background:#337ab7;
    color:#fff;
    border-radius:2px;
    border:none;
}

tr.row-name
{
    font-size: 18px;
    color:#448aff;
}

tr.row-content
{
    color:#6c7173;

}

 th  {
   text-align: center;
  padding-top: 10px;
padding-right: 10px;
padding-bottom: 10px;
padding-left: 30px;
}

td  {
  text-align: center;
 padding-top: 10px;
padding-right: 10px;
padding-bottom: 10px;
padding-left: 30px;
}

table
{
    border-bottom: 8px solid #448aff;



}

td.check
{
    text-align: center;

}

.table-striped>tbody>tr:nth-of-type(odd)
{
    background:#F0F2F2 !important;
}

a.btn-danger:hover
{
    background: #de6c69;
}

a.btn-danger
{
    background:#d9534f;
}

a.btn-top
{
    /*background:#448aff;*/
    color:#fff;
    border:1px solid #448aff;
    padding: 7px 10px;
    border-radius:4px;
}

a.btn-top:hover
{
    text-decoration: none;
    box-shadow:3px 3px 5px #222;
    transition:box-shadow 0.5s;
}

a.btn-t
{

    color:#fff;
    border:1px solid #448aff;
    padding: 7px 10px;
    border-radius:4px;
    width: 20%;
}



a.btn-t:hover
{
    text-decoration: none;
    box-shadow:3px 3px 5px #222;
    transition:box-shadow 0.5s;
}
/* Table css End */

/*modal*/
.Modal__container {
    max-width: 700px;
    width: 90%;
    background: white;
    border-radius: 2px;
    animation-duration: 0.3s;
    animation-delay: 0s;
}

.Modal__header {
    border-bottom: 1px solid white;
    padding: 15px 10px;
    background-color: silver;
    color: white;
    border-radius: 2px;
}

.Modal__header > h1 {
    font-size: 27px;
    font-weight: normal;
    margin: 0;
}

.Modal__content {
    padding: 10px;
}

.Modal__footer {
    padding: 5px;
}

.u-overlay {
    position: fixed;
    z-index: 1000;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.8);
    display: flex;
    align-items: center;
    justify-content: center;
}

.naked-link {
    color: inherit;
    text-decoration: inherit;
}

</style>
