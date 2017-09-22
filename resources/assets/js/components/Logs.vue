<template>

	<div class="container-fluid">
		
		<section class="content-header">
         <h1>

           <small></small>
         </h1>
         <ol class="breadcrumb">
           <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
           <li class="active">LOGS</li>
         </ol>
       </section>
       <div class="tabled">
    <br>

    <h3 style="text-align: center;">Logs</h3>

    <div style="padding: 5px">
      Busqueda por fecha:
       <form class="form-inline" role="search">
                          
                          <div class="form-group">
                            <div id="from" class="input-append input-group dtpicker">
                              <input data-format="yyyy-MM-dd" type="text" class="form-control" placeholder="from" v-model="findlog.date1" required>
                              <span class="input-group-addon add-on">
                                <i  data-date-icon="fa fa-calendar"></i>
                              </span>
                            </div>
                          </div>
                          <div class="form-group">
                            <div id="to" class="input-append input-group dtpicker">
                              <input data-format="yyyy-MM-dd" type="text" class="form-control" placeholder="to" v-model="findlog.date2" required>
                              <span class="input-group-addon add-on">
                                <i  data-date-icon="fa fa-calendar"></i>
                              </span>
                            </div>
                          </div>
                          <div class="form-group">
                            <a class="btn btn-primary" v-on:click.prevent="getLogs()">buscar</a>
                            <a href="#" class="btn btn-danger" v-on:click.prevent="fetchlogs()">Reset</a>
                          </div>
                        </form>
      
     
    </div>

    <!-- For markup truncated -->

    <table class="table table-striped">
      <tr  class="row-name">
        <th>#</th>
        <th>Usuario</th>
        <th>Actividad</th>
        <th>Ip</th>
        <th>Fecha</th>
        


      </tr>
      <tr v-for="b in logs"  class="row-content">
        <td>{{ b.id }}</td>
        <td>{{ b.user.nombre }}</td>
        <td>{{ b.text }} </td>
        <td>{{ b.ip_address }}</td>
        <td>{{ b.created_at }}</td>


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

     


  </div>
	</div>
</template>

<script>
export default {
  data () {
    return {
      logs:[],
      findlog:{
         date1:'',
         date2:''
      },
      
      find:'',
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
    this.fetchlogs(this.pagination.current_page)
    

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
    fetchlogs(page){
      this.findlog.date1 = ''
      this.findlog.date2 = ''
      axios.get('/log?page=' + page).then(response => {
        //console.log(response.data)
        this.logs = response.data.data.data;
        this.pagination = response.data.pagination;
      })
    },
    findLog(findlog){
          axios.post('buscar_logs', this.findlog).then(response => {
            //console.log(response.data)
             this.fetchlogs()
          })
    },

    getLogs(findlog){

      axios.get('/buscar_logs/'+ this.findlog.date1 + '/' + this.findlog.date2).then(response => {
        //console.log(response.data)
        this.logs = response.data.data.data;
        this.pagination = response.data.pagination;
      }).catch(error => {
        console.log(error)
      })
    },
    changePage(page){
          //console.log(page);
          this.pagination.current_page = page;
          this.fetchlogs(page);
      }
    
  }
};
</script>

<style lang="css" scoped>

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