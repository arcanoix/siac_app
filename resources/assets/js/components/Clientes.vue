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

    <h3 style="text-align: center;">Clientes</h3>

    <div style="padding: 5px">

      <a class="btn-t btn-primary pull-left" href="#" v-on:click.prevent
      ="showModal=true"> <i class="fa fa-user-plus" aria-hidden="true"></i>Nuevo Cliente</a>

    </div>

    <!-- For markup truncated -->

    <table class="table table-striped">
      <tr  class="row-name">
        <th>#</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Cedula</th>
        <th>Email</th>
        <th>Editar</th>


      </tr>
      <tr v-for="b in clientes"  class="row-content">
        <td>{{ b.id }}</td>
        <td>{{ b.name }}</td>
        <td>{{b.last_name}}</td>
        <td>{{b.identification_card}}</td>
        <td>{{ b.email }}</td>


        <td v-on:click.prevent="onEdit(b)"><a class="btn-top  btn btn-primary"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
      <!--  <td v-on:click.prevent="onDelete(b)"><a class="btn-top btn btn-danger  pull-right"> <i class="fa fa-trash" aria-hidden="true"></i></a></td>-->
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
          <i class="fa fa-user"></i> Registro de Cliente

        </div>
        <div slot="body">
          <form class="form">

            <div class="form-group inner-addon left-addon">
               <i class="fa fa-user" aria-hidden="true"></i>
              <input v-validate="'required'" v-model="newCliente.name" type="text" class="form-control" placeholder="Nombre" :class="{'input': true, 'is-danger': errors.has('name') }">
             <span v-show="errors.has('name')" class="help is-danger">{{ errors.first('name') }}</span>

            </div>
            <div class="form-group inner-addon left-addon">
               <i class="fa fa-user" aria-hidden="true"></i>
              <input v-validate="'required'" v-model="newCliente.last_name" type="text" class="form-control" placeholder="Apellido" :class="{'input': true, 'is-danger': errors.has('last_name') }">
             <span v-show="errors.has('last_name')" class="help is-danger">{{ errors.first('last_name') }}</span>

            </div>
            <div class="form-group inner-addon left-addon">
               <i class="fa fa-user" aria-hidden="true"></i>
              <input v-validate="'required'" v-model="newCliente.identification_card" type="text" class="form-control" placeholder="Cedula" :class="{'input': true, 'is-danger': errors.has('identification_card') }">
             <span v-show="errors.has('identification_card')" class="help is-danger">{{ errors.first('identification_card') }}</span>

            </div>
            <div class="form-group inner-addon left-addon">
               <i class="fa fa-user" aria-hidden="true"></i>
              <input v-validate="'required'" v-model="newCliente.address" type="text" class="form-control" placeholder="Direccion" :class="{'input': true, 'is-danger': errors.has('address') }">
             <span v-show="errors.has('address')" class="help is-danger">{{ errors.first('address') }}</span>

            </div>
             <div class="form-group inner-addon left-addon">
               <i class="fa fa-envelope" aria-hidden="true"></i>
              <input v-validate="'required|email'" :class="{'input': true, 'is-danger': errors.has('email') }" v-model="newCliente.email" type="text" class="form-control" placeholder="Correo Electronico" name="email">
             <span v-show="errors.has('email')" class="help is-danger">{{ errors.first('email') }}</span>

            </div>


           <div class="form-group inner-addon left-addon">
              <v-select :value="municipio.id" v-model="newCliente.municipality_id" placeholder="Selecciona Municipio"  :options="SelectM" :on-change="onChange"></v-select>
           </div>

           <div  class="form-group inner-addon left-addon">
             <v-select :value="parroquia.id" v-model="newCliente.parish_id"  :options="SelectP" placeholder="Selecciona Parroquia" :on-change="onChangeP"></v-select>
           </div>

           <div class="form-group inner-addon left-addon">
             <v-select :value="sector.id" v-model="newCliente.sector_id"  :options="SelectS" placeholder="Selecciona el Sector" :on-change="onChangeS"><span slot="no-options">Por favor inserta un nuevo sector en su modulo</span></v-select>
           </div>

           <div class="form-group inner-addon left-addon">
             <v-select :value="numero.id" v-model="newCliente.number_telephone_id" :options="SelectNUM" placeholder="Selecciona Numero a asignar" :on-change="onChangeNUM"><span slot="no-options">Por favor inserta un nuevo numero telefonico en su modulo</span></v-select>
           </div>

           <div >


            <select v-model="newCliente.state_id" class="form-control" style="display:none;">
              <option :value="e.id"  v-for="e in estado">&nbsp;{{ e.name }}</option>

            </select>
           <span v-show="errors.has('state_id')" class="help is-danger">{{ errors.first('state_id') }}</span>

          </div>
          </form>

        </div>
        <div slot="footer">

        <a href="#" class="btn btn-primary" v-on:click.prevent="saveCliente()">Guardar</a>

          <a href="#" class="btn btn-default" v-on:click.prevent="showModal=false">Cerrar</a>

        </div>
      </modal>


      <!-- -->

      <modal :display="showModal1" @close="showModal1 = false">
        <div slot="header">
          <i class="fa fa-user"></i> Actualizacion de Cliente

        </div>
        <div slot="body">
          <form class="form">

            <div class="form-group inner-addon left-addon">
               <i class="fa fa-user" aria-hidden="true"></i>
              <input v-validate="'required'" v-model="editCliente.name" type="text" class="form-control" placeholder="Nombre" :class="{'input': true, 'is-danger': errors.has('name') }">
             <span v-show="errors.has('name')" class="help is-danger">{{ errors.first('name') }}</span>

            </div>
            <div class="form-group inner-addon left-addon">
               <i class="fa fa-user" aria-hidden="true"></i>
              <input v-validate="'required'" v-model="editCliente.last_name" type="text" class="form-control" placeholder="Apellido" :class="{'input': true, 'is-danger': errors.has('last_name') }">
             <span v-show="errors.has('last_name')" class="help is-danger">{{ errors.first('last_name') }}</span>

            </div>
            <div class="form-group inner-addon left-addon">
               <i class="fa fa-user" aria-hidden="true"></i>
              <input v-validate="'required'" v-model="editCliente.identification_card" type="text" class="form-control" placeholder="Cedula" :class="{'input': true, 'is-danger': errors.has('identification_card') }">
             <span v-show="errors.has('identification_card')" class="help is-danger">{{ errors.first('identification_card') }}</span>

            </div>
            <div class="form-group inner-addon left-addon">
               <i class="fa fa-user" aria-hidden="true"></i>
              <input v-validate="'required'" v-model="editCliente.address" type="text" class="form-control" placeholder="Direccion" :class="{'input': true, 'is-danger': errors.has('address') }">
             <span v-show="errors.has('address')" class="help is-danger">{{ errors.first('address') }}</span>

            </div>
             <div class="form-group inner-addon left-addon">
               <i class="fa fa-envelope" aria-hidden="true"></i>
              <input v-validate="'required|email'" :class="{'input': true, 'is-danger': errors.has('email') }" v-model="editCliente.email" type="text" class="form-control" placeholder="Correo Electronico" name="email">
             <span v-show="errors.has('email')" class="help is-danger">{{ errors.first('email') }}</span>

            </div>



            <div class="form-group inner-addon left-addon">
            <v-select :value="numero.id" v-model="editCliente.number_telephone_id" :options="SelectNUM" placeholder="Selecciona Numero a asignar" :on-change="onChangeNUM"><span slot="no-options">Por favor inserta un nuevo numero telefonico en su modulo</span></v-select>
           </div>

           <div>
            <select v-model="editCliente.state_id" class="form-control" style="display:none;">
              <option :value="e.id"  v-for="e in estado">&nbsp;{{ e.name }}</option>
            </select>
           <span v-show="errors.has('state_id')" class="help is-danger">{{ errors.first('state_id') }}</span>

          </div>
          </form>

        </div>
        <div slot="footer">

        <a href="#" class="btn btn-primary" v-on:click.prevent="updateCliente()">Guardar</a>

          <a href="#" class="btn btn-default" v-on:click.prevent="showModal1=false">Cerrar</a>

        </div>
      </modal>
  </div>
   </div>

</template>


<script>
var getCliente = 'clientes';
var postCliente = 'clientes_save';

export default {

  data(){
      return {
        clientes: [],
        showModal:false,
        showModal1:false,
        newCliente:{
          name:'',
          last_name:'',
          identification_card:'',
          address:'',
          email:'',
          state_id:7,
          municipality_id:'',
          parish_id:'',
          sector_id:'',
          number_telephone_id:''
        },
        editCliente:{
          name:'',
          last_name:'',
          identification_card:'',
          address:'',
          email:'',
          state_id:7,
          municipality_id:'',
          parish_id:'',
          sector_id:'',
          number_telephone_id:''
        },
        estado:{
          id:7,
          name:'Carabobo'
        },
        municipio:{
          id:''
        },
        sector:{
          id:''
        },
        parroquia:{
          id:''
        },
        numero:{
          id:''
        },
        num:[],
        sec:[],
        parro:[],
        munic:[],
        numberT:{
            id:'',
            code:'',
            number:'',
            status:''
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
  created(){
    this.fetchCliente(this.pagination.current_page);
      this.fetchN();
      this.fetchEstado();
      this.fetchMunicipio();
      this.fetchParish();
      this.fetchSector();

  },
  computed:{
    SelectM(){
      return this.munic.map(g =>(
        {
          label:g.name,
           value:g.id
         }
      ))

    },
    SelectP(){
      return this.parro.map(g =>(
        {
          label:g.name,
           value:g.id
         }
      ))
    },
    SelectS(){
      return this.sec.map(g =>(
        {
          label:g.name,
           value:g.id
         }
      ))
    },
    SelectNUM(){
      return this.num.map(g =>(
        {
          label:g.number,
          value:g.id
        }
      ))
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
    onChange(obj){
        this.municipio.id = obj.value;
    },
    onChangeP(obj){
        this.parroquia.id = obj.value;

    },
    onChangeS(obj){
        this.sector.id = obj.value;
    },
    onChangeNUM(obj){
        this.numero.id = obj.value;
    },
      fetchCliente(page){


         axios.get('/clientes?page='+ page).then(response => {

          //  this.clientes = response.data.clientes;
            this.clientes = response.data.data.data;
            this.pagination = response.data.pagination;
        });

      },
      changePage(page){
          //console.log(page);
          this.pagination.current_page = page;
          this.fetchCliente(page);
      },
      fetchN(){
          axios.get('numero_espera').then(response => {
            this.num = response.data;
          });
      },
      fetchSector(){
          axios.get('sectorT').then(response => {
              this.sec = response.data.sector;
          });
      },
      fetchMunicipio(){
          axios.get('municipio').then(response => {

        this.munic = response.data.municipio;
          //console.log(this.municipality);
        });
      },
      fetchEstado(){
          axios.get('estado').then(response => {
            this.estado = response.data.estado;

          });
      },
      fetchParish(){
          axios.get('parroquia').then(response => {
            this.parro = response.data;
          });
      },
      saveCliente(newCliente){
        var input = this.newCliente;
        if(input['name'] == ''){
          this.hasError =false;
          this.hasDeleted = true;
        }
        else
        {
          this.newCliente.sector_id = this.sector.id;
          this.newCliente.parish_id = this.parroquia.id;
          this.newCliente.municipality_id = this.municipio.id;
          this.newCliente.number_telephone_id = this.numero.id;
              this.hasError=true;
               axios.post(postCliente, this.newCliente).then(response => {

               this.fetchCliente();
               this.showModal = false;
               });
        }
      },
      onEdit(b){
        var showCliente = '/showCliente/';
        var that = this;
        that.showModal1 = true;
        axios.get(showCliente + b.id).then(response => {
            this.editCliente = response.data;
            //console.log(response.data);
        });
      },
      updateCliente(editCliente){
        var input = this.editCliente;
        var update = '/update_c/' + input.id;


        axios.put(update, input).then(response => {
          swal({
                title: "Success",
                text: 'Registro actualizado',
                type: 'success',
                animation: 'slide-from-bottom',
                timer: 3000
            });
            this.fetchCliente();
            this.showModal1= false;

        });
      },
      onDelete(b){
        var that = this;
        var delCliente = '/cliente_delete/';
        //console.log(delUsers + "/"+ b.id);

        swal({
          title: '¿Estas seguro de eliminar el registro?',
          text: 'Luego de eliminar no podras recuperar el registro',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Si',
          cancelButtonText: 'No'
        }).then(function(){
          axios.delete(delCliente +  b.id).then(response => {
            //console.log("eliminado");
            that.fetchCliente();
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
