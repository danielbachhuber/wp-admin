module.exports = function( grunt ) {

	'use strict';

	// Project configuration
	grunt.initConfig( {

		// Compile SASS
		sass: {

			compile: {
				files: {
					'assets/css/theme.css' : 'assets/css/scss/theme.scss'
				}
			}

		},

		// Watch for changes
		watch:  {

			sass: {
				files: ['assets/css/*/**/*.scss'],
				tasks: ['sass'],
				options: {
					debounceDelay: 500,
					livereload: true
				}
			}

		}
	} );

	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');

	// Default task.
	grunt.registerTask( 'default', [ 'sass' ] );

	grunt.util.linefeed = '\n';

};
