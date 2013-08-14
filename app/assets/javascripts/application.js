// This is a manifest file that'll be compiled into application.js, which will include all the files
// listed below.
//
// Any JavaScript/Coffee file within this directory, lib/assets/javascripts, vendor/assets/javascripts,
// or vendor/assets/javascripts of plugins, if any, can be referenced here using a relative path.
//
// It's not advisable to add code directly here, but if you do, it'll appear at the bottom of the
// the compiled file.
//
// WARNING: THE FIRST BLANK LINE MARKS THE END OF WHAT'S TO BE PROCESSED, ANY BLANK LINE SHOULD
// GO AFTER THE REQUIRES BELOW.
//
//= require jquery
//= require jquery_ujs
//= require underscore
//= require backbone
//= require mlp
//= require_tree ../templates
//= require_tree ./models
//= require_tree ./collections
//= require_tree ./views
//= require_tree ./routers
//= require collections/ponies
//= require collections/settings
//= require models/pony
//= require models/setting
//= require routers/application_router
//= require views/exploring/cameo
//= require views/exploring/cameo_reservation
//= require views/exploring/everfree
//= require views/exploring/everfree_scene
//= require views/exploring/heroine
//= require views/ponies/ponies_index
//= require views/ponies/pony
//= require views/action
//= require views/main



Mlp.vent = _.extend({}, Backbone.Events);





