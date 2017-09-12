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


    <br>

  <!-- Modal Create User -->

      <modal :display="showModal" @close="showModal = false">
        <div slot="header">
          <i class="fa fa-user"></i> Registro de Sector

        </div>
        <div slot="body">
          <form class="form">

            <div class="form-group inner-addon left-addon">
               <i class="glyphicon glyphicon-globe" aria-hidden="true"></i>
                  <select v-model="newSector.parish_id" class="form-control">
                    <option :value="p.id"  v-for="p in parish">&nbsp; {{ p.name }}</option>

                  </select>
                   <span v-show="errors.has('parish_id')" class="help is-danger">{{ errors.first('parish_id') }}</span>

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

        <a href="#" class="btn btn-primary" v-on:click.prevent="updateUser()">Guardar</a>

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
        parish:{
          id:'',
          name:''
        },
          newSector:{
            name:'',
            parish_id:'',
            codigo_postal:2222
          },
          editSector:{
            name:'',
            parish_id:'',
            codigo_postal:2222
          }
      }
    },
    created(){
      this.fetchParroquia();
      this.fetchSector();
    },
    methods:{
      fetchParroquia(){
        axios.get('parroquia').then(response => {
            this.parish = response.data;
        });
      },
      fetchSector(){
        axios.get('sector').then(response => {
            this.sector = response.data.sector;
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
