<template>
  <div class="container-fluid">
    <section class="content-header">
         <h1>

           <small></small>
         </h1>
         <ol class="breadcrumb">
           <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
           <li class="active">Cliente</li>
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
        <th>Eliminar</th>

      </tr>
      <tr v-for="b in falla"  class="row-content">
        <td>{{ b.id }}</td>
        <td>{{ b.number.number }}</td>
        <td>{{ b.type_failure }} </td>
        <td>{{ b.status }}</td>
        <td>{{ b.cliente.name }}</td>
        <td>{{ b.address }}</td>
        <td>{{ b.users.name }}</td>

        <td v-on:click.prevent="onEdit(b)"><a class="btn-top  btn btn-primary pull-right"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
        <td v-on:click.prevent="onDelete(b)"><a class="btn-top btn btn-danger  pull-right"> <i class="fa fa-trash" aria-hidden="true"></i></a></td>
      </tr>

    </table>
    <br>



      <modal :display="showModal" @close="showModal = false">
        <div slot="header">
          <i class="fa fa-user"></i> Registro de Fallas

        </div>
        <div slot="body">
          <form class="form">

            <div class="form-group inner-addon left-addon">
               <i class="fa fa-user" aria-hidden="true"></i>


              <select class="form-control" v-model="newFalla.number_telephone_id">
                <option :value="n.id" v-for="n in number">{{ n.number }}</option>
              </select>

             <span v-show="errors.has('number_telephone_id')" class="help is-danger">{{ errors.first('number_telephone_id') }}</span>

            </div>
             <div class="form-group inner-addon left-addon">
               <i class="fa fa-envelope" aria-hidden="true"></i>
              <input v-validate="'required'" :class="{'input': true, 'is-danger': errors.has('type_failure') }" v-model="newFalla.type_failure" type="text" class="form-control" placeholder="Tipo de falla" name="type_failure">
             <span v-show="errors.has('type_failure')" class="help is-danger">{{ errors.first('type_failure') }}</span>

            </div>
            <div class="form-group inner-addon left-addon">
             <i class="fa fa-key" aria-hidden="true"></i>

              <select v-model="newFalla.status" class="form-control">
                  <option>Listo</option>
                  <option>En Proceso</option>

              </select>

            </div>
            <div class="form-group inner-addon left-addon">
             <i class="fa fa-key" aria-hidden="true"></i>

             <select class="form-control" v-model="newFalla.customer_id">
               <option :value="cliente.id" v-for="cliente in customer">{{ cliente.name }}</option>
             </select>

            </div>
            <div class="form-group inner-addon left-addon">
             <i class="fa fa-key" aria-hidden="true"></i>
             <input v-model="newFalla.address" type="text" class="form-control" placeholder="Direccion">

            </div>

            <div class="form-group inner-addon left-addon">
               <i class="fa fa-user" aria-hidden="true"></i>

              <select class="form-control" v-model="newFalla.user_id">
                <option :value="u.id" v-for="u in users">{{ u.name }}</option>
              </select>

             <span v-show="errors.has('number_telephone_id')" class="help is-danger">{{ errors.first('number_telephone_id') }}</span>

            </div>


          </form>

        </div>
        <div slot="footer">

        <a href="#" class="btn btn-primary" v-on:click.prevent="saveFalla()">Guardar</a>

          <a href="#" class="btn btn-default" v-on:click.prevent="showModal=false">Cerrar</a>

        </div>
      </modal>

  </div>
</div>

</template>


<script>
var getFalla = 'fallas';
var postFalla = 'falla_save';

export default {

  data(){
      return {
        falla: [],
        showModal:false,
        customer:{
          id:'',
          name:''
        },
        users:{
          id:'',
          name:''
        },
        number:{
          id:'',
          number:''
        },
        newFalla:{
          number_telephone_id:'',
          type_failure:'',
          status:'',
          customer_id:'',
          address:'',
          user_id:''
        }

      }
  },
  created(){
    this.fetchFallas();
    this.fetchCustomer();
    this.fetchNumber();

    this.fetchUser();

  },
  methods:{
      fetchFallas(){
         axios.get(getFalla).then(response => {

            this.falla = response.data.falla;
        });

      },
      fetchCustomer(){
          axios.get('clientes').then(response => {
            this.customer = response.data.clientes;
          })
      },
      fetchNumber(){
          axios.get('numero_telefonico').then(response => {
            this.number = response.data.numberT;
          })
      },
      fetchUser(){
        axios.get('tecnicos').then(response => {

            this.users = response.data;
            console.log(response.data);
        })
      },
      saveFalla(newFalla){
        var input = this.newFalla;
        if(input['name'] == ''){
          this.hasError =false;
          this.hasDeleted = true;
        }
        else
        {
              this.hasError=true;
               axios.post(postFalla, this.newFalla).then(response => {
               this.fetchFallas();
               this.showModal= false;
               });
        }

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
