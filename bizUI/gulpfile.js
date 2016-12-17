/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var gulp = require('gulp');
var bowserSync = require('browser-sync').create();

gulp.task('default', function () {
    // place code for your default task here
      gulp.start('server');
});

gulp.task('server', function () {
  // console.log('server');
  bowserSync.init({
    server: {
      baseDir: "./app/"
    },
    port: 3081
  })
});