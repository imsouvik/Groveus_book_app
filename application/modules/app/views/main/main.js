var app=angular.module('groveusCms',['ui.bootstrap','ui.router','summernote','angularUtils.directives.dirPagination']);
app.config(function($stateProvider, $urlRouterProvider) 
{
    $urlRouterProvider.otherwise('/home');
    $stateProvider
    	.state
    	('home', {
	        url: '/home',
	        templateUrl: 'dashboard/admin',
	        controller: 'ctrl_dashboard'
    	})
    	.state
    	('admin_profile', {
	        url: '/admin_profile',
	        templateUrl: 'admin_profile',
	        controller: 'ctrl_admin'
    	})
	    .state
		('logs', {
	        url: '/logs',
	        templateUrl: 'logs',
	        controller: 'ctrl_logs'
	    })
	    .state
		('test', {
	        url: '/test',
	        templateUrl: 'temp_form_type',
	        controller: 'ctrl_temp_form_type'
	    })
	    .state
    	('book', {
	        url: '/book_details',
	        templateUrl: 'book_details',
	        controller: 'ctrl_book_details'
    	})
    	.state
    	('supplier', {
	        url: '/supplier',
	        templateUrl: 'supplier',
	        controller: 'ctrl_supplier'
    	})
    	.state
    	('shelf', {
	        url: '/shelf',
	        templateUrl: 'shelf',
	        controller: 'ctrl_shelf'
    	})
    	.state
    	('search_category', {
	        url: '/search_category',
	        templateUrl: 'search_category',
	        controller: 'ctrl_search_category'
    	})
    	.state
    	('genre', {
	        url: '/genre',
	        templateUrl: 'genre',
	        controller: 'ctrl_genre'
    	})
    	.state
    	('kit_books', {
	        url: '/kit_books',
	        templateUrl: 'kit_books',
	        controller: 'ctrl_kit_books'
    	})
    	
    	.state
    	('school_master', {
	        url: '/school_master',
	        templateUrl: 'school_master',
	        controller: 'ctrl_school_master'
    	})
    	.state
    	('class_master', {
	        url: '/class_master',
	        templateUrl: 'class_master',
	        controller: 'ctrl_class_master'
    	})
    	.state
    	('kit_assign', {
	        url: '/kit_assign',
	        templateUrl: 'kit_assign',
	        controller: 'ctrl_kit_assign'
    	})
    	
});