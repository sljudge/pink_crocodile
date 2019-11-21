import ReactDOM from 'react-dom';
import React from 'react';

import App from './components/App.jsx'


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');
require('./blade-forms/index.js');


/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/App');

require('../sass/app.scss');

if (document.getElementById('root')) {
    ReactDOM.render(<App />, document.getElementById('root'));
}