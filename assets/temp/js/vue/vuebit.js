Vue.component('multiselect', window.VueMultiselect.default)
new Vue({
	el:"#home",
	data:{
		base_url:base_url,
		send: { name: 'Select', desc: 'Discovering new species!', external_icon:'assets/temp/img/images/allinco_01.png' },
	    sendoptions: [],
	    receive: { name: 'Select', desc: 'Discovering new species!', external_icon:'assets/temp/img/images/allinco_01.png' },
	    reciveoptions: [],
		gatewaysendinfo:'',
		gatewayreciveinfo:'',
		currency_form:'',
		currency_to:'',
		rate_from: 0,
		crate_from: 0,
		rate_to: 0,
		crate_to: 0,
		reserve:'',
		receiverid:'aaaaaaaaa',
		email:'test@gmail.com',
		error:[],
		loginuser:[],
		recivefee:0,
		sendfee:0,
		newcrate_from:0,
		newcrate_to:0,
		extranandskill:0,
		tos:0,
		placeholdermessage:'',
		messagessss:'',
		confirmtransation:0,
		gateways:[],
		send_account:"",
		me:0,
		messsssss:'dd',
	},
	methods: {
	    customLabel ({ title, desc }) {
	      return `${title} – ${desc}`
	    },
	    submit(){
			this.error=[];
			var self=this;
			var login_to_exchange = 1;
			if(this.rate_to && this.rate_from){
				if(login_to_exchange == "1") {
					if(this.loginuser.length==0) {
						this.error.push("You Must need to Login <a class='varifynow' target='_blank' href="+base_url+"home/login>Login now</a>");
					}else{
						var ses_uid = this.loginuser[0].id;
						// this.loginuser[0].final_verified==0
						if(0){
							this.error.push("Your account must be varified to make any Exchange <a class='varifynow' target='_blank' href="+base_url+"profile/verification>Verify now</a>");
						}else{
							if(!this.receiverid){
								console.log("receiverid")
								this.error.push(this.gatewayreciveinfo.name + " Account is required");
							}
							else if(!this.email){
								console.log("email")
								this.error.push("Email Account is required");
							}else if(!this.validEmail(this.email)) {
						        this.error.push('Valid email required.');
						    }else if(this.tos==1){
						    	this.error.push('You Must Accept The Terms & Conditions');
						    }
							else{
								var amountsend=parseFloat(this.rate_from);
								var amount_receive=parseFloat(this.rate_to);
								if(this.currency_to=='USD'){
									amount_receive=parseFloat(this.rate_to)-(parseFloat(this.recivefee)+(parseFloat(this.sendfee)+parseFloat(this.extranandskill))/this.crate_from)
								}else{
									amount_receive=this.rate_to-this.recivefee;
								}
								var self = this;
								var data_url =base_url+"exchanges/make_exchange";
								$.ajax({
									url: data_url,
									type: 'POST',
									data: {gateway_send: this.send.id,gateway_receive:this.receive.id,amount_send:amountsend,amount_receive:amount_receive,rate_from:this.crate_from,rate_to:this.crate_to,user_id:this.loginuser[0].id,gateway_account:this.receiverid},
								})
								.done(function(re) {
									var re=JSON.parse(re);
									self.gateways.push(re);
									self.confirmtransation=1;
									// self.messsssss="Enter Your "+self.gateways[0].name+" address After Sending";
								})
								.fail(function() {
									console.log("error");
								})
							}
						}
					}
				}
			}else{
				this.error.push("Please Select Gateways");
			}
		},
		finalsubmit:function(){
			if(this.send_account==''){
				this.me=1;
			}else{
				$.ajax({
					url:base_url+'exchanges/make_exchangefinal',
					type: 'POST',
					data: {send_account:this.send_account,id:this.gateways[0].id},
				})
				.done(function(re) {
						Swal.fire(
						  'You have successfully confirm the order!',
						)
						setTimeout(() => {
				           location.reload();
				        }, 2000);
				})
				.fail(function() {
					console.log("error");
				})
			}
		},
		validEmail: function (email) {
	      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	      return re.test(email);
	    },
		sendchange(data){
			var id=data.id
			var self = this;
			var data_url = base_url+"exchanges/gateway_info/"+id;
			$.ajax({
				url: data_url,
			})
			.done(function(re) {
				self.sendfee=0;
				self.extranandskill=0;
				var re = JSON.parse(re);
				self.gatewaysendinfo=re;
				self.bit_rates();
			})
			.fail(function() {
				console.log("error");
			});
		},
		recivechange(data){
			var id=data.id;
			var self = this;
			console.log(id);
			var data_url = base_url+"exchanges/gateway_info/"+id;
			$.ajax({
				url: data_url,
			})
			.done(function(re) {
				self.recivefee=0;
				self.extranandskill=0;
				var re = JSON.parse(re);
				self.gatewayreciveinfo=re;
				self.bit_rates();
			})
			.fail(function() {
				console.log("error");
			});
		},
		bit_rates(){
			var gateway_send = this.send.id;
			var gateway_receive = this.receive.id;
			if(gateway_send && gateway_receive && gateway_send!=gateway_receive){
				var self = this;
				var data_url = base_url+"exchanges/rates"
				$.ajax({
					type: "POST",
					url: data_url,
					dataType: "json",
					data:{sendid:gateway_send,reciveid:gateway_receive},
					success: function (data) {
						if(data.alldata!=null){
							self.rate_from=data.alldata.rate_from;
							self.crate_from=data.alldata.rate_from;
							self.newcrate_from=data.alldata.rate_from;
							self.rate_to=data.alldata.rate_to;
							self.crate_to=data.alldata.rate_to;
							self.newcrate_to=data.alldata.rate_to;
							self.currency_form=data.alldata.currency_name;
							self.currency_to=data.currency_name1;
						}else{
							self.rate_from=0;
							self.crate_from=0;
							self.newcrate_from=0;
							self.rate_to=0;
							self.crate_to=0;
							self.newcrate_to=0;
							self.currency_form=0;
							self.currency_to=0;
						}
					}
				});
			}
		},
		bit_calculator(){
			var rate_from = this.crate_from;
			var rate_to = this.crate_to;
			var amount_send = this.rate_from;
			var data=0;
			if(isNaN(amount_send)) {
				var data = '0';
			}else{
				if(rate_from > 1) {
					var sum = amount_send / rate_from;
					var data = sum.toFixed(2);
				} else {
					var sum = amount_send * rate_to;
					var data = sum.toFixed(2);
				}
			}
			this.rate_to=data;
		},
		bit_calculatorr(){
			var rate_from =this.crate_from;
			var rate_to = this.crate_to;
			var amount_send =this.rate_to;
			var data=0;
			if(isNaN(amount_send)) {
				var data = '0';
			} else {
				if(rate_from > 1) {
					var sum = amount_send * rate_from;
					var data = sum.toFixed(2);
				} else {
					var sum = amount_send / rate_to;
					var data = sum.toFixed(2);
				}	
			}
			this.rate_from=data;
		}
  	},
  	watch:{
		rate_to:function (val) {
			if(this.gatewayreciveinfo.name=='Perfect Money'){
				if(val<=99.99){
					this.recivefee=(val*0.5)/100;
					if(this.crate_from!=this.newcrate_from){
						this.crate_from=parseFloat(this.crate_from+1);
					}
				}
				else if(val>=100 && val<=299.99){
					this.recivefee=0;
					if(this.crate_from!=this.newcrate_from){
						this.crate_from=parseFloat(this.crate_from+1);
					}
				}
				else if(val>=300 && val<=499.99){
					this.recivefee=0;
					if(this.crate_from==this.newcrate_from){
						this.crate_from=parseFloat(this.crate_from-1);
					}
				}
				else if(val>=500){
					this.recivefee=0;
					if(this.crate_from==this.newcrate_from){
						this.crate_from=parseFloat(this.crate_from-2);
					}
				}
			}
			else if(this.gatewayreciveinfo.name=='Neteller'){

				if(val>=0 && val<=9.99){
					this.recivefee=0.5;
					this.extranandskill=50;
					if(this.crate_from!=this.newcrate_from){
						this.crate_from=parseFloat(this.crate_from+1);
					}
				}
				else if(val>=10 && val<=34.99){
					this.recivefee=0.5;
					this.extranandskill=0;
					if(this.crate_from!=this.newcrate_from){
						this.crate_from=parseFloat(this.crate_from+1);
					}
				}
				else if(val>=35 && val<=99.99){
					this.recivefee=(val*1.45)/100;
					this.extranandskill=0;
					if(this.crate_from!=this.newcrate_from){
						this.crate_from=parseFloat(this.crate_from+1);
					}
				}
				else if(val>=100 && val<=299.99){
					this.recivefee=0;
					this.extranandskill=0;
					if(this.crate_from!=this.newcrate_from){
						this.crate_from=parseFloat(this.crate_from+1);
					}
				}
				else if(val>=300 && val<=499.99){
					this.recivefee=0;
					this.extranandskill=0;
					if(this.crate_from==this.newcrate_from){
						this.crate_from=parseFloat(this.crate_from-1);
					}
				}
				else if(val>=500){
					this.recivefee=0;
					if(this.crate_from==this.newcrate_from){
						this.crate_from=parseFloat(this.crate_from-2);
					}
				}
			}
			else if(this.gatewayreciveinfo.name=='Skrill'){
				if(val>=0 && val<=9.99){
					this.recivefee=0.6;
					this.extranandskill=50;
					if(this.crate_from!=this.newcrate_from){
						this.crate_from=parseFloat(this.crate_from+1);
					}
				}
				else if(val>=10 && val<=39.99){
					this.recivefee=0.6;
					this.extranandskill=0;
					if(this.crate_from!=this.newcrate_from){
						this.crate_from=parseFloat(this.crate_from+1);
					}
				}
				else if(val>=40 && val<=99.99){
					this.recivefee=(val*1.45)/100;
					this.extranandskill=0;
					if(this.crate_from!=this.newcrate_from){
						this.crate_from=parseFloat(this.crate_from+1);
					}
				}
				else if(val>=100 && val<=299.99){
					this.recivefee=0;
					this.extranandskill=0;
					if(this.crate_from!=this.newcrate_from){
						this.crate_from=parseFloat(this.crate_from+1);
					}
				}
				else if(val>=300 && val<=499.99){
					this.recivefee=0;
					this.extranandskill=0;
					if(this.crate_from==this.newcrate_from){
						this.crate_from=parseFloat(this.crate_from-1);
					}
				}
				else if(val>=500){
					this.recivefee=0;
					this.extranandskill=0;
					if(this.crate_from==this.newcrate_from){
						this.crate_from=parseFloat(this.crate_from-2);
					}
				}
			}
			else if(this.gatewayreciveinfo.name=='WebMoney'){
				if(val>=0 && val<=99.99){
					this.recivefee=(val*0.85)/100;
					this.extranandskill=0;
					if(this.crate_from!=this.newcrate_from){
						this.crate_from=parseFloat(this.crate_from+1);
					}
				}
				else if(val>=100){
					this.recivefee=0;
				}
			}
			else if(this.gatewayreciveinfo.name=='Payeer'){
				if(val>=0 && val<=99.99){
					this.recivefee=(val*0.95)/100;
					this.extranandskill=0;
					if(this.crate_from!=this.newcrate_from){
						this.crate_from=parseFloat(this.crate_from+1);
					}
				}
				else if(val>=100){
					this.recivefee=0;
				}
			}
			else if(this.gatewayreciveinfo.name=='Rocket Agent' || this.gatewayreciveinfo.name=='Bkash Agent' ||  this.gatewayreciveinfo.name=='Nagad Agent'){
				this.recivefee=(this.rate_to*2)/100;
			}
	    },
	    rate_from:function (val){
			
	    	if(this.gatewaysendinfo.name=='Bkash Personal' || this.gatewaysendinfo.name=='Nagad Personal' || this.gatewaysendinfo.name=='Rocket Personal'){
				this.sendfee=(this.rate_from*2)/100;
			}
			if(this.gatewaysendinfo.name=='Bkash Agent' || this.gatewaysendinfo.name=='Nagad Agent' || this.gatewaysendinfo.name=='Rocket Agent'){
				this.sendfee=0;
			}
	    }
	},
  	created(){
  		var self = this;
  		fetch(base_url+"home/getsend")
		  .then((res)=>{
		  		res.json()
		  		.then((data)=>{
		  			self.sendoptions=data
		  		})
		    }
		  )
		  .catch(function(err) {
		    console.log('Fetch Error :-S', err);
		  });

		fetch(base_url+"home/getrecive")
		  .then((res)=>{
		  		res.json()
		  		.then((data)=>{
		  			self.reciveoptions=data
		  		})
		    }
		  )
		  .catch(function(err) {
		    console.log('Fetch Error :-S', err);
		  });

		var self = this;
		self.loginuser=[];
		var data_ursls = base_url+"auth/getloginuser";
		$.ajax({
			url: data_ursls,
			type: 'POST',
		})
		.done(function(re) {
			if(re!="null"){
				var re = JSON.parse(re)
				self.loginuser.push(re);
			}
		})
		.fail(function(re) {
			console.log(re);
		})
  	}
})
