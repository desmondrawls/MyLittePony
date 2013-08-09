class Mlp.Routers.Application extends Backbone.Router
	routes:
		'': 'index'
		'ponies/:id': 'show'

	initialize: ->
		@ponies = new Mlp.Collections.Ponies()
		@ponies.reset($('#container').data('ponies'))
		@settings = new Mlp.Collections.Settings()
		@settings.rest($('#container').data('settings'))

	index: ->
		gameview = new Mlp.Views.Game()
		$('#container').html(gameview.render().el)
		@ponies.fetch success: =>
			view = new Mlp.Views.PoniesIndex(collection: @ponies)
			$('#friends').html(view.render().el)
		@settings.fetch success: =>
		  view = new Mlp.Views.SettingsIndex(collection: @settings)
		  $('#venue').html(view.render().el)

	show: (id) ->
		alert "Pony #{id}"
