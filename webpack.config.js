var webpack = require("webpack");

module.exports = {
    entry: {
        app: './resources/assets',
        vendor: './resources/assets/bootstrap.js'
    },
    output: {
        path: './public',
        filename: 'app.bundle.js'
    },
    plugins: [
        new webpack.optimize.CommonsChunkPlugin("bootstrap", "vendor.bundle.js")
    ],
    resolve: {
        extensions: ['', '.js', '.vue']
    },
    module: {
        preLoaders: [{
            test: /\.(js|vue)$/,
            loader: "eslint-loader",
            include: __dirname + '/resources/assets'
        }],
        loaders: [{
            test: /\.js/,
            loader: 'babel-loader',
            include: __dirname + '/resources/assets',
            query: {
                presets: ['es2015']
            }
        }, {
            test: /\.vue/,
            loader: 'vue-loader',
            include: __dirname + '/resources/assets'
        }, {
            test: /\.html/,
            loader: 'raw-loader',
            include: __dirname + '/resources/assets'
        }]
    },
    devServer: {
        contentBase: "./public",
        proxy: {
            '/api/*': {
                target: 'http://127.0.0.1:9000'
            }
        }
    }
};