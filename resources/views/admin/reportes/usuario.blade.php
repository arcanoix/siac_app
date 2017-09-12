<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Reporte de fallas Siac">
    <meta name="author" content="SIAC">

    <title>Falla Report PDF</title>

    <!-- Bootstrap CSS -->
    <!-- Bootstrap 3.3.6 -->
    <style>

.col-md-12 {
   width: 100%;
}

.box {
   position: relative;
   border-radius: 3px;
   background: #ffffff;
   border-top: 3px solid #d2d6de;
   margin-bottom: 10px;
   width: 100%;
   box-shadow: 0 1px 1px rgba(0,0,0,0.1);
   background-color: #ECF0F5;
}

.box-header {
   color: #444;
   display: block;
   padding: 10px;
   position: relative;
}

.box-header.with-border {
   border-bottom: 1px solid #f4f4f4;
}


.box-header .box-title {
   display: inline-block;
   font-size: 18px;
   margin: 0;
   line-height: 1;
}

.box-body {
   border-top-left-radius: 0;
   border-top-right-radius: 0;
   border-bottom-right-radius: 3px;
   border-bottom-left-radius: 3px;
   padding: 10px;

}


.box-footer {
   border-top-left-radius: 0;
   border-top-right-radius: 0;
   border-bottom-right-radius: 3px;
   border-bottom-left-radius: 3px;
   border-top: 1px solid #f4f4f4;
   padding: 10px;
   background-color: #fff;
}


.table-bordered {
   border: 2px solid black;
}


.table {
   width: 100%;
   max-width: 100%;
   margin-bottom: 10px;
}

table {
   background-color: transparent;
}

.table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
   border: 1px solid white;
}

</style>


  </head>

  <body>
    <div class="container-fluid">
      <div class="row">
        <main class="col-sm-12 pt-3">
            <div class="box">
                <div class="col-md-12">
                    <div class="box-header with-border">
                        <h1 class="box-title">Usuarios del Sistema</h1>
                        <div class="box-body">
                            @if (!$usuarios->isEmpty())
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Nombre</th>
                                      <th>Email</th>
                                      <th>Estatus</th>



                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($usuarios as $deliveryReport)
                                        <tr>
                                          <td>{{ $deliveryReport->id }}</td>
                                          <td>{{ $deliveryReport->name }}</td>
                                          <td>{{ $deliveryReport->email }}</td>
                                          <td>{{ $deliveryReport->status }}</td>



                                        </tr>
                                        @endforeach
                                  </tbody>
                                </table>


                            @endif
                              <br>
                            SIAC | 2017

                        </div>
                    </div>
                </div>
            </div>
        </main>
      </div>
    </div>
  </body>
</html>
