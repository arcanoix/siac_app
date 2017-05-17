<template>
		
	
	<div class="row col-md-6 col-md-offset-3">
			  <br>
			  <br>
			  <br>

			    <div class="alert alert-danger" v-if="error">
					{{ responseMessage }}
		    	</div>

				<div class="alert alert-success" v-if="success">
					{{ responseMessage }}
				</div>

			  <h1>Acceso</h1>
				 

			  <form @submit.prevent="handleSubmit">
			  	
			    <input type="email" name="email" placeholder="Usuario" v-model="authenticate.email" required/>
				
				<input type="password" name="password" placeholder="Contraseña" v-model="authenticate.password" required/>

				   		 <a href="menu.html">Accesar</a>
				   		 <button type="submit" class="btn btn-primary">login</button>
						    
						    <div id="remember-container">
						       <span id="forgotten">Olvide contraseña</span>
						    </div>
			</form>


			<!-- Forgotten Password Container -->
			<div id="forgotten-container">
			   <h1>Olvide clave</h1>
			  <span class="close-btn">
			    <img href="image/circle_close_delete_-128.png">
			  </span>

			  <form>
			    <input type="email" name="email" placeholder="E-mail">
			    <a href="#" class="orange-btn">Get new password</a>
			</form>
			</div>
</div>
</template>

<script>
	
	import { loginUrl } from '../config.js'
	export default {
		data() {
			return {
				error : false,
				success : false,
				errorMessage : '',
				authenticate : {
					email : '',
					password : ''
				}
			}
		},
		methods : {
			handleSubmit() {
				let authenticate = {
					email : this.authenticate.email,
					password : this.authenticate.password
				}
				this.$http.post(loginUrl, authenticate)
					.then(response => {
						console.log(response)
						this.error = false
						this.success = true
						localStorage.setItem('token', response.body.token);
						this.responseMessage = response.statusText
						this.$router.push({ path : 'home' })
					})
					.catch(error => {
						alert(123)
						console.log(error)
						this.error = true
						this.success = false
						this.responseMessage = error.statusText
					})
			}
		}
	}
</script>