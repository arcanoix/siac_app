<template>
  <div class="container-fluid">
    <section class="content-header">
         <h1>

           <small></small>
         </h1>
         <ol class="breadcrumb">
           <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
           <li class="active">Sector</li>
         </ol>
       </section>
  <div class="tabled">
    <br>

    <h3 style="text-align: center;">Sector</h3>

    <div style="padding: 5px">

      <a class="btn-t btn-primary pull-left" href="#" v-on:click.prevent
      ="showModal=true"> <i class="fa fa-user-plus" aria-hidden="true"></i>Nuevo Sector</a>

    </div>

    <!-- For markup truncated -->

    <table class="table table-striped">
      <tr  class="row-name">
        <th>#</th>
        <th>Sector</th>
        <th>Parroquia</th>
        <th>Editar</th>


      </tr>
      <tr v-for="b in sector"  class="row-content">
        <td>{{ b.id }}</td>
        <td>{{ b.name }}</td>
        <td>{{b.parroquia.name}}</td>


        <td><a class="btn-top  btn btn-primary"  v-on:click.prevent="onEdit(b)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
       <!-- <td>
          <a class="btn-top btn btn-danger  pull-right"  v-on:click.prevent="onDelete(b)"><i class="fa fa-trash" aria-hidden="true"></i></a>
        </td>-->
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

  <!-- Modal Create User -->

      <modal :display="showModal" @close="showModal = false">
        <div slot="header">
          <i class="fa fa-user"></i> Registro de Sector

        </div>
        <div slot="body">
          <form class="form">

            <div  class="form-group inner-addon left-addon">
              <v-select :value="parroquia.id" v-model="newSector.parish_id" placeholder="Seleccione Parroquia"  :options="SelectP" :on-change="onChangeP"><span slot="no-options">Por favor registre una parroquia en su modulo</span></v-select>
            </div>


             <div class="form-group inner-addon left-addon">

              <input v-validate="'required'" :class="{'input': true, 'is-danger': errors.has('name') }" data-vv-name="name" v-model="newSector.name" type="text" class="form-control" placeholder="Nombre del sector" name="name">
             <span v-show="errors.has('name')" class="help is-danger">{{ errors.first('name') }}</span>

            </div>

            <input type="hidden" v-model="newSector.codigo_postal">


          </form>

        </div>
        <div slot="footer">

        <a href="#" class="btn btn-primary" v-on:click.prevent="saveUser()">Guardar</a>

          <a href="#" class="btn btn-default" v-on:click.prevent="showModal=false">Cerrar</a>

        </div>
      </modal>

      <!-- end form modal create user -->

      <!-- form edit user data modal -->
      <modal :display="showModal1" @close="showModal1 = false">
        <div slot="header">
          <i class="fa fa-user"></i> Editar Sector

        </div>
        <div slot="body">
          <form class="form">
              <input v-model="editSector.id" type="hidden">

            <div class="form-group inner-addon left-addon">
               <i class="fa fa-user" aria-hidden="true"></i>
               <input v-validate="'required'" data-vv-name="name" v-model="editSector.name" type="text" class="form-control" placeholder="Nombre de Usuario" :class="{'input': true, 'is-danger': errors.has('name') }">
             <span v-show="errors.has('name')"  class="help is-danger">{{ errors.first('name') }}</span>
            </div>

                <input type="hidden" v-model="editSector.codigo_postal">

          </form>

        </div>
        <div slot="footer">

        <a href="#" class="btn btn-primary" v-on:click.prevent="updateSector()">Guardar</a>

          <a href="#" class="btn btn-default" v-on:click.prevent="showModal1=false">Cerrar</a>

        </div>
      </modal>
      <!-- end form modal edit -->


  </div>
  </div>
</template>

<script>
export default {
    data(){
      return{
        sector:[],
        showModal1:false,
        showModal:false,
        parroquia:{
          id:''
        },
          parro:[],
          newSector:{
            name:'',
            parish_id:'',
            codigo_postal:2222
          },
          editSector:{
            name:'',
            parish_id:'',
            codigo_postal:2222
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
      this.fetchParroquia();
      this.fetchSector(this.pagination.current_page);
    },
    computed:{
      SelectP(){
        return this.parro.map(g =>(
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
      changePage(page){
          //console.log(page);
          this.pagination.current_page = page;
          this.fetchSector(page);
      },

      onChangeP(obj){
          this.parroquia.id = obj.value;
      },
      fetchParroquia(){
        axios.get('parroquia').then(response => {
            this.parro = response.data;
        });
      },
      fetchSector(page){
        axios.get('/sector?page='+ page).then(response => {
          //  this.sector = response.data.sector;
            this.sector = response.data.data.data;
            this.pagination = response.data.pagination;
        });
      },
      onEdit(b){
        var showUser = '/show_s/';
        var that = this;
        that.showModal1 = true;
        axios.get(showUser + b.id).then(response => {
            this.editSector = response.data;
        });
      },
      updateSector(editSector){
        var input = this.editSector;
        var update = '/update_s/' + input.id;
        axios.put(update, input).then(response => {
          swal({
                title: "Success",
                text: 'Registro actualizado',
                type: 'success',
                animation: 'slide-from-bottom',
                timer: 3000
            });
            this.fetchSector();
            this.showModal1= false;
        });
      },
      saveUser(newSector){
        var input = this.newSector;

        if(input['name'] == ''){
          this.hasError =false;
          this.hasDeleted = true;
        }
        else
        {
              this.newSector.parish_id = this.parroquia.id;
              this.hasError=true;
               axios.post('save_sector', this.newSector).then(response => {

               this.fetchSector();
               this.showModal = false;
               });

        }

      }
    }
}
</script>

<style>
</style>
