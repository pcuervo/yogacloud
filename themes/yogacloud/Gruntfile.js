(function () {
  'use strict';
}());
module.exports = function(grunt) {
   grunt.initConfig({
       pkg: grunt.file.readJSON('package.json'),

       concat: {
           options: {
               separator: 'rnrn'
           },
           dist: {
               src: ['assets/js/bin/materialize.js'],
               dest: 'assets/js/main.js'
           }
       },

       uglify: {
           options: {
               banner: '/*! &lt;%= pkg.name %&gt; &lt;%= grunt.template.today("dd-mm-yyyy") %&gt; */n'
           },
           dist: {
               files: {
                   'assets/js/main.min.js': ['&lt;%= concat.dist.dest %&gt;']
               }
           }
       },

       jshint: {
           files: ['gruntfile.js', 'assets/js/*.js', 'assets/js/modules/*.js'],
           options: {
               globals: {
                   jQuery: true,
                   console: true,
                   module: true
               }
           }
       },

       compass: {
           dist: {
               options: {
                   sassDir: 'sass',
                   cssDir: '../yogacloud',
                   environment: 'development',
                   outputStyle: 'compressed'
               }
           }
       },

       watch: {
           files: ['&lt;%= jshint.files %&gt;', 'sass/**/*.scss', 'sass/*.scss'],
           tasks: ['concat', 'uglify', 'jshint', 'compass']
       }

   });

   grunt.loadNpmTasks('grunt-contrib-concat');
   grunt.loadNpmTasks('grunt-contrib-uglify');
   grunt.loadNpmTasks('grunt-contrib-jshint');
   grunt.loadNpmTasks('grunt-contrib-compass');
   grunt.loadNpmTasks('grunt-contrib-watch');
   grunt.registerTask('default', ['concat', 'uglify', 'jshint', 'compass', 'watch']);
};