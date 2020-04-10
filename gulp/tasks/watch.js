var gulp = require('gulp'),
browserSync = require('browser-sync').create();

gulp.task('watch', function() {
	browserSync.init({
		proxy: "http://localhost/geltexchange",
		notify: false,
		options: {
				 reloadDelay: 250
		},
	});

	gulp.watch('./application/views/index.php', function() {
		browserSync.reload();
	});

	gulp.watch('./assets/assets/styles/**/*.css', function() {
		gulp.start('cssInject');
	});

	gulp.watch('./assets/assets/scriptss/**/*.js', function() {
		gulp.start('scriptsRefresh');
	})

});


gulp.task('cssInject', ['styles'], function() {
	return gulp.src('./assets/temp/styles/styles.css')
		.pipe(browserSync.stream());
});

gulp.task('scriptsRefresh', ['scripts'], function() {
	browserSync.reload();
});