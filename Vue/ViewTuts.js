var app = new Vue({
    el: '#app',
    data: {
      items: [
      ],
      message: '',
    },
    methods: {
    add: function () {
      this.items.push({ message: this.message})
    },
	remove: function (index){
		this.items.splice(index,1)
	}
  }
})
