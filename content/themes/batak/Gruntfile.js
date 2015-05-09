'use strict';
module.exports = function (grunt) {

    var npmDependencies = require('./package.json').devDependencies;
    var hasSass = npmDependencies['grunt-contrib-sass'] !== undefined;
    var hasStylus = npmDependencies['grunt-contrib-stylus'] !== undefined;

    grunt.initConfig({
        // Dirs
        dirs: {
            bower: 'lib',
            libs: 'js/libs',
            html: 'html_template'
        },
        // Watches for changes and runs tasks
        watch: {
            sass: {
                files: ['scss/**/*.scss'],
                tasks: (hasSass) ? ['sass:dev', 'autoprefixer'] : null
            },
            js: {
                files: ['js/**/*.js'],
                tasks: ['jshint'],
                options: {
                    livereload: true
                }
            },
            php: {
                files: ['**/*.php'],
                options: {
                    livereload: true
                }
            },
            html: {
                files: ['**/*.html', '!<%= dirs.html %>/*.html'],
                options: {
                    livereload: true
                }
            },
            css : {
				files : ['css/**/*.css'],
				options : {
					livereload : true
				}
			},
            dot: {
                files: ['<%= dirs.html %>/**/*.dot.html', '<%= dirs.html %>/**/*.md'],
                tasks: ['stencil:main'],
                options: {
                    livereload: true
                }
            }
        },
        // JsHint your javascript
        jshint: {
            all: ['js/*.js', '!js/modernizr.js', '!js/*.min.js', '!lib/**/*.js'],
            options: {
                browser: true,
                curly: false,
                eqeqeq: false,
                eqnull: true,
                expr: true,
                immed: true,
                newcap: true,
                noarg: true,
                smarttabs: true,
                sub: true,
                undef: false
            }
        },
        // Dev and production build for sass
        sass: {
            production: {
                files: [
                    {
                        src: ['**/*.scss', '!**/_*.scss'],
                        cwd: 'scss',
                        dest: 'css',
                        ext: '.css',
                        expand: true
                    }
                ],
                options: {
                    style: 'compressed'
                }
            },
            dev: {
                files: [
                    {
                        src: ['**/*.scss', '!**/_*.scss'],
                        cwd: 'scss',
                        dest: 'css',
                        ext: '.css',
                        expand: true
                    }
                ],
                options: {
                    style: 'expanded'
                }
            }
        },
        // Autoprefixer setup
        autoprefixer: {
            options: {
                browsers: ['> 5%','last 2 versions', 'ie 8', 'ie 9'],
                map: {
                    inline: false
                }
            },
            files: {
                src: 'css/*.css'
            }
        },
        // Bower task sets up require config
        bower: {
            all: {
                rjsConfig: 'js/global.js'
            }
        },
        // Require config
        requirejs: {
            production: {
                options: {
                    name: 'global',
                    baseUrl: 'js',
                    mainConfigFile: 'js/global.js',
                    out: 'js/optimized.min.js'
                }
            }
        },
        // Wiredep
        wiredep: {
            task: {
                src: [
                    'html_template/*.html'
                ]
            }
        },
        // Image min
        imagemin: {
            production: {
                files: [
                    {
                        expand: true,
                        cwd: 'images',
                        src: '**/*.{png,jpg,jpeg}',
                        dest: 'images'
                    }
                ]
            }
        },
        // SVG min
        svgmin: {
            production: {
                files: [
                    {
                        expand: true,
                        cwd: 'images',
                        src: '**/*.svg',
                        dest: 'images'
                    }
                ]
            }
        },

        // Stencil HTML assembler
        stencil: {
            main: {
                options: {
                    partials: '<%= dirs.html %>/partials',
                    templates: '<%= dirs.html %>/templates',
                    dot_template_settings: { strip: false }
                },
                files: [
                    {
                        expand: true,
                        cwd: '<%= dirs.html %>/pages/',
                        src: '**/*.dot.html',
                        dest: '<%= dirs.html %>',
                        ext: '.html',
                        flatten: false
                    }
                ]
            }
        }

    });

    // Default task
    grunt.registerTask('default', ['watch']);

    // Build task
    grunt.registerTask('build', function () {
        var arr = ['jshint'];

        if (hasSass) {
            arr.push('sass:production');
        }

        arr.push('imagemin:production', 'svgmin:production', 'requirejs:production');

        grunt.task.run(arr);
    });

    // Template Setup Task
    grunt.registerTask('setup', function () {
        var arr = [];

        if (hasSass) {
            arr.push['sass:dev'];
        }

        grunt.task.run(arr);
    });

    // Load up tasks
    if (hasSass) {
        grunt.loadNpmTasks('grunt-contrib-sass');
    }

    grunt.loadNpmTasks('grunt-debug-task');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-bower-requirejs');
    grunt.loadNpmTasks('grunt-contrib-requirejs');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-svgmin');
    grunt.loadNpmTasks('grunt-wiredep');
    grunt.loadNpmTasks('grunt-stencil');

};
