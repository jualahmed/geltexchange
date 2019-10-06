Vue.component('multiselect', window.VueMultiselect.default)
new Vue({
	el:"#header",
	data:{
		value: { title: 'Select a gatway', desc: 'Discovering new species!', img: base_url+'assets/temp/img/images/allinco_01.png' },
	    options: [
	        { title: 'Space Pirate', desc: 'More space battles!', img: base_url+'assets/temp/img/images/allinco_01.png' },
	        { title: 'Merchant', desc: 'PROFIT!', img: base_url+'assets/temp/img/images/allinco_01.png' },
	        { title: 'Explorer', desc: 'Discovering new species!', img: base_url+'assets/temp/img/images/allinco_01.png' },
	        { title: 'Miner', desc: 'We need to go deeper!', img: base_url+'assets/temp/img/images/allinco_01.png' }
	    ]
	},
	methods: {
	    customLabel ({ title, desc }) {
	      return `${title} – ${desc}`
	    }
  	}
})