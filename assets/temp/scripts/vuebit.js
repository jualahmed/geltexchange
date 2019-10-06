Vue.component('multiselect', window.VueMultiselect.default)
new Vue({
	el:"#header",
	data:{
		value: { title: 'Select a gatway', desc: 'Discovering new species!', img:'/temp/img/images/allinco_01.png' },
	    options: [
	        { title: 'Space Pirate', desc: 'More space battles!', img: '/temp/img/images/allinco_01.png' },
	        { title: 'Merchant', desc: 'PROFIT!', img: '/temp/img/images/allinco_01.png' },
	        { title: 'Explorer', desc: 'Discovering new species!', img: '/temp/img/images/allinco_01.png' },
	        { title: 'Miner', desc: 'We need to go deeper!', img: '/temp/img/images/allinco_01.png' }
	    ]
	},
	methods: {
	    customLabel ({ title, desc }) {
	      return `${title} – ${desc}`
	    }
  	}
})