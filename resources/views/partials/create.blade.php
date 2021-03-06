<form method="POST" v-on:submit.prevent="createContact">
	
	<div class="modal fade" id="create">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal">
						<span>&times;</span>
					</button>

					<h4>Create</h4>

				</div>

				<div class="modal-body">
					<label for="name">New Contact</label>
					<input type="text" name="name" class="form-control" v-model="newContact.name" placeholder="Name:">
					<input type="text" name="surname" class="form-control" v-model="newContact.surname" placeholder="Surname:">
					<input type="text" name="email" class="form-control" v-model="newContact.email" placeholder="Email:">
					<input type="text" name="phone_number" class="form-control" v-model="newContact.phone_number" placeholder="Phone number:">
					<datepicker name = "birthday" v-model="newContact.birthday"></datepicker>
					<span v-for="error in errors" class="text-danger">@{{ error }}</span>
				</div>

				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" value="Add">
				</div>
				
			</div>
		</div>
	</div>
</form>