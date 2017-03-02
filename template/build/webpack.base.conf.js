const path = require('path')
const webpack = require('webpack')

var config = require('../config')
var projectRoot = path.resolve(__dirname, '../')

var env = process.env.NODE_ENV

module.exports = {
  node: {
    fs: 'empty'
  },
  entry: config.entry,
  output: {
    path: path.resolve(projectRoot, 'dist')
  },
  resolve: {
    extensions: ['.js', '.vue', '.json'],
    alias: {
      'vue$': 'vue/dist/vue.common.js'
    }
  },
  module: {
    rules: [
      {{#eslint}}
      {
        enforce: 'pre',
        test: /\.vue$/,
        loader: 'eslint-loader',
        include: [
          path.join(projectRoot, 'src')
        ],
        exclude: /node_modules/
      },
      {
        enforce: 'pre',
        test: /\.js$/,
        loader: 'eslint-loader',
        include: [
          path.join(projectRoot, 'src')
        ],
        exclude: /node_modules/
      },
      {{/eslint}}
      {
        test: /\.vue$/,
        loader: 'vue-loader',
        include: [
          path.join(projectRoot, 'src')
        ],
        exclude: /node_modules/
      },
      {
        test: /\.js$/,
        loader: 'babel-loader',
        include: [
          path.join(projectRoot, 'src')
        ],
        exclude: /node_modules/
      },
      {
        test: /\.json$/,
        loader: 'json-loader'
      }
    ]
  },
  devServer: {
    contentBase: path.resolve(__dirname, '../src'),
    https: true,
    hot: true,
    inline: true,
    watchOptions: {
      aggregateTimeout: 300,
      poll: 1000
    },
    publicPath: "/assets/",
    stats: { colors: true }
  }
}
