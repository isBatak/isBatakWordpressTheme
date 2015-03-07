'use strict';
module.exports = function (grunt) {

    var npmDependencies = require('./package.json').devDependencies;
    var hasSass = npmDependencies['grunt-contrib-sass'] !== undefined;
    var hasStylus = npmDependencies['grunt-contrib-stylus'] !== undefined;

    grunt.initConfig({
        // Dirs
        dirs: {
            bower: 'lib',
            libs: 'js/libs'
        },
        // Watches for changes and runs tasks
        watch: {
            sass: {
                files: ['scss/**/*.scss'],
                tasks: (hasSass) ? ['sass:dev', 'autoprefixer'] : null,
                options: {
                    livereload: true
                }
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
                files: ['**/*.html'],
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
                browsers: ['last 2 versions', 'ie 8', 'ie 9']
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
        // Copy js files to libs folder
        copy: {
            dev: {
                files: [
                    {
                        expand: true,
                        src: ['<%= dirs.bower %>/bootstrap-sass-official/assets/javascripts/bootstrap.js'],
                        flatten: true,
                        dest: '<%= dirs.libs %>/bootstrap/',
                        filter: 'isFile'
                    },
                    {
                        expand: true,
                        src: ['<%= dirs.bower %>/html5shiv/dist/html5shiv.js'],
                        flatten: true,
                        dest: '<%= dirs.libs %>/html5shiv/',
                        filter: 'isFile'
                    },
                    {
                        expand: true,
                        src: ['<%= dirs.bower %>/jquery/jquery.js'],
                        flatten: true,
                        dest: '<%= dirs.libs %>/jquery/',
                        filter: 'isFile'
                    },
                    {
                        expand: true,
                        src: ['<%= dirs.bower %>/requirejs/require.js'],
                        flatten: true,
                        dest: '<%= dirs.libs %>/requirejs/',
                        filter: 'isFile'
                    },
                    {
                        expand: true,
                        src: ['<%= dirs.bower %>/respond/src/respond.js'],
                        flatten: true,
                        dest: '<%= dirs.libs %>/respond/',
                        filter: 'isFile'
                    },
                    {
                        expand: true,
                        src: ['<%= dirs.bower %>bootstrap-sass-official/assets/fonts/bootstrap'],
                        flatten: true,
                        dest: 'fonts'
                    },
                ],
            },
        },
        // Clean dir
        clean: {
            options: {
                force: true,
            },
            src: ["js/libs"],
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

        arr.push('bower-install');
        grunt.task.run(arr);
    });

    // Load up tasks
    if (hasSass) {
        grunt.loadNpmTasks('grunt-contrib-sass');
    }

    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-bower-requirejs');
    grunt.loadNpmTasks('grunt-contrib-requirejs');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-svgmin');

    // Run bower install
    grunt.registerTask('bower-install', function () {
        var done = this.async();
        var bower = require('bower').commands;
        bower.install().on('end', function (data) {
            done();
        }).on('data', function (data) {
            console.log(data);
        }).on('error', function (err) {
            console.error(err);
            done();
        });
    });

    // copy dependencies to js/libs folder
    grunt.registerTask('dev-copy', ['clean','copy:dev']);
};
