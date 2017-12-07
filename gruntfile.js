'use strict';
module.exports = function(grunt) {

    grunt.initConfig({

        sass: {
            dist: {
                files: {
                    'src/dtf.full.css': 'src/dtf.scss'
                }
            }
        },


        cssmin: {
            target: {
                files: [{
                    expand: true,
                    cwd: 'src/',
                    src: ['dtf.full.css'],
                    dest: '',
                    ext: '.css'
                }]
            }
        },

        watch: {
                files: ['src/*.scss'],
                tasks: ['sass', 'cssmin']
        }
    });


    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['sass', 'cssmin', 'watch']);
    //now, just typing 'grunt' will run this and the watch task will take over.
};

