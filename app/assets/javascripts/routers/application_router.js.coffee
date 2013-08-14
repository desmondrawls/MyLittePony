class Mlp.Routers.Application extends Backbone.Router
  routes:
    '': 'index'
    'ponies/:id': 'show'

  initialize: ->
    Mlp.vent.on('pony:click', @choices, this)
    Mlp.vent.on('choice:shopping', @shopping, this)
    Mlp.vent.on('choice:exploring', @exploring, this)
    @ponies = new Mlp.Collections.Ponies()
    @ponies.reset($('#container').data('ponies'))
    @settings = new Mlp.Collections.Settings()
    @settings.reset($('#container').data('settings'))
    @clothing_items = new Mlp.Collections.ClothingItems
    @clothing_items.reset($('#container').data('clothing_items'))


  index: ->
    mainview = new Mlp.Views.Main()
    $('#container').html(mainview.render().el)
    @ponies.fetch success: =>
      view = new Mlp.Views.PoniesIndex(collection: @ponies)
      $('#friends').html(view.render().el)
    @settings.fetch success: =>
      view = new Mlp.Views.SettingsIndex(collection: @settings)
      $('#venue').html(view.render().el)

  choices: (clicked_pony) ->
    console.log("Choices...")
    choice_view = new Mlp.Views.Choice(model: clicked_pony)
    $('#container').html(choice_view.render().el)

  shopping: (shopping_pony) ->
    console.log("shopping...")
    console.log(this)
    shopping_view = new Mlp.Views.Shopping()
    $('#container').html(shopping_view.render().el)
    fitting_room_view = new Mlp.Views.FittingRoom(model: shopping_pony)
    $('#shopping_pony').html(fitting_room_view.render().el)
    @clothing_items.fetch success: =>
      hats_view = new Mlp.Views.Hats(collection: @clothing_items)
      $('#hats-index').html(hats_view.render().el)
      hats_view.positionHats()
      shoes_view = new Mlp.Views.Shoes(collection: @clothing_items)
      $('#shoes-index').html(shoes_view.render().el)
      shoes_view.positionShoes()
      try_on_view = new Mlp.Views.TryOn(collection: @clothing_items)
      $('#shopping-pony-target').append(try_on_view.render().el)

  exploring: (exploring_pony) ->
    console.log("exploring...")
    console.log(this)
    action_view = new Mlp.Views.Action()
    $('#container').html(action_view.render().el)
    @settings.fetch success: =>
      @settings.reset_cameos()
      @settings.assign_cameos(@ponies)
      everfree_view = new Mlp.Views.Everfree(collection: @settings)
      $('#background').html(everfree_view.render().el)
    heroine_view = new Mlp.Views.Heroine(model: exploring_pony)
    $('#heroine').html(heroine_view.render().el)
    cameo_reservation_view = new Mlp.Views.CameoReservation(collection: @ponies)
    $('#cameo').html(cameo_reservation_view.render().el)





