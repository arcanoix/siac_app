<template>
  <div class="container-fluid">
    <section class="content-header">
         <h1>
           <small></small>
         </h1>
         <ol class="breadcrumb">
           <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
           <li class="active">Empresa</li>
         </ol>
       </section>
<div class="tabled">
    <br>

    <h3 style="text-align: center;">Empresas</h3>

    <div style="padding: 5px">

      <a class="btn-t btn-primary pull-left" href="#" v-on:click.prevent
      ="showModal=true"> <i class="fa fa-industry" aria-hidden="true"></i>Nueva Empresa</a>

    </div>

    <!-- For markup truncated -->

    <table class="table table-striped">
      <tr  class="row-name">
        <th>#</th>
        <th>Nombre</th>
        <th>Rif</th>
        <th>Direccion</th>
        <th>Email</th>
        <th>Numero Telefonico</th>
        <th>Editar</th>


      </tr>
      <tr v-for="b in business"  class="row-content">
        <td>{{ b.id }}</td>
        <td>{{ b.name }}</td>
        <td>{{ b.rif }}</td>
        <td>{{ b.address }} </td>
        <td>{{ b.email }}</td>
        <td>{{ b.num.code }} - {{ b.num.number }}</td>



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



      <modal :display="showModal" @close="showModal = false" ref="modal">
        <div slot="header">
          <i class="fa fa-industry"></i> Registro de Empresa

        </div>
        <div slot="body">
          <form class="form">

            <div class="form-group inner-addon left-addon">
               <i class="fa fa-industry" aria-hidden="true"></i>
              <input v-validate="'required'" v-model="newBusiness.name" type="text" class="form-control" placeholder="Nombre de la empresa" :class="{'input': true, 'is-danger': errors.has('name') }">
             <span v-show="errors.has('name')" class="help is-danger">{{ errors.first('name') }}</span>

            </div>
             <div class="form-group inner-addon left-addon">
               <i class="fa fa-asterisk" aria-hidden="true"></i>
              <input v-validate="'required'" v-model="newBusiness.rif" type="text" class="form-control" placeholder="Rif" :class="{'input': true, 'is-danger': errors.has('rif') }">
             <span v-show="errors.has('rif')" class="help is-danger">{{ errors.first('rif') }}</span>

            </div>
             <div class="form-group inner-addon left-addon">
               <i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
              <input v-validate="'required'" v-model="newBusiness.address" type="text" class="form-control" placeholder="Direccion" :class="{'input': true, 'is-danger': errors.has('address') }">
             <span v-show="errors.has('address')" class="help is-danger">{{ errors.first('address') }}</span>

            </div>
             <div class="form-group inner-addon left-addon">
               <i class="fa fa-envelope-o" aria-hidden="true"></i>
              <input v-validate="'required|email'" :class="{'input': true, 'is-danger': errors.has('email') }" v-model="newBusiness.email" type="text" class="form-control" placeholder="Correo Electronico" name="email">
             <span v-show="errors.has('email')" class="help is-danger">{{ errors.first('email') }}</span>

            </div>

             <div class="form-group inner-addon left-addon">
               <i class="fa fa-phone" aria-hidden="true"></i>

            <v-select :value="numero.id" v-model="newBusiness.number_telephone_id" :options="SelectNUM" placeholder="Selecciona Numero a asignar" :on-change="onChangeNUM"><span slot="no-options">Por favor inserta un nuevo numero telefonico en su modulo</span></v-select>


            </div>
             <div class="form-group inner-addon left-addon">
               <i class="fa fa-phone" aria-hidden="true"></i>
              <input v-validate="'required'" v-model="newBusiness.number_contact" type="text" class="form-control" placeholder="Numero de contacto" :class="{'input': true, 'is-danger': errors.has('number_contact') }">
             <span v-show="errors.has('number_contact')" class="help is-danger">{{ errors.first('number_contact') }}</span>

            </div>

             <div form-group inner-addon left-addon>
              <select v-model="newBusiness.state_id" class="form-control" style="display:none;">
                <option :value="e.id"  v-for="e in estado">&nbsp;{{ e.name }}</option>
              </select>
            </div>

            <div class="form-group inner-addon left-addon">
               <v-select :value="municipio.id" v-model="newBusiness.municipality_id" placeholder="Selecciona Municipio"  :options="SelectM" :on-change="onChange"></v-select>
            </div>

            <div  class="form-group inner-addon left-addon">
              <v-select :value="parroquia.id" v-model="newBusiness.parish_id"  :options="SelectP" placeholder="Selecciona Parroquia" :on-change="onChangeP"></v-select>
            </div>

            <div class="form-group inner-addon left-addon">
              <v-select :value="sector.id" v-model="newBusiness.sector_id"  :options="SelectS" placeholder="Selecciona el Sector" :on-change="onChangeS"><span slot="no-options">Por favor inserta un nuevo sector en su modulo</span></v-select>
            </div>

          </form>

        </div>
        <div slot="footer">

        <a href="#" class="btn btn-primary" v-on:click.prevent="saveBusiness()">Guardar</a>

          <a href="#" class="btn btn-default" v-on:click.prevent="showModal=false">Cerrar</a>

        </div>
      </modal>


      <modal :display="showModal1" @close="showModal1 = false">
        <div slot="header">
          <i class="fa fa-industry"></i> Actualizacion de Empresa

        </div>
        <div slot="body">
          <form class="form">
              <input v-model="editBusiness.id" type="hidden">
            <div class="form-group inner-addon left-addon">
               <i class="fa fa-industry" aria-hidden="true"></i>
              <input v-validate="'required'" v-model="editBusiness.name" type="text" class="form-control" placeholder="Nombre de la empresa" :class="{'input': true, 'is-danger': errors.has('name') }">
             <span v-show="errors.has('name')" class="help is-danger">{{ errors.first('name') }}</span>

            </div>
             <div class="form-group inner-addon left-addon">
               <i class="fa fa-asterisk" aria-hidden="true"></i>
              <input v-validate="'required'" v-model="editBusiness.rif" type="text" class="form-control" placeholder="Rif" :class="{'input': true, 'is-danger': errors.has('rif') }">
             <span v-show="errors.has('rif')" class="help is-danger">{{ errors.first('rif') }}</span>

            </div>
             <div class="form-group inner-addon left-addon">
               <i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
              <input v-validate="'required'" v-model="editBusiness.address" type="text" class="form-control" placeholder="Direccion" :class="{'input': true, 'is-danger': errors.has('address') }">
             <span v-show="errors.has('address')" class="help is-danger">{{ errors.first('address') }}</span>

            </div>
             <div class="form-group inner-addon left-addon">
               <i class="fa fa-envelope-o" aria-hidden="true"></i>
              <input v-validate="'required|email'" :class="{'input': true, 'is-danger': errors.has('email') }" v-model="editBusiness.email" type="text" class="form-control" placeholder="Correo Electronico" name="email">
             <span v-show="errors.has('email')" class="help is-danger">{{ errors.first('email') }}</span>

            </div>

             <div class="form-group inner-addon left-addon">

                              <v-select :value="numero.id" v-model="editBusiness.number_telephone_id" :options="SelectNUM" placeholder="Selecciona Numero a asignar" :on-change="onChangeNUM"><span slot="no-options">Por favor inserta un nuevo numero telefonico en su modulo</span></v-select>

            </div>
             <div class="form-group inner-addon left-addon">
               <i class="fa fa-phone" aria-hidden="true"></i>
              <input v-validate="'required'" v-model="editBusiness.number_contact" type="text" class="form-control" placeholder="Numero de contacto" :class="{'input': true, 'is-danger': errors.has('number_contact') }">
             <span v-show="errors.has('number_contact')" class="help is-danger">{{ errors.first('number_contact') }}</span>

            </div>

             <div>
              <select v-model="editBusiness.state_id" class="form-control" style="display:none;">
                <option :value="e.id"  v-for="e in estado">&nbsp;{{ e.name }}</option>
              </select>


            </div>
            <div class="form-group inner-addon left-addon">
               <v-select :value="municipio.id" v-model="editBusiness.municipality_id" placeholder="Selecciona Municipio"  :options="SelectM" :on-change="onChange"></v-select>
            </div>

            <div  class="form-group inner-addon left-addon">
              <v-select :value="parroquia.id" v-model="editBusiness.parish_id"  :options="SelectP" placeholder="Selecciona Parroquia" :on-change="onChangeP"></v-select>
            </div>

            <div class="form-group inner-addon left-addon">
              <v-select :value="sector.id" v-model="editBusiness.sector_id"  :options="SelectS" placeholder="Selecciona el Sector" :on-change="onChangeS"></v-select>
            </div>

          </form>

        </div>
        <div slot="footer">

        <a href="#" class="btn btn-primary" v-on:click.prevent="updateBusiness()">Guardar</a>

          <a href="#" class="btn btn-default" v-on:click.prevent="showModal1=false">Cerrar</a>

        </div>
      </modal>
  </div>
</div>

</template>


<script>
var getBusiness = 'business';
var postBusiness = 'business_save';

export default {

  data(){
      return {
        business: [],
        showModal:false,
        showModal1:false,
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
        sec:[],
        parro:[],
        man:[],
        munic:[],
        numero:{
          id:''
        },
        num:[],
        numberT:{
            id:'',
            code:'',
            number:'',
            status:''
        },
        newBusiness:{
          name:'',
          rif:'',
          address:'',
          email:'',
          number_telephone_id:'',
          number_contact:'',
          state_id:'7',
          municipality_id:'',
          parish_id:'',
          sector_id:''
        },
        editBusiness:{
          name:'',
          rif:'',
          address:'',
          email:'',
          number_telephone_id:'',
          number_contact:'',
          state_id:'7',
          municipality_id:'',
          parish_id:'',
          sector_id:''
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
    this.fetchBusiness(this.pagination.current_page);
    this.fetchEstado();
    this.fetchMunicipio();
    this.fetchParish();
    this.fetchN();
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
    changePage(page){
        //console.log(page);
        this.pagination.current_page = page;
        this.fetchBusiness(page);
        //this.fetchSector();
    },
    onChangeNUM(obj){
        this.numero.id = obj.value;
    },
      fetchBusiness(page){
          var data = {page: page};
         axios.get('/business?page='+ page).then(response => {


          this.business = response.data.data.data;
          this.pagination = response.data.pagination;

        });

      },
      fetchSector(){
          axios.get('sector').then(response => {
              this.sec = response.data.data.data;
          });
      },
      fetchN(){
          axios.get('numero_espera').then(response => {
            this.numero = response.data;
          });
      },
      fetchMunicipio(){
        axios.get('municipio').then(response => {
            this.munic = response.data.municipio;
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
      saveBusiness(newBusiness){
        var input = this.newBusiness;
        if(input['name'] == ''){
          this.hasError =false;
          this.hasDeleted = true;
        }
        else
        {
          //this.newAds.sleeve_id = this.manga.id;
          this.newBusiness.sector_id = this.sector.id;
          this.newBusiness.parish_id = this.parroquia.id;
          this.newBusiness.municipality_id = this.municipio.id;
            this.newBusiness.number_telephone_id = this.numero.id;
              this.hasError=true;
               axios.post(postBusiness, this.newBusiness).then(response => {
                   this.fetchBusiness();
                   this.showModal= false;

               });

        }



      },
      onEdit(b){
        var showUser = '/showBusiness/';
        var that = this;
        that.showModal1 = true;
        axios.get(showUser + b.id).then(response => {
            this.editBusiness = response.data;
            //console.log(response.data);
        });
      },
      updateBusiness(editBusiness){
        var input = this.editBusiness;
        var update = '/update_b/' + input.id;


        axios.put(update, input).then(response => {
          swal({
                title: "Success",
                text: 'Registro actualizado',
                type: 'success',
                animation: 'slide-from-bottom',
                timer: 3000
            });
            this.fetchBusiness();
            this.showModal1= false;

        });
      },
      onDelete(b){
        var that = this;
        var delBusiness = '/business_delete/';
        //console.log(delUsers + "/"+ b.id);

        swal({
          title: '¿Estas seguro de eliminar el registro?',
          text: 'Luego de eliminar no podras recuperar el registro',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Si',
          cancelButtonText: 'No'
        }).then(function(){
          axios.delete(delBusiness +  b.id).then(response => {
            //console.log("eliminado");
            that.fetchBusiness();
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

/* style icon */
.inner-addon .glyphicon {
  position: absolute;
  padding: 10px;
  pointer-events: none;
}

/* align icon */
.left-addon .glyphicon  { left:  0px;}
.right-addon .glyphicon { right: 0px;}



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
