
/**
 * Load all of this project's JavaScript dependencies.
 */

require('./bootstrap');

window.Vue = require('vue');

import datepicker from 'vue-date'

/**
 * Create a fresh Vue application instance.
 */

const App = new Vue({

	el: '#target',

	created: function() {

		this.getContacts();

	},

	data: {

		contacts: [],
		newContact: {'name': '', 'surname': '', 'email': '', 'phone_number': '', 'birthday': ''},
		fillContact: {'id': '', 'name': '', 'surname': '', 'email': '', 'phone_number': '', 'birthday': ''},
		errors: []
	},

	components: { datepicker },
	
	methods: {

		getContacts() {

			let urlContacts = 'contacts';

			axios.get(urlContacts).then(response => {

				this.contacts = response.data;
			});
		},

		getContact(contact) {


			this.fillContact.id = contact.id;
			this.fillContact.name = contact.name;
			this.fillContact.surname = contact.surname;
			this.fillContact.email = contact.email;
			this.fillContact.phone_number = contact.phone_number;
			this.fillContact.birthday = contact.birthday;

			$('#show').modal('show');

		},

		editContact(contact) {

			this.fillContact.id = contact.id;
			this.fillContact.name = contact.name;
			this.fillContact.surname = contact.surname;
			this.fillContact.email = contact.email;
			this.fillContact.phone_number = contact.phone_number;
			this.fillContact.birthday = contact.birthday;

			$('#edit').modal('show');
		},

		updateContact(id) {

			let url = 'contacts/' + id;

			axios.put(url, this.fillContact).then(response => {

				this.getContacts();
				this.fillContact = {'id': '', 'name': '', 'surname': '', 'email': '', 'phone_number': '', 'birthday': ''};
				this.errors	  = [];

				$('#edit').modal('hide');

				toastr.success('Contact successfuly added!');

			}).catch(error => {
				this.errors = error.response.data
			});
		},

		deleteContact(contact) {

			let url = 'contacts/' + contact.id;

			axios.delete(url).then(response => { 

				this.getContacts();

				toastr.success('Contact successfuly deleted!');
			});
		},

		createContact() {

			let url = 'contacts';

			axios({
					method: 'post',
					url: url,
					data: {
						name: this.newContact.name,
						surname: this.newContact.surname,
						email: this.newContact.email,
						phone_number: this.newContact.phone_number,
						birthday: this.newContact.birthday
					}
				}).then(response => {
				this.getContacts();
				this.newContact = [];
				this.errors = [];

				$('#create').modal('hide');

				toastr.success('New contact successfuly added!');

			}).catch(error => {
				this.errors = error.response.data
			});
		}
	}
});