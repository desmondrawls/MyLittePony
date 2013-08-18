class Mlp.Views.Everfree extends Backbone.View
  
  everfreetemplate: JST['exploring/everfree']
  className: 'everfree-scene'

  events:
    'click .navigate': 'navigate'

  initialize: ->
    console.log("initializing everfree")
    @collection.randomReset()
    @everfree = @collection.where in_everfree: true
    @everfree[0].select()
    Mlp.vent.on('everfree:navigated', @render, this)

  navigate: (event) ->
    event.preventDefault()
    console.log("navigating")
    direction = event.currentTarget.innerHTML
    new_scene = @collection.navigate(@collection.selected(), direction)
    Mlp.vent.trigger('everfree:navigated', new_scene)
    @hideButtons(new_scene)
  
  hideButtons: (everfreeScene) ->
    console.log("hiding buttons...")
    $('#nav-buttons').children().each ->
      id = $(this).attr("id")
      console.log(id)
      $(this).addClass('hidden') if not everfreeScene.get("#{id}")
  
  appendEverfreeScene: (setting) =>
    console.log("appending")
    console.log(setting)
    view = new Mlp.Views.EverfreeScene(model: setting)
    @$('#everfree-scene').append(view.render().el)


  render: ->
    console.log("rendering everfree")
    console.log(@collection)
    console.log(@everfree)
    console.log(@everfreetemplate)
    $(@el).html(@everfreetemplate())
    @appendEverfreeScene(@collection.selected())
    this
