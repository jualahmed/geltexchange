var gulp = require('gulp'),
browserSync = require('browser-sync').create();

gulp.task('watch', function() {
  browserSync.init({
    notify: false,
    server: {
      baseDir: "application/views/designtemplate"
    }
  });

  gulp.watch('./application/views/designtemplate/index.html', function() {
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