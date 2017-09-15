<template>
	<div class="container-fluid">
	<div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{ user }}</div>
                                        <div>Usuarios!</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{ cliente }}</div>
                                        <div>Clientes</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-link fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{ falla }}</div>
                                        <div>Fallas!</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-font fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{ ads}}</div>
                                        <div>ADS</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                     <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-xs-12">

                                       <gmap-map
																			  :center="{lat:10.1, lng:-67.9}"
																			  :zoom="8"
																			  map-type-id="terrain"
																			  style="width: 900px; height: 300px"
																			>
																			<gmap-marker
																	      :key="index"
																	      v-for="(m, index) in markers"
																	      :position="m.position"
																	      :clickable="true"
																	      :draggable="true"
																	      @click="center=m.position"
																	    ></gmap-marker>

																			</gmap-map>


																		</div>
                                </div>
                      </div>
											<br>

											<div class="col-xs-12" style="padding-top:19px;">
													<div class="panel panel-blank">
															<div class="panel-heading">
																	<h1 class="panel-title">Grafico De Fallas</h1>
																	<div class="row">
																			<div class="col-xs-12">

																				<gra></gra>
																			</div>
																	</div>
															</div>

													</div>
											</div>

											<div class="col-xs-12" style="padding-top:19px;">
	                        <div class="panel panel-blank">
	                            <div class="panel-heading">
																	<h1 class="panel-title">Graficos de Fallas</h1>
	                                <div class="row">
	                                    <div class="col-xs-12">
																					<grafica></grafica>

	                                    </div>
	                                </div>
	                            </div>

	                        </div>
	                    </div>

                </div>
	</div>

</template>

<script>
var getDash = 'dashboard';
import Vue from 'vue'
import * as VueGoogleMaps from 'vue2-google-maps'
import grafica from './graph.js'
import Gra from './grafica.js'



Vue.use(VueGoogleMaps, {
    load:{
        key: 'AIzaSyCEyxtNeLPsOWjABwIKLWrA4gDnm0sRUv0'
    }
});


	export default {
		components:{grafica, Gra},
		data(){
			return{

					cliente:[],
          mapName:'',
					user:[],
					falla:[],
					ads:[],
		      zoom:7,
          center:{
              lat:10.0,
              lng:-67.9
              },
         markers: [
					 	{
          		position: {
								lat: 10.0,
								 lng: -67.9
							}
        		},
				 		{
          		position: {
								lat: 10.0,
								 lng: -67.7
							}
        		}
					]
				}
		},

		created(){
			this.fetchDash();

		},

		methods:{
				getDevices(){
					axios.get('grafica').then(response => {
						console.log(reponse.data);
					})
			},
			fetchDash(){
				axios.get(getDash).then(response => {
						this.user = response.data.user;
						this.cliente = response.data.cliente;
						this.falla = response.data.falla;
						this.ads = response.data.ads;

				});
			},

        }
	}
</script>
<style>
map {
    width: 100%;
    height: 600px;
    display: block;
}

.panel-red{
	background-color: #FF9933 ;
}
</style>
