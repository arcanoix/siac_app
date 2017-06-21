<template>

<div class="tabled">
    <br>

    <h3 style="text-align: center;">Usuarios</h3>

    <div style="padding: 5px">
      <a href="#" class="btn-t btn btn-success pull-right"> <i class="fa fa-chevron-left" aria-hidden="true"></i>Regresar</a>
      <a class="btn-t btn-primary pull-left" href="#" @click="showModal"> <i class="fa fa-user-plus" aria-hidden="true"></i>Nuevo Usuario</a>
    </div>

    <!-- For markup truncated -->

    <table class="table table-striped">
      <tr  class="row-name">
        <th>#</th>
        <th>Usuario</th>
        <th>Rol</th>
        <th>Email</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
      <tr v-for="b in users"  class="row-content">
        <td>{{ b.id }}</td>
        <td>{{ b.name }}</td>
        <td> - </td>
        <td>{{ b.email }}</td>


        <td v-on:click.prevent="onEdit(index)"><a class="btn-top  btn btn-primary pull-right"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
        <td v-on:click.prevent="onDelete(index)"><a class="btn-top btn btn-danger  pull-right"> <i class="fa fa-trash" aria-hidden="true"></i></a></td>
      </tr>
    </table>
    <br>

    <div>

    </div>

  </div>

</template>

<script>
export default {

  data(){
      return {
        users: [],

      }
  },
  created(){
    this.fetchUsers();
  },
  methods:{
      fetchUsers(){
        this.$http.get('/users').then(response => {
            this.users = response.data.users;
        });
      }
  }
}
</script>


<style>

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
