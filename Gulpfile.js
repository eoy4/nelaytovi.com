var gulp = require('gulp');
var sass = require('gulp-sass');
const es6Pipeline = require('gulp-webpack-es6-pipeline');

es6Pipeline.registerBuildGulpTasks(
  gulp,
  {
    entryPoints: {
      'bundle': __dirname + '/src/index.js'
    },
    outputDir: __dirname + '/js/bundles'
  }
);

gulp.task('styles', function() {
  gulp.src('sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./css/'));
});

gulp.task('default', function() {
  gulp.watch('sass/**/*.scss', ['styles']);
  gulp.watch('src/**/*.js', ['es6Pipeline:build:dev']);
});
