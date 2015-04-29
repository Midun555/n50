module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        sass: {
            dist: {
                options: {
                    style: 'compact'
                },
                files: {
                    'skin/css/styles.css' : 'skin/sass/main.scss'
                }
            }
        },
        watch: {
            sass: {
                files: 'skin/sass/*.scss',
                tasks: 'sass'
            },
        }
    });
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.registerTask('default',['watch']);
}