
const fs = require('fs')
const path = require('path')
const mix = require('laravel-mix')

mix.webpackConfig({
    resolve: {
        alias: {
            '@js': path.resolve(__dirname, 'resources/assets/js'),
            '@components': path.resolve(__dirname, 'resources/assets/js/components')
        }
    }
})

const assets = './public'
const styles = assets + '/css'
const scripts = assets + '/js'
const controllers = './resources/assets/js/controllers'

fs.readdirSync(controllers).forEach(file => {
    const filename = file.split('.')[0]
    mix.js(`${controllers}/${filename}`, scripts)
})

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
