const mix = require('laravel-mix');
require('laravel-mix-alias');
const SVGSpritemapPlugin = require('svg-spritemap-webpack-plugin');
mix.js('resources/site/js/app.js', 'public/assets/site/js')
    .vue({ version: 2 })
    .sass('resources/site/sass/app.scss', 'public/assets/site/css')
    .options({
        processCssUrls: false,
        processJsUrls:false
    })
    .webpackConfig({
        plugins: [
            new SVGSpritemapPlugin('resources/site/svg/*.svg',{
                output:{
                    filename:'assets/site/images/sprites.svg'
                }
            }),
        ],
        resolve: {
            extensions: ['.js', '.vue', '.json', '.styl','.scss','.css'],
            alias: {
                '@': __dirname + '/resources/site/js',
            },
        },
    });
