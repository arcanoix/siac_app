 @extends('admin.partials.base')

 @section('content')
            <div class="container">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">

                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">SIAC</a>

                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav">




                            </ul>
                            <h3 style="text-align: right;">Sistema de Identificación de Averias | CANTV</h3>
                        </div><!-- /.navbar-collapse -->
                    </div>
                </nav>


                <div class="wrapper">
                  <Users></Users>

                </div>
            </div>
        </div>

 @endsection
