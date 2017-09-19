<template>
  <div class="container-fluid">
    <section class="content-header">
         <h1>

           <small></small>
         </h1>
         <ol class="breadcrumb">
           <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
           <li class="active">Usuarios</li>
         </ol>
       </section>
<div class="tabled">
    <br>

    <h3 style="text-align: center;">Usuarios</h3>

    <div style="padding: 5px">

      <a class="btn-t btn-primary pull-left" href="#" v-on:click.prevent
      ="showModal=true"> <i class="fa fa-user-plus" aria-hidden="true"></i>Nuevo Usuario</a>

    </div>

    <!-- For markup truncated -->

    <table class="table table-striped">
      <tr  class="row-name">
        <th>#</th>
        <th>Usuario</th>
        <th>Rol</th>
        <th>Estatus</th>
        <th>Email</th>
        <th>Editar</th>


      </tr>
      <tr v-for="b in users"  class="row-content">
        <td>{{ b.id }}</td>
        <td>{{ b.nombre }}</td>
        <td v-if="b.roles[0]">{{ b.roles[0].name }}</td>
        <td v-else>Sin rol Asignado</td>
        <td>{{ b.status }}</td>
        <td>{{ b.email }}</td>


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
          <i class="fa fa-user"></i> Registro de Usuario

        </div>
        <div slot="body">
          <form class="form">

            <div class="form-group inner-addon left-addon">
               <i class="fa fa-user" aria-hidden="true"></i>
              <input v-validate="'required'" data-vv-name="nombre" v-model="newUser.nombre" type="text" class="form-control" placeholder="Nombre de Usuario" :class="{'input': true, 'is-danger': errors.has('nombre') }">
             <span v-show="errors.has('nombre')"  class="help is-danger">{{ errors.first('nombre') }}</span>

            </div>
             <div class="form-group inner-addon left-addon">
               <i class="fa fa-envelope" aria-hidden="true"></i>
              <input v-validate="'required|email'" :class="{'input': true, 'is-danger': errors.has('email') }" data-vv-name="email" v-model="newUser.email" type="text" class="form-control" placeholder="Correo Electronico" name="email">
             <span v-show="errors.has('email')" class="help is-danger">{{ errors.first('email') }}</span>

            </div>
            <div class="form-group inner-addon left-addon">
             <i class="fa fa-key" aria-hidden="true"></i>
             <input v-model="newUser.pass" type="password" class="form-control" placeholder="Contraseña">

            </div>

            <div class="form-group inner-addon left-addon">
              
              <select v-model="newUser.status" class="form-control">
                <option>Activo</option>
                <option>Inactivo</option>
              </select>
            </div>


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
          <i class="fa fa-user"></i> Editar Usuario

        </div>
        <div slot="body">
          <form class="form">
              <input v-model="editUser.id" type="hidden">

            <div class="form-group inner-addon left-addon">
               <i class="fa fa-user" aria-hidden="true"></i>
               <input v-validate="'required'" data-vv-name="nombre" v-model="editUser.nombre" type="text" class="form-control" placeholder="Nombre de Usuario" :class="{'input': true, 'is-danger': errors.has('nombre') }">
             <span v-show="errors.has('nombre')"  class="help is-danger">{{ errors.first('nombre') }}</span>
            </div>
             <div class="form-group inner-addon left-addon">
               <i class="fa fa-envelope" aria-hidden="true"></i>
               <input v-validate="'required|email'" :class="{'input': true, 'is-danger': errors.has('email') }" data-vv-name="email" v-model="editUser.email" type="text" class="form-control" placeholder="Correo Electronico" name="email">
             <span v-show="errors.has('email')" class="help is-danger">{{ errors.first('email') }}</span>
            </div>
            <div class="form-group inner-addon left-addon">
             <i class="fa fa-key" aria-hidden="true"></i>
             <input v-model="editUser.pass" type="password" class="form-control" placeholder="Contraseña">
            </div>

            <div class="form-group inner-addon left-addon">
             <select class="form-control" v-model="editUser.role_id">
                  <option  v-for="rol in role" :value="rol.id">{{rol.name}}</option>

              </select>
            </div>
            <div class="form-group inner-addon left-addon">
                
               <select  v-model="editUser.status" class="form-control">
                 <option value="Activo">Activo</option>
                 <option value="Inactivo">Inactivo</option>
               </select>
               </div>

               <div class="form-group inner-addon left-addon">
                <div class="col-md-2">
                    <img :src="avatar"  class="img-responsive">
                </div>

                  <div class="col-md-8">
                      <input type="file" v-on:change="onFileChange" class="form-control">
                  </div>
               </div>

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
var getUsers = '/users';
var postUsers = '/users_save';

export default {

  data(){
      return {
        users: [],
        roles:[],
        role:{
          id:'',
          rol:''
       },
       avatar:'',
        showModal:false,
        showModal1:false,
        editUser:{
            nombre:'',
            pass:'',
            email:'',
            status:'',
            role_id:''
        },
        newUser:{
          nombre:'',
          pass:'',
          email:'',
          status:'',
          avatar:''
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
  ready(){
    this.fetchUsers(this.pagination.current_page);
  },
  created(){
    this.fetchUsers(this.pagination.current_page);

  },
  computed:{
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
      fetchUsers(page)
      {
        var data = {page: page};
         axios.get('/users?page='+ page).then(response => {
           //console.log(getUsers, data);
            this.users = response.data.data.data;
            this.pagination = response.data.pagination;
            this.role = response.data.role;
            console.log(response.data);
          //  console.log(response.data.pagination);
          //  this.$set('users', response.data.data.data);
            //this.$set('pagination', response.data.pagination);
            //console.log(response.data.role);

        });

      },
      changePage(page){
          //console.log(page);
          this.pagination.current_page = page;
          this.fetchUsers(page);
      },
      onFileChange(e){
              let files = e.target.files || e.dataTransfer.files;
               if (!files.length)
                   return;
               this.createImage(files[0]);

           },
           createImage(file){
              //console.log(file.name);
             // var formData = new FormData();
              //formData.append('avatar', this.file);

             let reader = new FileReader();
              let vm = this;
              reader.onload = (e) => {
                vm.avatar = e.target.result;

              };
              reader.readAsDataURL(file);

               // console.log(reader.readAsDataURL(file));
            },

      saveUser(newUser)
      {
        var input = this.newUser;
        var nombre = input['nombre']
        var email = input['email']
        var password = input['password']
        var status = input['status']

        

        if((nombre && email && password && status) == ""){
         
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
               this.hasError=true;
               this.showModal=true;
               axios.post(postUsers, this.newUser).then(response => {

                   swal({
                title: "Success",
                text: 'Registro Guardado',
                type: 'success',
                animation: 'slide-from-bottom',
                timer: 3000
            });
                   
                 this.fetchUsers();
                 this.showModal=false;
               });
        }

      },
      onDelete(b)
      {
        var that = this;
        var delUsers = '/users_del/';
        //console.log(delUsers + "/"+ b.id);

        swal({
          title: '¿Estas seguro de eliminar el registro?',
          text: 'Luego de eliminar no podras recuperar el registro',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Si',
          cancelButtonText: 'No'
        }).then(function(){
          axios.delete(delUsers +  b.id).then(response => {
            //console.log("eliminado");
            that.fetchUsers();
          });
        })

      },
      onEdit(b){
        var showUser = '/showUser/';
        var that = this;
        that.showModal1 = true;
        axios.get(showUser + b.id).then(response => {
            this.editUser = response.data;
            console.log(response.data)
        });

      },
      updateUser(editUser){
        var input = this.editUser;
        var update = '/update_user/' + input.id;
        this.editUser.avatar = this.avatar;

        axios.put(update, input).then(response => {
          swal({
                title: "Success",
                text: 'Registro actualizado',
                type: 'success',
                animation: 'slide-from-bottom',
                timer: 3000
            });
            this.fetchUsers();
            this.showModal1= false;

        });

      }
    }
}
</script>


<style>

.rojo { background: red; }
.azul { background: blue; }

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
.imagen{
        max-height: 36px;
    }

</style>
