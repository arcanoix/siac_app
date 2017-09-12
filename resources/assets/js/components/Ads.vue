<template>
  <div class="container-fluid">
    <section class="content-header">
         <h1>

           <small></small>
         </h1>
         <ol class="breadcrumb">
           <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
           <li class="active">ADS</li>
         </ol>
       </section>
<div class="tabled">
    <br>

    <h3 style="text-align: center;">ADS</h3>

    <div style="padding: 5px">

      <a class="btn-t btn-primary pull-left" href="#" v-on:click.prevent
      ="showModal=true"> <i class="fa fa-user-plus" aria-hidden="true"></i>Nueva ADS</a>

    </div>

    <!-- For markup truncated -->

    <table class="table table-striped">
      <tr  class="row-name">
        <th>#</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Cable Central</th>
        <th>Cable Local</th>
        <th>Par Central</th>
        <th>Par Local</th>
        <th>Direccion</th>

        <th>Editar</th>


      </tr>
      <tr v-for="b in ads"  class="row-content">
        <td>{{ b.id }}</td>
        <td>{{ b.name }}</td>
        <td>{{b.type_ads}} </td>
        <td>{{ b.cc }}</td>
        <td>{{b.cl}}</td>
        <td>{{b.pc}}</td>
        <td>{{b.pl}}</td>
        <td>{{b.address}}</td>


        <td v-on:click.prevent="onEdit(b)"><a class="btn-top  btn btn-primary pull-right"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
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
          <i class="fa fa-user"></i> Registro de ADS

        </div>
        <div slot="body">
          <form class="form">

            <div class="form-group inner-addon left-addon">
               <i class="fa fa-user" aria-hidden="true"></i>
              <input v-validate="'required'" v-model="newAds.name" type="text" class="form-control" placeholder="Nombre" :class="{'input': true, 'is-danger': errors.has('name') }">
             <span v-show="errors.has('name')" class="help is-danger">{{ errors.first('name') }}</span>

            </div>


             <div class="form-group inner-addon left-addon">

              <input v-validate="'required'" :class="{'input': true, 'is-danger': errors.has('type_ads') }" v-model="newAds.type_ads" type="text" class="form-control" placeholder="Tipo de Ads" name="type_ads">
             <span v-show="errors.has('type_ads')" class="help is-danger">{{ errors.first('type_ads') }}</span>

            </div>



            <div class="form-group inner-addon left-addon">

             <input v-model="newAds.address" type="text" class="form-control" placeholder="Direccion">

            </div>
            <div class="form-group inner-addon left-addon">

             <v-select :value="manga.id" v-model="newAds.sleeve_id" placeholder="Selecciona una manga"  :options="SelectMan" :on-change="onChangeM"></v-select>

            </div>


            <div class="form-group inner-addon left-addon">

               <v-select :value="municipio.id" v-model="newAds.municipality_id" placeholder="Selecciona Municipio"  :options="SelectM" :on-change="onChange"></v-select>


            </div>

            <div  class="form-group inner-addon left-addon">


              <v-select :value="parroquia.id" v-model="newAds.parish_id"  :options="SelectP" placeholder="Selecciona Parroquia" :on-change="onChangeP"></v-select>

            </div>

            <div class="form-group inner-addon left-addon">

              <v-select :value="sector.id" v-model="newAds.sector_id"  :options="SelectS" placeholder="Selecciona el Sector" :on-change="onChangeS"></v-select>

            </div>

            <div class="form-group col-md-3">
             <input v-model="newAds.cc" maxlength="3" type="text" class="form-control" placeholder="Cable central">
            </div>

            <div class="form-group  col-md-3">

             <input v-model="newAds.cl" maxlength="3" type="text" class="form-control" placeholder="cable local">

            </div>
            <div class="form-group col-md-3">

             <input v-model="newAds.pc" maxlength="3" type="text" class="form-control" placeholder="Par central">

            </div>
            <div class="form-group col-md-3">

             <input v-model="newAds.pl" maxlength="3" type="text" class="form-control" placeholder="Par local">

            </div>

            <div>

             <input v-model="newAds.state_id" type="hidden"  placeholder="ID estado">
              <input v-model="newAds.coord_x" type="hidden"  placeholder="coordenada x">
              <input v-model="newAds.coord_y" type="hidden"  placeholder="coordenada y">
            </div>


          </form>

        </div>
        <div slot="footer">

        <a href="#" class="btn btn-primary" v-on:click.prevent="saveAds()">Guardar</a>

          <a href="#" class="btn btn-default" v-on:click.prevent="showModal=false">Cerrar</a>

        </div>
      </modal>

<!-- -->


      <modal :display="showModal1" @close="showModal1 = false">
        <div slot="header">
          <i class="fa fa-user"></i> Actualizacion de ADS

        </div>
        <div slot="body">
          <form class="form">

            <div class="form-group inner-addon left-addon">
               <i class="fa fa-user" aria-hidden="true"></i>
              <input v-validate="'required'" v-model="editAds.name" type="text" class="form-control" placeholder="Nombre" :class="{'input': true, 'is-danger': errors.has('name') }">
             <span v-show="errors.has('name')" class="help is-danger">{{ errors.first('name') }}</span>

            </div>


             <div class="form-group inner-addon left-addon">
               <i class="fa fa-envelope" aria-hidden="true"></i>
              <input v-validate="'required'" :class="{'input': true, 'is-danger': errors.has('type_ads') }" v-model="editAds.type_ads" type="text" class="form-control" placeholder="Tipo de Ads" name="type_ads">
             <span v-show="errors.has('type_ads')" class="help is-danger">{{ errors.first('type_ads') }}</span>

            </div>



            <div class="form-group inner-addon left-addon">
             <i class="fa fa-key" aria-hidden="true"></i>
             <input v-model="editAds.address" type="text" class="form-control" placeholder="Direccion">
            </div>

            <div class="form-group inner-addon left-addon">
             <v-select :value="manga.id" v-model="editAds.sleeve_id"  :options="SelectMan" :on-change="onChangeM"></v-select>
            </div>


            <div class="form-group inner-addon left-addon">
               <v-select :value="municipio.id" v-model="editAds.municipality_id"  :options="SelectM" :on-change="onChange"></v-select>
            </div>

            <div  class="form-group inner-addon left-addon">
              <v-select :value="parroquia.id" v-model="editAds.parish_id"  :options="SelectP" :on-change="onChangeP"></v-select>
            </div>

            <div class="form-group inner-addon left-addon">
              <v-select :value="sector.id" v-model="editAds.sector_id"  :options="SelectS" :on-change="onChangeS"></v-select>
            </div>

            <div class="form-group col-md-3">
             <input v-model="editAds.cc" type="text" class="form-control" placeholder="Cable central">
            </div>

            <div class="form-group col-md-3">
             <i class="fa fa-key" aria-hidden="true"></i>
             <input v-model="editAds.cl" type="text" class="form-control" placeholder="cable local">
            </div>

            <div class="form-group col-md-3">
             <i class="fa fa-key" aria-hidden="true"></i>
             <input v-model="editAds.pc" type="text" class="form-control" placeholder="Par central">
            </div>

            <div class="form-group col-md-3">
             <i class="fa fa-key" aria-hidden="true"></i>
             <input v-model="editAds.pl" type="text" class="form-control" placeholder="Par local">
            </div>

            <div>

             <input v-model="editAds.state_id" type="hidden"  placeholder="ID estado">
             <input v-model="editAds.coord_x" type="hidden"  placeholder="coordenada x">
             <input v-model="editAds.coord_y" type="hidden"  placeholder="coordenada y">

            </div>

          </form>

        </div>
        <div slot="footer">

        <a href="#" class="btn btn-primary" v-on:click.prevent="updateAds()">Guardar</a>

          <a href="#" class="btn btn-default" v-on:click.prevent="showModal1=false">Cerrar</a>

        </div>
      </modal>






  </div>
</div>

</template>


<script>

import Vue from 'vue';
import vSelect from 'vue-select'

Vue.component('v-select', vSelect)

var getAds = 'ads';
var postAds = 'ads_save';

export default {

  data(){
      return {
        ads: [],
        showModal:false,
        showModal1:false,
        municipio:{
          id:''
        },
        manga:{
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
        newAds:{
          name:'',
          type_ads:'',
          cc:'',
          cl:'',
          pc:'',
          pl:'',
          address:'',
          sleeve_id:'',
          state_id:7,
          municipality_id:'',
          parish_id:'',
          sector_id:'',
          coord_x:10,
          coord_y:15
        },
        editAds:{
          name:'',
          type_ads:'',
          cc:'',
          cl:'',
          pc:'',
          pl:'',
          address:'',
          sleeve_id:'',
          state_id:7,
          municipality_id:'',
          parish_id:'',
          sector_id:'',
          coord_x:10,
          coord_y:15
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
    this.fetchAds(this.pagination.current_page);
    this.fetchManga();
    this.fetchSector();
    this.fetchParroquia();
    this.fetchMunicipio();

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
      SelectMan(){
        return this.man.map(g =>(
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
    onChangeM(obj){
        this.manga.id = obj.value;
    },
    onChangeP(obj){
        this.parroquia.id = obj.value;
    },
    onChangeS(obj){
        this.sector.id = obj.value;
    },
      fetchAds(page){
        var data = {page: page};

         axios.get('/ads?page=' + page).then(response => {
            //this.ads = response.data.ads;
            this.ads = response.data.data.data;
            this.pagination = response.data.pagination;
        });

      },
      changePage(page){
          //console.log(page);
          this.pagination.current_page = page;
          this.fetchAds(page);
      },
      fetchManga(){
        axios.get('manga').then(response => {
              this.man = response.data.data.data;

        });
      },
      fetchSector(){
        axios.get('sector').then(response => {
            this.sec = response.data.sector;
        });
      },
      fetchParroquia(){
        axios.get('parroquia').then(response => {
            this.parro = response.data;
        });
      },
      fetchMunicipio(){
        axios.get('municipio').then(response => {
            this.munic = response.data.municipio;
        });
      },
      saveAds(newAds){
        var input = this.newAds;
        if(input['name'] == ''){
          this.hasError =false;
          this.hasDeleted = true;
        }
        else
        {
              this.newAds.sleeve_id = this.manga.id;
              this.newAds.sector_id = this.sector.id;
              this.newAds.parish_id = this.parroquia.id;
              this.newAds.municipality_id = this.municipio.id;

              this.hasError=true;
               axios.post(postAds, this.newAds).then(response => {

               this.fetchAds();
               this.showModal = false;
               });
        }
      },
      onEdit(b){
        var showUser = '/showAds/';
        var that = this;
        that.showModal1 = true;
        axios.get(showUser + b.id).then(response => {
            this.editAds = response.data;
        });

      },
      updateAds(editAds){
        var input = this.editAds;
        var update = '/update_a/' + input.id;
        axios.put(update, input).then(response => {
          swal({
                title: "Success",
                text: 'Mailing List updated',
                type: 'success',
                animation: 'slide-from-bottom',
                timer: 3000
            });
            this.fetchAds();
            this.showModal1= false;
        });
      },
      onDelete(b){
        var that = this;
        var delAds = '/ads_delete/';
        //console.log(delUsers + "/"+ b.id);

        swal({
          title: '¿Estas seguro de eliminar el registro?',
          text: 'Luego de eliminar no podras recuperar el registro',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Si',
          cancelButtonText: 'No'
        }).then(function(){
          axios.delete(delAds +  b.id).then(response => {
            //console.log("eliminado");
            that.fetchAds();
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
