/**
 * 组件安装
 * npm install gulp gulp-if gulp-rev gulp-rev-replace minimist run-sequence gulp-concat gulp-rename gulp-clean gulp-jshint gulp-uglify gulp-jsonminify gulp-ruby-sass gulp-clean-css gulp-imagemin gulp-minify-html gulp-ng-annotate gulp-sourcemaps gulp-requirejs-optimize --save-dev
 */

// 引入 gulp及组件
var gulp = require('gulp'),                   //基础库
    gulpif = require('gulp-if');              //条件执行
    rev = require('gulp-rev');                //rev
    revReplace = require('gulp-rev-replace'); //rev替换
    minimist = require('minimist')            //命令行参数解析
    runSequence = require('run-sequence');    //顺序执行
    concat = require('gulp-concat'),          //合并文件
    rename = require('gulp-rename'),          //重命名
    clean = require('gulp-clean');            //清空文件夹
    // jshint = require('gulp-jshint'),          //js检查
    uglify = require('gulp-uglify'),          //js压缩
    jsonminify = require('gulp-jsonminify');  //json压缩
    sass = require('gulp-ruby-sass'),         //sass
    cleanCSS = require('gulp-clean-css'),     //css压缩
    imagemin = require('gulp-imagemin'),      //image压缩
    minifyHtml = require("gulp-minify-html"); //html压缩
    ngAnnotate = require('gulp-ng-annotate'), //ng注释
    sourcemaps = require('gulp-sourcemaps'),  //source map
    child_process = require('child_process'),
    requirejsOptimize = require('gulp-requirejs-optimize'); //requirejs打包

var SRC = './resources/assets/';
var DIST = './public/assets/';
var args = minimist(process.argv.slice(2));

gulp.task('clean-js', function() {
    return gulp.src(DIST + 'js/*')
        .pipe(clean());
});

gulp.task('clean-css', function(){
    return gulp.src(DIST + 'css/*')
        .pipe(clean());
});

gulp.task('clean-img', function(){
    return gulp.src('DIST' + 'img/*')
        .pipe(clean());
});

gulp.task('clean-bootstrap', function(){
    return gulp.src('DIST' + 'bootstrap-3.3.7/*')
        .pipe(clean());
});

gulp.task('js',['clean-js'] , function(){
    var jsSrc = SRC + 'js/**/*'
    var jsDst = DIST + 'js/';

    gulp.src(jsSrc)
    .pipe(gulp.dest(jsDst));
});

gulp.task('css', ['clean-css'], function(){
    var cssSrc = SRC + 'css/**';
    var cssDst = DIST + 'css/';
    var sassSrc = SRC + 'sass/*.scss';

    gulp.src(cssSrc)
        .pipe(gulp.dest(cssDst));
   
    return sass(sassSrc, {style: 'expanded'})
        // .pipe(autoprefixer())
        .pipe(gulpif(args.release, cleanCSS()))
        .pipe(gulp.dest(cssDst));
});

gulp.task('img', ['clean-img'], function(){
    var imgSrc = SRC + 'img/**';
    var imgDst = DIST + 'img/';
    return gulp.src(imgSrc)
        .pipe(gulp.dest(imgDst));
});

gulp.task('bootstrap', ['clean-bootstrap'], function(){
    var bootstrapSrc = SRC + 'bootstrap-3.3.7/**';
    var bootstrapDst = DIST + 'bootstrap-3.3.7/';
    return gulp.src(bootstrapSrc)
        .pipe(gulp.dest(bootstrapDst));
});

//后台管理
var adminSrc = SRC + 'admin/bower_components/AdminLTE'
var adminDist = DIST + 'admin'

gulp.task('clean-admin-lte-bootstrap', _ => {
    return gulp.src(`${adminDist}/bootstrap/`, {read : false})
        .pipe(clean())
})

gulp.task('clean-admin-lte-dist', _ => {
    return gulp.src(`${adminDist}/dist/`, {read : false})
        .pipe(clean())
})

gulp.task('clean-admin-lte-plugins', _ => {
    return gulp.src(`${adminDist}/plugins/`, {read : false})
        .pipe(clean())
})

gulp.task('admin-lte-bootstrap', ['clean-admin-lte-bootstrap'], _ => {
    return gulp.src(`${adminSrc}/bootstrap/**/*`)
        .pipe(gulp.dest(`${adminDist}/bootstrap/`))
})

gulp.task('admin-lte-dist' , ['clean-admin-lte-dist'], _ => {
    return gulp.src(`${adminSrc}/dist/**/*`)
        .pipe(gulp.dest(`${adminDist}/dist/`))
})

gulp.task('admin-lte-plugins', ['clean-admin-lte-plugins'], _ => {
    return gulp.src(`${adminSrc}/plugins/**/*`)
        .pipe(gulp.dest(`${adminDist}/plugins/`))
})

gulp.task('admin', ['admin-lte-dist', 'admin-lte-bootstrap', 'admin-lte-plugins'])

gulp.task('default', ['js', 'css', 'img', 'admin', 'bootstrap'],function() {
    
});