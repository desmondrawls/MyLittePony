class Mlp.Routers.Application extends Backbone.Router
  routes:
    '': 'index'
    'ponies/:id': 'show'

  initialize: ->
    Mlp.vent.on('cameo:rendered', @openChat, this)
    Mlp.vent.on('pony:click', @choices, this)
    Mlp.vent.on('fitting_room:outfit_saved', @choices, this)
    Mlp.vent.on('choice:shopping', @shopping, this)
    Mlp.vent.on('choice:exploring', @exploring, this)
    @ponies = new Mlp.Collections.Ponies()
    @ponies.reset($('#container').data('ponies'))
    @settings = new Mlp.Collections.Settings()
    @settings.reset($('#container').data('settings'))
    @clothing_items = new Mlp.Collections.ClothingItems
    @clothing_items.reset($('#container').data('clothing_items'))
    @messages = new Mlp.Collections.Messages()
    @messages.reset($('#container').data('messages'))
    faye = new Faye.Client "http://localhost:9292/faye"
    faye.setHeader 'Access-Control-Allow-Origin', 'http://localhost:3000'
    console.log("before: #{@messages}")
    faye.subscribe "/receive", (data) =>
      console.log("inside: #{@messages}")
      console.log("the data is: #{data}")
      if !data.outgoing
        @messages.add content: data.content, heroine: data.heroine, outgoing: data.outgoing
      height = 0
      $('#messages div').each (i, message) ->
        height += parseInt($(this).height())
        console.log("the final height is #{height}")
      $('#messages').animate({scrollTop:height}, 500,'swing');


  index: ->
    mainview = new Mlp.Views.Main()
    $('#container').html(mainview.render().el)
    @ponies.fetch success: =>
      view = new Mlp.Views.PoniesIndex(collection: @ponies)
      $('#friends').html(view.render().el)
    @settings.fetch success: =>
      view = new Mlp.Views.SettingsIndex(collection: @settings)
      $('#venue').html(view.render().el)

  choices: (active_pony) ->
    console.log("Choices...")
    choice_view = new Mlp.Views.Choice(model: active_pony)
    $('#container').html(choice_view.render().el)
    @clothing_items.fetch
      data: { pony_id: active_pony.get('id')}
      success: =>
        console.log("fetched clothing items")
        console.log(@clothing_items)
        outfit_view = new Mlp.Views.Outfit(collection: @clothing_items.models)
        $('#choice_pony').append(outfit_view.render().el)

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
    $('#everfree').append(heroine_view.render().el)
    cameo_reservation_view = new Mlp.Views.CameoReservation(collection: @ponies)
    $('#cameo').html(cameo_reservation_view.render().el)
    console.log(exploring_pony.get('id'))
    @clothing_items.fetch
      data: { pony_id: exploring_pony.get('id')}
      success: =>
        console.log("fetched clothing items")
        console.log(@clothing_items)
        outfit_view = new Mlp.Views.Outfit(collection: @clothing_items.models)
        $('#heroine').append(outfit_view.render().el)

  openChat: ->
    @messages.fetch
      success: =>
        chatview = new Mlp.Views.Chat(collection: @messages)
        $('#chat').html(chatview.render().el)




