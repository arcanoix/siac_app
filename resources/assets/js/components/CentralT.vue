<template>
  <div class="container">
    <section class="content-header">
         <h1>

           <small></small>
         </h1>
         <ol class="breadcrumb">
           <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
           <li class="active">Tanque</li>
         </ol>
       </section>
<div class="tabled">
    <br>

    <h3 style="text-align: center;">Central</h3>

    <div style="padding: 5px">
      <a href="#" class="btn-t btn btn-success pull-right"> <i class="fa fa-chevron-left" aria-hidden="true"></i>Regresar</a>
      <a class="btn-t btn-primary pull-left" href="#" v-on:click.prevent
      ="showModal=true"> <i class="fa fa-user-plus" aria-hidden="true"></i>Nueva Central Telefonica</a>

    </div>

    <!-- For markup truncated -->

    <table class="table table-striped">
      <tr  class="row-name">
        <th>#</th>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Parroquia</th>
        <th>Sector</th>
        <th>Tanquilla</th>
        <th>Editar</th>
        <th>Eliminar</th>

      </tr>
      <tr v-for="b in central"  class="row-content">
        <td>{{ b.id }}</td>
        <td>{{ b.name }}</td>
        <td>{{b.address}} </td>
        <td>{{ b.parish_id }}</td>
        <td>{{b.sector_id}}</td>
        <td>{{b.tanks_id}}</td>


        <td v-on:click.prevent="onEdit(b)"><a class="btn-top  btn btn-primary pull-right"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
        <td v-on:click.prevent="onDelete(b)"><a class="btn-top btn btn-danger  pull-right"> <i class="fa fa-trash" aria-hidden="true"></i></a></td>
      </tr>

    </table>
    <br>



      <modal :display="showModal" @close="showModal = false">
        <div slot="header">
          <i class="fa fa-user"></i> Registro de Central

        </div>
        <div slot="body">
          <form class="form">

            <div class="form-group inner-addon left-addon">
               <i class="fa fa-user" aria-hidden="true"></i>
              <input v-validate="'required'" v-model="newCentral.name" type="text" class="form-control" placeholder="Nombre" :class="{'input': true, 'is-danger': errors.has('name') }">
             <span v-show="errors.has('name')" class="help is-danger">{{ errors.first('name') }}</span>

            </div>
             <div class="form-group inner-addon left-addon">
               <i class="fa fa-envelope" aria-hidden="true"></i>
              <input v-validate="'required'" :class="{'input': true, 'is-danger': errors.has('address') }" v-model="newCentral.address" type="text" class="form-control" placeholder="Tipo de falla" name="address">
             <span v-show="errors.has('address')" class="help is-danger">{{ errors.first('address') }}</span>

            </div>
            <div class="form-group inner-addon left-addon">
             <i class="fa fa-key" aria-hidden="true"></i>
             <input v-model="newCentral.parish_id" type="text" class="form-control" placeholder="ADS_ID">

            </div>
            <div class="form-group inner-addon left-addon">
             <i class="fa fa-key" aria-hidden="true"></i>
             <input v-model="newCentral.sector_id" type="text" class="form-control" placeholder="ADS_ID">

            </div>
            <div class="form-group inner-addon left-addon">
             <i class="fa fa-key" aria-hidden="true"></i>
             <input v-model="newCentral.tanks_id" type="text" class="form-control" placeholder="ADS_ID">

            </div>
          </form>

        </div>
        <div slot="footer">

        <a href="#" class="btn btn-primary" v-on:click.prevent="saveCentral()">Guardar</a>

          <a href="#" class="btn btn-default" v-on:click.prevent="showModal=false">Cerrar</a>

        </div>
      </modal>

  </div>
</div>

</template>

<script>
var getCental = 'central';
var post_central = 'central_save';

export default {

  data(){
      return {
        central: [],
        showModal:false,
        newCentral:{
          name:'',
          address:'',
          parish_id:'',
          sector_id:'',
          tanks_id:''
        }

      }
  },
  created(){
    this.fetchCentral();

  },
  methods:{
      fetchCentral(){
         axios.get(getCental).then(response => {

            this.central = response.data.central;
        });

      },
      saveCentral(newCentral){
        var input = this.newCentral;
        if(input['name'] == ''){
          this.hasError =false;
          this.hasDeleted = true;
        }
        else
        {
              this.hasError=true;
               axios.post(post_central, this.newCentral).then(response => {
               this.fetchCentral();
               this.showModal= false;
               });
        }

      },
      onDelete(b){
        var that = this;
        var delCentral = '/central_del/';
        //console.log(delCentral + "/"+ b.id);

        swal({
          title: '¿Estas seguro de eliminar el registro?',
          text: 'Luego de eliminar no podras recuperar el registro',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Si',
          cancelButtonText: 'No'
        }).then(function(){
          axios.delete(delCentral +  b.id).then(response => {
            //console.log("eliminado");
            that.fetchCentral();
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
