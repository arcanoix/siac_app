<template>
				<div class="row col-md-6 col-md-offset-3">
		
		<div class="alert alert-danger" v-if="error">
			{{ responseMessage }}
		</div>

		<div class="alert alert-success" v-if="success">
			{{ responseMessage }}
		</div>

		<form @submit.prevent="handleSubmit">

		
			<div class="form-group">
				<label for="">Email</label>
				<input type="text" class="form-control" id="" placeholder="email" v-model="authenticate.email">
			</div>

			<div class="form-group">
				<label for="password">password</label>
				<input type="password" name="password" id="password" class="form-control" placeholder="password" v-model="authenticate.password">
			</div>
		
			
			<button type="submit" class="btn btn-primary">login</button>
		</form>
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