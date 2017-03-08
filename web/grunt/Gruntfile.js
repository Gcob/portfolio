module.exports = function(grunt) {
	
	var lessTasks = ['less', 'autoprefixer', 'cssmin'];
	
	// Project configuration.
	grunt.initConfig({
	pkg: grunt.file.readJSON('package.json'),
		/*
		svgmin: {
			options: {
				plugins: [
					{removeEmptyAttrs: true} ,
					{removeUselessStrokeAndFill: true} ,
					{removeViewBox: true} ,
					{removeAttrs: { attrs: ['stroke-width', 'stroke', 'fill', 'xmlns'] }}
				]
			},
			dist: {
				expand: true,
				cwd: '../angular/src/assets/img/svg/',
				src: '*.svg',
				dest: '../angular/src/assets/img/svg/', 
				ext: '.min.svg',
			}
		},
		*/
	
		less: {
			development: {
				options: {
				  paths: ['../angular/src/assets/css']
				},
				files: {
				  '../angular/src/assets/css/style.css': '../angular/src/assets/less/style.less'
				}
			}
		},
		
		autoprefixer: {
			development: {
				src: '../angular/src/assets/css/style.css',
				dest: '../angular/src/assets/css/style.dev.css',
				options: {
					cascade: true,
					browsers: ['last 2 versions']
				}
			},
			production: {
				src: '../angular/src/assets/css/style.css',
				dest: '../angular/src/assets/css/style.prod.css',
				options: {
					cascade: false,
					browsers: ['last 200 versions', 'ie 6', 'ie 7', 'ie 8', 'ie 9']
				}
			}
		},
		
		cssmin: {
			production: {
				expand: true,
				cwd: '../angular/src/assets/css/',
				src: ['*.css', '!*.min.css'],
				dest: '../angular/src/assets/css/',
				ext: '.min.css',
				extDot: 'first'
				//dest: '../angular/src/assets/css',
				//src: '../angular/src/assets/css/style.prod.css',
				//dest: '../angular/src/assets/css/style.prod.min.css',
			}
		},
		
		watch: {
			styles: {
				files: ['../angular/src/assets/less/**/*.less'],
				tasks: lessTasks,
				options: {
					spawn: false,
				}
			}
		}
		
	});

	// Load the plugin that provides the "uglify" task.
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-watch');
	//grunt.loadNpmTasks('grunt-svgmin');
	
	//tasks
	//grunt.registerTask('minifySvg', ['svgmin']);
	grunt.registerTask('compileCss', lessTasks);
	grunt.registerTask('minifyCss', ['autoprefixer', 'cssmin']);
	grunt.registerTask('autoCompileCss', ['watch']);
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
};