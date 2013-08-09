class Mlp.Routers.Application extends Backbone.Router
  routes:
    '': 'index'
    'ponies/:id': 'show'

  initialize: ->
    Mlp.vent.on('click', @riding, this)
    @ponies = new Mlp.Collections.Ponies()
    @ponies.reset($('#container').data('ponies'))
    @settings = new Mlp.Collections.Settings()
    @settings.reset($('#container').data('settings'))

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
    console.log("Pony #{id}")
    @pony = @ponies.get(id)
    console.log(@pony)


  riding: (clickedpony) ->
    event.preventDefault()
    console.log("wassup b")
    ridingview = new Mlp.Views.Riding(model: clickedpony)
    $('#container').html(ridingview.render().el)


