const path = require('path');

module.exports = {
	mode: 'production',
  	entry: path.resolve(__dirname, './assets/assets/scriptss/app.js'),

	output: {
	   path: path.resolve(__dirname, './assets/temp/scripts'),
	   filename: "App.js"
	}
}